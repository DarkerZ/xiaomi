<template>
	<div>
		<div class="page-product-view" data-log="商品详情">
		 		<nav_list :goods_name="goodsDetail.goods_title"></nav_list>
		 	<div class="product-view"  >
		 		<!-- 导航 -->		
		 		<!-- banner 切换 -->
				<mt-swipe :auto="4000">
  				<mt-swipe-item><img :src="goodsDetail.goods_img"></mt-swipe-item>
  				<mt-swipe-item><img :src="goodsDetail.pic_1"></mt-swipe-item>
  				<mt-swipe-item><img :src="goodsDetail.pic_2"></mt-swipe-item>
				</mt-swipe>
			<!--  -->
				<div class="goods-format">
					<h3 class="title">{{ goodsDetail.goods_title }}</h3>
					<p class="description"><span>【下单立减300元，还享分期免息】</span>5.7" 双曲面柔性屏 / 3D曲面玻璃 / 骁龙 821 性能版 / 2256万超高像素相机 / 4070mAh 超长续航</p>
					<p class="price">￥{{goodsDetail.goods_price}}</p>
				</div>
				<div class="goods-format">
					<p class="format-name">已选</p>
					<p>小米Note 2 全球版 6GB+128GB 亮黑色 x1</p>
					<span class="format-arrow">></span>
				</div>
				<div class="goods-format">
					<p class="format-name">促销</p>
					<div class="sub"><span>满减</span></div>
					<p>小米Note 2 128GB版本下单立减300元</p>
					<span class="format-arrow">></span>
				</div>
				<div class="goods-format">
					<img src="../../../static/images/detail_addres.png"></img>
					<span>北京北京市东城区永定门外街道</span>
					<p>有现货</p>
					<span class="format-arrow">></span>					
				</div>
				<div class="goods-format">
					<p class="format-name">选购配件</p>
					<p>耳机、移动电源</p>
					<span class="format-arrow">></span>
				</div>


				<!-- 详细参数 -->
				
				<div class="attr" id="attr">
						<mt-navbar v-model="selected">
					  	<mt-tab-item id="1">参数</mt-tab-item>
					  	<mt-tab-item id="2">概述</mt-tab-item>
					 	<mt-tab-item id="3">意外险</mt-tab-item>
					</mt-navbar>
					
					<!-- tab-container -->
					<mt-tab-container v-model="selected">
					  <mt-tab-container-item id="1">
					    <li><img src="../../../static/images/detail-banner-3.png"></li>
					    <li><img src="../../../static/images/detail-banner-3.png"></li>
					    <li><img src="../../../static/images/detail-banner-3.png"></li>
					    <li><img src="../../../static/images/detail-banner-3.png"></li>
					  </mt-tab-container-item>

					  <mt-tab-container-item id="2">
					    <li><img src="../../../static/images/recom-2.png"></li>
					    <li><img src="../../../static/images/recom-2.png"></li>
					    <li><img src="../../../static/images/recom-3.png"></li>
					    <li><img src="../../../static/images/recom-3.png"></li>
					  </mt-tab-container-item>

					  <mt-tab-container-item id="3">
					    <li><img src="../../../static/images/save.png"></li>
					  </mt-tab-container-item>
					</mt-tab-container>
				</div>
				
				 <div class="mui-content">
				 	<p class="recom">为你推荐</p>
				    <div class="mui-row">
				        <div class="mui-col-sm-6">
				            <li class="mui-table-view-cell">
				                <a class="mui-navigate-right">
				                    <img src="../../../static/images/recom.png">
				                    <p>小米NOte</p>  
				                    <p><span>￥</span>3399</p> 
				                </a>
				            </li>
				        </div>
				        <div class="mui-col-sm-6">
				            <li class="mui-table-view-cell">
				                <a class="mui-navigate-right">
				                    <img src="../../../static/images/recom-1.png"> 
				                    <p>小米NOte</p>  
				                    <p><span>￥</span>3399</p> 
				                </a>
				            </li>
				        </div>
				        <div class="mui-col-sm-6">
				            <li class="mui-table-view-cell">
				                <a class="mui-navigate-right">
				                    <img src="../../../static/images/recom-1.png">
				                    <p>小米NOte</p>  
				                    <p><span>￥</span>3399</p> 
				                </a>
				            </li>
				        </div>
				        <div class="mui-col-sm-6">
				            <li class="mui-table-view-cell">
				                <a class="mui-navigate-right">
				                    <img src="../../../static/images/recom.png">
				                    <p>小米NOte</p>  
				                    <p><span>￥</span>3399</p> 
				                </a>
				            </li>
				        </div>
				    </div>
				</div>			

				<!-- 底部 -->
				<div class="detail-foot">
					<a  href=""><img src="../../../static/images/home.png"></a>
					<a  @click="jumpCar()"><img src="../../../static/images/buycar.png">{{ carList.length }}</a>
					<div class="detal-addCat" @click="addCar(goodsDetail)"><span>加入购物车</span></div>
				</div>


				<!-- 购物弹出框 -->
				<div class="buy-tip">
					<div class="tip-name">
						<div><img src="../../../static/images/recom.png"></div>
						<div>
							<span>￥49</span>
							<p>name</p>
						</div>
					</div>
					<div class="tip-format">
						<p>颜色</p>
						<p>购买数量</p>
					</div>
					<div class="tip-btn">
						<p>确定</p>
					</div>
				</div>
		 	</div>
		</div>
	</div>

