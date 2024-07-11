import axios from "axios";
import { useStore } from "vuex";

export default function usePhoneBook() {
    const store = useStore();

    async function update() {
        axios
        .get("http://127.0.0.1:8000/api/agenda")
        .then((response) => {
          store.commit("setContacts", response.data.data);
        })
        .catch((error) => {
          console.error("Erro ao buscar registros da agenda:", error);
        });
    }
    
    function deleteContact(contactId){
        axios
        .delete(`/api/agenda/${contactId}`)
        .then(response => {
            store.commit("deleteContact", contactId);
          })
        .catch(error => {
            console.error('Erro ao deletar registro:', error);
          });
    }

    return {update, deleteContact};

}