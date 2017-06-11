import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

let router = new Router({
  routes: [
    {
      path: '/',
      component: require('../views/index/index')
    },
    {
      path: '/category',
      component: require('../views/category/index')
    },
    {
      path: '/buycar',
      component: require('../views/buycar/index')
    },
    {
      path: '/personal',
      component: require('../views/personal/index')
    },
    {
      path: '/login',
      component: require('../views/personal/login')
    },
    {
      path: '/register',
      component: require('../views/personal/register')
    },
    {
      path: '/personal/setting',
      component: require('../views/personal/setting'),
      meta: {
        requireLogin: true
      }
    },
    {
      path: '/personal/info',
      component: require('../views/personal/info'),
      meta: {
        requireLogin: true
      }
    },
    {
      path: '/personal/order',
      component: require('../views/personal/order'),
      meta: {
        requireLogin: true
      }
    }
  ]
})

router.beforeEach((to, from, next) => {
  if (to.meta.requireLogin) {
    let curUser = localStorage.getItem('curUser')
    if (curUser) {
      next()
    } else {
      next({
        path: '/login'
      })
    }
  } else {
    next()
  }
})

export default router