</template>

<!-- <script src="../../assets/font_o8quapjvdeha1yvi/iconfossssnt.js"></script> -->
<script type="es6">
import Vue from 'vue'
import nav_list from '../../components/cate/nav'
import { mapMutations,mapState } from 'vuex'
import { Navbar, TabItem ,Toast,selected} from 'mint-ui';
import { Axios } from '../../service/config'

Vue.component(Navbar.name, Navbar);
Vue.component(TabItem.name, TabItem);

		


export default {
	data () {
		return{
			selected:'1',
		}
	},
	computed:{
		...mapState(['carList','goodsDetail'])
	},
	created(){

		Axios.get('/api/goods/'+this.$route.query.id).then(rtnData=>{

			this.setgoodsList(rtnData.data)
			console.log(this.goodsDetail)
		}),
		this.wScroll()
	},
	
	components:{
		nav_list
	},
	methods: {
		...mapMutations(['setCar','setgoodsList']),

		addCar(goods){
			let has = false
			//判断carList 是否存在数据  如果存在添加的商品不能与已存在商品一样
			if (this.carList.length > 0) {
				this.carList.forEach( item => {
						
				})
			}
			if (!has) {
				this.$set(goods, 'num', 1)
				this.setCar(goods)
				Toast('成功加入购物车')
			}
			//当属性是后来新增加的时候，使用$set设置数据响应  
			//在一开始添加数据的地方为期添加get 和set 属性
			
		},
		jumpCar(){
			this.$router.push('/buycar')
		},
		//产品属性滚动---固定
		 scroll(){
    	    //谷歌
    	    if(document.body.scrollTop || document.body.scrollLeft){
    	        return {
    	            top:document.body.scrollTop,
    	            left:document.body.scrollLeft
    	        }
    	    }else {
    	        return {
    	            top:document.documentElement.scrollTop,
    	            left:document.documentElement.scrollLeft
    	        }
    	    }
    	},
		wScroll(){
			window.onscroll =function(){

   			const nav=document.getElementById("attr");
	   		const navTop= nav.offsetTop;
	   		    const H =scroll().top;//滚动的长度、高度
	   		    if(H >=navTop){
	   		        //添加class 为nav 设置选择器
	   		        //达到这个高度时候调用这个选择器 即position：fixed
	   		        nav.setAttribute("class","attr fixd");
	   		    }else{
	   		        //清除 class 使其 换为nav 选择器
	   		        nav.className="attr";
	   		    }
	   		}
		}
    	 
   		
   		
	}

}
</script>

<style lang='scss' scoped>
span, p, h1,h2,h3, h4, h5,ul{ margin: 0;padding:0; }
li{list-style: none;}
.mint-tabbar.is-fixed{ display: none;}

