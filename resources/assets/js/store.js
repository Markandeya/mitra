import Vuex from 'vuex'

import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    nots: []
  },
  getters: {

  },
  mutations: {
    add_not(state, not) {
      state.nots.push(not)
    }
  },
  actions: {

  }
})
