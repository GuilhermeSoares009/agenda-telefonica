<script setup>
import { ref, computed } from "vue";
import { useStore } from "vuex";
import usePhoneBook from "../../composables/usePhoneBook.js";

const emits = defineEmits(["emitDisplay"]);
const store = useStore();
const contact = computed(() => {
  return store.getters.selectedContact;
});

const display = ref(null);

const name = ref(contact.value ? contact.value.name : "");
const phone = ref(contact.value ? contact.value.phone : "");
const email = ref(contact.value ? contact.value.email : "");
const fileName = ref("");
const preview = ref(contact.value ? contact.value.image_url : null);
const file = ref(null);
const photoUrl = ref(null);
const { update } = usePhoneBook();

const closeModal = () => {
  name.value = "";
  phone.value = "";
  email.value = "";
  fileName.value = "";
  preview.value = null;
  file.value = null;
  photoUrl.value = null;
  store.commit("setSelectedContact", null);
  emits("emitDisplay");
};

const addNewContact = () => {
  if (name.value !== "" && phone.value !== "" && email.value !== "") {
    /*     const enteredData = {
      id: new Date().toISOString(),
      name: name.value,
      phone: phone.value,
      email: email.value,
      image_url: file,
    }; */

    const formData = new FormData();
    formData.append("name", name.value);
    formData.append("phone", phone.value);
    formData.append("email", email.value);
    formData.append("image_url", file.value.files[0]);

    axios
      .post("http://127.0.0.1:8000/api/agenda/store", formData)
      .then( async (response) => {
        await update();
        emits("emitDisplay");
      })
      .catch((error) => {
        console.error("Erro ao criar registro:", error);
      });
  }

  emits("emitDisplay");
};

const uploadHandler = () => {
  // Change name of uploaded image
  Object.defineProperty(file.value.files[0], "name", {
    writable: true,
    value: "image",
  });
  fileName.value = file.value.files[0].name.split(".jpg")[0];
  photoUrl.value = file.value.files[0];
  preview.value = URL.createObjectURL(photoUrl.value);
};

const updateContact = () => {
  if (name.value !== "" && phone.value !== "" && email.value !== "") {
    const updatedData = {
      id: contact.value.id,
      name: name.value,
      phone: phone.value,
      email: email.value,
      image_url: preview.value,
    };

    store.commit("updateContact", updatedData);
  }

  closeModal();
};

const handleSubmit = () => {
  contact.value ? updateContact() : addNewContact();
};

const verifyLink = (link) => {
  if (link != undefined) {
    return !link.startsWith("blob:")
      ? "http://127.0.0.1:8000/storage/" + link
      : link;
  }
  return link;
};
</script>

<template>
  <div
    @click.self="closeModal"
    class="backdrop fixed bottom-0 top-0 h-screen w-full bg-slate-800 opacity-50 z-[900]"
  ></div>
  <div
    class="bg-gray-700 shadow-lg w-[500px] min-h-[200px] rounded-lg fixed mx-auto mt-4 top-[0] left-[35%] z-[1000]"
  >
    <form class="w-full p-4" @submit.prevent="handleSubmit">
      <div class="mb-4 flex text-center justify-center items-center">
        <div
          class="flex justify-center items-center relative rounded-[50%] w-[120px] h-[120px] bg-gray-200"
        >
          <span class="text-gray-400 text-center" v-if="!preview">Profile</span>

          <img
            v-else
            class="w-full rounded-[100%] max-h-[100%] object-cover"
            :src="verifyLink(preview)"
            alt="profile"
          />
        </div>
      </div>
      <div class="relative justify-center form-field w-full mb-2">
        <input
          ref="file"
          @change="uploadHandler"
          class="cursor-pointer inputFile"
          name="file"
          type="file"
          id="file"
          accept=".jpg"
          hidden
        />
        <label
          class="flex justify-center transition-all items-center text-white font-bold text-[0.75rem] hover:bg-gray-600 bg-gray-400 cursor-pointer p-2 font-Roboto"
          for="file"
          >{{ fileName === "" ? "Upload photo" : fileName }}</label
        >
      </div>

      <div class="flex flex-col justify-center input-field w-full">
        <label class="text-white mb-1" for="name">Nome para Contato</label>
        <input
          class="w-full px-2 py-1 rounded-lg border-none"
          type="text"
          placeholder="Nome..."
          v-model="name"
          id="name"
        />
      </div>
      <div class="flex flex-col justify-center input-field w-full mt-4">
        <label class="text-white mb-1" for="phone number"
          >Número de telefone:</label
        >
        <input
          class="w-full px-2 py-1 rounded-lg border-none hover:border-none"
          type="phone"
          min="8"
          max="14"
          placeholder="+98"
          v-model.trim="phone"
        />
      </div>
      <div class="flex flex-col justify-center input-field w-full mt-4">
        <label class="text-white mb-1" for="e-mail">E-mail:</label>
        <input
          class="w-full px-2 py-1 rounded-lg border-none hover:border-none"
          type="email"
          placeholder="contato@seuemail.com"
          v-model.trim="email"
        />
      </div>
      <div class="actions mt-6 w-full flex">
        <button
          type="submit"
          class="border-none bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1"
        >
          Create
        </button>
      </div>
    </form>
  </div>
</template>
