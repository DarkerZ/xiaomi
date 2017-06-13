<template>
  <div id="app">
  <transition name="fadeIn">
    <router-view></router-view>
  </transition>
    <foot v-if="$route.path=='/'||$route.path=='/category'||$route.path=='/buycar'||$route.path=='/personal'"></foot>
  </div>
</template>

<script type="es6">
import foot from './components/foot'
export default {
  name: 'app',
  components: {
    foot
  }
}

</script>

<style scoped lang="scss">
@import 'assets/css/mixin.scss';
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

</style>
