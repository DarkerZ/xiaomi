import Vue from 'vue'
import Vuex from 'vuex'
import mutations from './mutations'
import actions from './actions'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    curUser: null,
    selected: 'tab1',
    userInfo: '',
    buyList: '',
    cartList: '',
    addressInfo: '',
    carList: [{ goods_img: '../../../static/images/detail-banner-1.png', pic_1: '../../../static/images/detail-banner-2.png', pic_2: '../../../static/images/detail-banner-3.png', title: '小米Note 2 全球版 6GB+128GB 亮黑色', price: '3499'
    }],
    goodsDetail: null,
    cateList: null,
    cateTList: null
  },
  mutations,
  actions
})

export default store
