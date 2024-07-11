<script setup>
import { ref, computed } from "vue";
import { useStore } from "vuex";
import axios from "axios";
import {
  ArrowCircleLeftIcon,
  StarIcon,
  PlusCircleIcon,
} from "@heroicons/vue/outline";
import ContactCard from "../components/UI/BaseCard.vue";
import BaseModal from "../components/UI/BaseModal.vue";
import BaseSearch from "../components/UI/BaseSearch.vue";
import BaseButton from "../components/UI/BaseButton.vue";
import ContactInfo from "../components/Contacts/ContactInfo.vue";
import Contacts from "../components/Contacts/ContactLists.vue";
// Variables
const store = useStore();
const isContactPage = ref(true);
const isChosen = ref(false);
const filteredContacts = ref([]);
const displayModal = ref(false);
// functions
const filterContacts = (enteredValue) => {
  filteredContacts.value = [];

  const contacts = store.getters.contactsList;

  const filtered = contacts.filter((contact, index) => {
    if (contact.name.toLowerCase().includes(enteredValue.toLowerCase())) {
      return contact;
    } else {
      return;
    }
  });
  if (filtered.length === 0) {
    filteredContacts.value = contacts;
  }
  filteredContacts.value = filtered;
};
const clickEventCheck = (isClicked) => {
  isContactPage.value = false;
  isChosen.value = isClicked;
};
const backToContactPage = () => {
  isContactPage.value = true;
  isChosen.value = false;
};

const changePage = (page) => {
  if (page === "contacts") {
    isContactPage.value = true;
  } else {
    isContactPage.value = false;
  }
};
const showModal = () => {
  displayModal.value = true;
};
const closeModal = () => {
  displayModal.value = false;
};

  axios
    .get("http://127.0.0.1:8000/api/agenda")
    .then((response) => {
      console.log(Object.values(response.data.data))
      store.commit("setContacts", response.data.data);
    })
    .catch((error) => {
      console.error("Erro ao buscar registros da agenda:", error);
    });
</script>

<template>
  <teleport to="body">
    <BaseModal @emitDisplay="closeModal" v-if="displayModal" />
  </teleport>
  <section
    class="mx-auto w-full flex flex-col justify-center items-center p-[2rem]"
  >
    <!-- Contacts list-->
    <contact-card v-if="isContactPage">
      <template #header> </template>
      <template #default>
        <div class="main-contents flex-col relative">
          <div
            class="mt-[1rem] title__containe flex items-center justify-between w-full"
          >
            <h1 class="w-full title text-white text-[1.2rem]">
              Agenda Telefônica
            </h1>
            <div class="w-full flex items-center justify-end h-[20px]">
              <button
                @click="showModal"
                title="add new contact"
                class="border-none font-bold"
              >
                <PlusCircleIcon
                  class="h-8 w-8 text-indigo-400 hover:text-indigo-500"
                />
              </button>
            </div>
          </div>
          <div class="search__container mt-4">
            <base-search @emitForm="filterContacts"></base-search>
          </div>
          <Contacts
            :filtered-contacts="filteredContacts"
            @emitHandler="clickEventCheck"
            @emitEditContact="showModal"
          />
        </div>
      </template>
    </contact-card>
    <!-- Contact info-->
    <contact-card v-if="isChosen">
      <template #header>
        <div class="flex justify-between w-full items-center">
          <span class="ml-[-10px]" @click="backToContactPage"
            ><ArrowCircleLeftIcon
              class="hover:text-gray-300 h-[2rem] w-[2rem] cursor-pointer text-gray-500"
          /></span>
        </div>
      </template>
      <div class="flex flex-col items-center w-full">
        <ContactInfo />
      </div>
    </contact-card>
  </section>
</template>

<style scoped>
.v-slide-enter-from,
.slide-leave-to {
  transform: translateX(-100px);
  opacity: 0;
}
.slide-enter-active,
.slide-leave-active {
  transition: all 1s ease-in;
}
.slide-enter-to,
.slide-leave-from {
  transform: translateX(0);
  opacity: 1;
}
</style>