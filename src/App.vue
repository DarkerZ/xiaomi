<template>
  <div id="app">
    <router-view></router-view>
    <mt-tabbar fixed>
      <mt-tab-item id="index">
         <router-link to="/index">首页</router-link></mt-tab-item>
      <mt-tab-item id="category">
       <router-link to="/category">分类</router-link></mt-tab-item>
       <mt-tab-item id="buycar">
       <router-link to="/buycar">购物车</router-link></mt-tab-item>
      <mt-tab-item id="personal">
        <router-link to="/personal">我的</router-link></mt-tab-item>
      
    </mt-tabbar>
  </div>
</template>

<script>

export default {
  name: 'app',
  components: {
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

</style>
