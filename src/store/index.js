import Vue from 'vue'
import Vuex from 'vuex'
import mutations from './mutations'
import actions from './actions'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    curUser: null,
    selected: 'tab1'
  },
  mutations,
  actions
})

export default store
