
<template>
<div>
	<div class="car" data-log="购物车">
		<!-- 购物车头部 -->
		
		<!-- content -->
		<div class="car-content">
			<ul>
				<li v-for="(goods,index) in carList">
					<input type="checkbox" v-model=checkedGoods :value="goods" >
					<img :src="goods.goods_img" style="width:60px;height:60px;">
					{{ goods.title }}
					<br>
					<b style="color:red">￥{{ goods.price }}元</b>
					<div class="addSub">
						<span @click="addNum(goods)"><img src="../../../static/images/add.png" style="width:20px; height20px;"></span>
						<input type="text" v-model="goods.num">
						<span @click="subNum(goods)"><img src="../../../static/images/sub.png" style="width:20px; height20px;"></span>
						<span @click="del(index,goods.id)"><img src="../../../static/images/delete.png" style="width:20px; height20px;"></span>
					</div>
				</li>
			</ul>
			<div>
				<label>
					<input type="checkbox" @click="checkAll()" >全选/反选
				</label>
				总金额： <b class="price" style="color:red">￥{{ checkedGoods | totalPrice }}元</b>
			</div>
		</div>
		<!-- foot -->
		<div class="car-foot">
			
		</div>
	</div>
</div>
	
</template>

<script type="es6">
import Vue from 'vue'
import {Toast} from 'mint-ui'
import {mapState,mapMutations} from 'vuex'


	export default {
		data () {
			return {
				total_price:'',
				checkedGoods: []
			}
		},
		filters: {
			totalPrice(k){
				let price=0;
				for (var i = 0; i < k.length; i++) {
					price += Number(k[i].price)*k[i].num;
					//price += Number(k[i]);
				}
				return price
			},
			formatPrice(p){
				return p
			}
		},
		computed: {
			...mapState(['carList']),
		},
		methods: {
			addNum(goods){
				goods.num++;
			},
			subNum(goods){
				if(goods.num>1){
					goods.num--;
				}
			},
			checkAll(){
					if (typeof(this.checkedGoods[0]) != 'undefined') {
					this.checkedGoods = [];
				}else {
					for (var i = 0;i < this.carList.length; i++) {
						this.checkedGoods.push(this.carList[i]);
					}
				}
			},
			del(index,id){
				this.carList.splice(index,1)
				for(var i=0; i< this.checkedGoods.length;i++){
					if (id == this.checkedGoods[i].id) {
						this.checkedGoods.splice(i,1);
					}
				}
			}
		}
	}
</script>

<style type="scss" scoped>
	.total_box{
		width: 100%;
		height: 60px;
		font-size: 20px;
		position: fixed;
		left: 0;
		right: 0;
		bottom: 0;
	}
</style>
