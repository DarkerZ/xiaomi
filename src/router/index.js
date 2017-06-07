import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/index',
      component: require('../views/index')
    },
    {
      path: '/category',
      component: require('../views/category')
    },
    {
      path: '/buycar',
      component: require('../views/buycar')
    },
    {
      path: '/personal',
      component: require('../views/personal')
    }
  ]
})
