import actions from "./actions.js";
import mutations from "./mutations.js";
import getters from "./getters.js";
import { createStore } from "vuex";
import "../../css/app.css";

const store = new createStore({
  state() {
    return {
      contacts: [],
      selectedContact: null,
    };
  },
  actions: actions,
  mutations: mutations,
  getters: getters,
});

export default store;