.fixd{
        position:fixed;
        top:0px;
    }

	.page-product-view {
	/*min-width: 100px;
	max-width: 720px;*/
    background:#ffffff;
    margin: 0 auto;
    text-align: left;
		.product-view {
			position: relative;
    		width:100%;
    		padding-bottom: 40px;
			.mint-swipe {
				max-height: 800px;
				height: 110vw;
		  		width: 100%; 
		  		.mint-swipe-indicator{
		  			width: 15px;
		  			height: 15px;
		  			background: white;
		  			opacity: 0.3;
		  			display: inline-block;
		  		}
		  		.mint-swipe-indicators{
		  			bottom:12px;
		  		}
		  		
		  		.mint-swipe-item{
		  			height: 100%;
		  			img{width: 100%; }
		  		}
		  		.mint-swipe-indicator.is-active{
		  			opacity: 0.7;
		  		}		  		
		  	
			}

			/* 商品规格 */
			.goods-format{
				padding:16px;
				border-bottom: 1px solid #efeff0;
				overflow: hidden;
				.title{
					color:#212121;
					font-size: 20px;
				}
				.description{
					font-size: 14px;
					line-height: 20px;
					color: #9c9c9c;
					span{
						color: #f56702;
					}
				}
				.price{
					color: #f56702;
					font-size: 20px;
					margin-top: 12px;
				}
				+.goods-format{
					padding: 14px;
					border-bottom: 10px solid #efeff0;
					position: relative;
					.format-name{
						font-size: 14px;
						color: #9c9c9c;
					}
					p{
						font-size: 14px;
						color: #212121;
					}
					.sub{												
						
						span{font-size: 14px;border: 1px solid #f56702;
						color: #f56702;
                        padding:2px;
					    }
					}
					.format-arrow{
						position: absolute;
						top: 50%;
						right: 15px;
						font-size: 20px;
						color: #ddd;
						margin-top:-10px;
					}
					img{
						width: 15px; 
						height:15px;
						+span{
							font-size: 14px;
							+p{
								margin-left: 19px;
								font-size: 15px;
								color: #f56702;
							}
						}
						
					}
				}
				
			}

			/* 产品概述，属性 */

			.attr{
				width: 100%;
				padding-bottom: 20px;
				border-bottom: 15px solid #efeff0;				
				.mint-navbar {
					border-bottom: 0;
					color: #26a2ff;
					.mint-tab-item{
						color: #333;
						text-decoration: none;
						.mint-tab-item-label{
							font-size: 22px;
							text-decoration: none;
						}
						+a div{border-left: 1px solid #e5e5e5;}
					}					
					.mint-tab-item.is-selected{
						color: #f56702;
						border-bottom:0;
					}
				}
				div.mint-tab-container-item {
					li {
						margin-top: -1px;
						img{ width: 100%}}
				}
			}

			/* 推荐产品 */
			.mui-content{
				background: #fff;
				margin-bottom: 30px;
				.recom{ font-size: 15px;color:#333;padding:10px 15px;}
				.mui-table-view-cell{padding:0;}
				.mui-navigate-right {
					margin-bottom: 10px;
					img{width: 100%;}
					p{
						margin-left:15px;
						font-size: 14px;
						color: #212121;
			            
						+p{
							color: #ff6000;
							span{
								font-size: 15px;
							}
						}
					}
				}
			}

			/* foot */
			.detail-foot{
				position: fixed;
				bottom:0;
				left: 0;
				right: 0;
				background: #fff;
				display: flex;
				flex-flow: row wrap;

				a{
					padding:8px 0;
					text-align: center;
					width:80px;
					/*height: 100%;*/
					img{width: 25px;
					}
					
				}
				a:first-child{
					border-right: 1px solid #e8e8e8;
				}
				div{
					box-flex: 1;
    				flex: 1;
    				height: 48px;
    				background-color: #FF5722;
    				color: #fff;
    				text-align: center; 
    				font-size: 14px;   
    				line-height:48px;				
     				
    			}

			}

			/* 选择购买数量  提示框  */
			.buy-tip{
				position: fixed;
				bottom: 0;
				left: 0;
				right: 0;
				height: 100%;
				display: none;
				.tip-name{
					width: 150px;
					img{width:100%;}
				}
			}
		}		
	}
	
	
</style>
