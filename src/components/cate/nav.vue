<template>
	<div id="nav">
		<mt-header fixed :title="goods_name" class="top">
           <router-link to="" slot="left">
  	         <mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
           </router-link>
        </mt-header>
	</div>
</template>

<script type="es6">
import Vue from 'vue'
export default {
	data(){
		return{

		}
	},
	props:['goods_name']
}
</script>

<style lang='scss' scoped>
#nav{
	.top{
		background: #fff;
		color:#888;
		font-size:16px;
	}
}
</style>
