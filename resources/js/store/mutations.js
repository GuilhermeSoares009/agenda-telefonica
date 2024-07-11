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
  },
  deleteContact(state, contactId) {
    state.contacts = state.contacts.filter(contact => contact.id !== contactId);
    if (state.selectedContact && state.selectedContact.id === contactId) {
      state.selectedContact = null;
    }
  },
  setContacts(state, contacts) {
    state.contacts = contacts;
  }
};
