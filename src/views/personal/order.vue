<template>
	<div id="order">
		<Head></Head>
		<div class="content">			
		<mt-tab-container v-model="active">
  <mt-tab-container-item id="tab-container1">
    <mt-cell v-for="n in 10" title="tab-container 1"></mt-cell>
  </mt-tab-container-item>
  <mt-tab-container-item id="tab-container2">
    <mt-cell v-for="n in 5" title="tab-container 2"></mt-cell>
  </mt-tab-container-item>
  <mt-tab-container-item id="tab-container3">
    <mt-cell v-for="n in 7" title="tab-container 3"></mt-cell>
  </mt-tab-container-item>
</mt-tab-container>
	</div>
	</div>
</template>

<script type="es6">
import {mapMutations} from 'vuex'
import Vue from 'vue'
import Head from '../../components/Head'
import { TabContainer, TabContainerItem } from 'mint-ui';

Vue.component(TabContainer.name, TabContainer);
Vue.component(TabContainerItem.name, TabContainerItem);

export default {
  name: 'order',
  components: {
    Head
  },
  data() {
  	return {
      active: 'tab-container1'
  	}
  },
  created() {
    this.setHeadTitle('我的订单'),
    this.setHeadUrl('/personal')
  },
  methods: {
    ...mapMutations(['setHeadTitle','setHeadUrl']) //映射方法
  }
}	
</script>

<style scoped lang="scss">
#order{
	padding-top:50px;
}
</style>
