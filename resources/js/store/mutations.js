export default {
  createNewContact(state, payload) {
    state.contacts.push(payload);
  },
  setSelectedContact(state, payload) {
    state.selectedContact = payload;
  }
};
