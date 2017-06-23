<template>
	<div id="Ectopic">
		<section class="page12">
			<ul>
				<li class="mui-row">
				
					<div class="mui-col-xs-4" v-for="(goods,index) in goods_data"  v-if="index == 7">
						<img :src="'/api/' + goods.goods_img">
						<h4>{{goods.goods_title}}</h4>
						<span>{{goods.goods_money}}</span>
					</div>
					<div class="mui-col-xs-8" v-for="(goods,index) in goods_data"  v-if="index == 8">
						<img :src="'/api/' + goods.goods_img">
						<h4>{{goods.goods_title}}</h4>
						<span>{{goods.goods_money}}</span>
					</div>
				
				</li>
			</ul>
		</section>
	</div>
</template>
<script type="es6">
import Vue from 'vue'
import {Axios} from '../../service/config'
	export default {
		name:'Ectopic',
		data(){
			return{
				goods_data:''
			}
		},
			created(){
		Axios.get('/api/search').then( rtnD => {
			
  		 this.goods_data = rtnD.data
  		 
  	})
	}
	
	}
</script>
<style lang="scss" scoped>
	.page12{
		width: 100%;overflow: hidden;text-align: left;background: #fff;
		ul {
			li {
			
					div {
					img{
						width: 99%;
						}
					
				 h4{
				 	color: #212121;font-size: 12px;
				 }
				 span{
				 	color: #e58335;font-size: 12px;display: block;
				 }
				 h4,span{margin-left: 10px;}
				}
				
			}
		}
	}

</style>
