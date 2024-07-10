export default {
  createNewContact(state, payload) {
    state.contacts.push(payload);
  },
  updateContact(state, updatedData) {
    const index = state.contacts.findIndex(contact => contact.id === updatedData.id);
    if (index !== -1) {
      state.contacts[index] = updatedData;
    }
  },
  setSelectedContact(state, payload) {
    state.selectedContact = payload;
  }
};
