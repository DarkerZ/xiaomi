<template>
	<div id="order_detail">
		<Head headTitle="订单详情" backUrl="/personal/order?t=1"></Head>
		<div class="content">
			<div class="head">
				<div>订单状态：已收货</div>
				<div>订单编号：123124234</div>
			</div>
			<ul class="good_list">
                <li>
                  <div class="good">
                    <img src="" alt="">
                    <span class="good_name">小米盒子3c 黑色</span>
                  </div>
                  <div class="price">￥199</div>
                </li>
			</ul>
			<div class="money">
				<div class="money_list">
					<div class="money_detail">
						<span>订单金额：</span>
						<span>￥177</span>
					</div>
					<div class="money_detail">
						<span>配送费用：</span>
						<span>￥0</span>
					</div>
				</div>
				<div class="total">
					<span>应付金额：</span>
					<span>￥117</span>
				</div>
			</div>
			<div class="order_info">
				<div class="info_detail">
					<span>下单日期：</span>
					<span>2016-02-10 16:54:41</span>
				</div>
				<div class="info_detail">
					<span>订单编号：</span>
					<span>3241234123412</span>
				</div>
				<div class="info_detail">
					<span>收货人：</span>
					<span>小明</span>
				</div>
				<div class="info_detail">
					<span>电话号码：</span>
					<span>12441234444</span>
				</div>
				<div class="info_detail">
					<span>收货地址：</span>
					<span>广东省广州市番禺区广东省广州市番禺区广东省广州市番禺区广东省广州市番禺区广东省</span>
				</div>
				
			</div>
		</div>
	</div>
</template>

<script type="es6">
import {mapMutations} from 'vuex'
import Head from '../../components/Head'

export default {
  name: 'order',
  components: {
    Head
  },
  data() {
  	return {
      
  	}
  },
  created() {
    
  },
  methods: {
    
  }
}	
</script>

<style scoped lang="scss"> 
#order_detail{
	padding-top:40px;
	.head{
		background: url("../../assets/images/personal/bg_0425a88.png") center 0 #f37d0f;
   		background-size: auto 100%;
    	padding: 15px 14px;
    	overflow: hidden;
    	text-align: left;
    	font-size:13px;
    	color:#fff;
	}
	.good_list{
		margin-top:8px;
		background:#fff;
          		li{
                  padding:20px 16px;
                  border-bottom: 1px solid #e0e0e0;
                  overflow: hidden;
                  .good{
                    float:left;
                      img{
                          width:44px;
                          height: 44px;
                          vertical-align: middle;
                      }
                      .good_name{
                        font-size:12px;
                      }
                    }
                    .price{
                      float:right;
                      font-size:13px;
                      line-height:44px;
                    }
                  }
    }
    .money{
    	margin-top:8px;
		background:#fff;
		.money_list{
			padding:9px 16px;
			font-size:13px;
			border-bottom: 1px solid #e0e0e0;
			.money_detail {
				overflow: hidden;
				span:first-child{
					float:left;
				}
				span:last-child{
					float:right;
				}
			}
		}
		.total{
			padding:9px 16px;
			font-size:15px;
			color:#FF5722;
			overflow: hidden;
			span:first-child{
					float:left;
				}
			span:last-child{
					float:right;
			}
		}
    }
	.order_info{
				margin-top:8px;
				background:#fff;
				padding:9px 16px;
				font-size:13px;
				.info_detail{
					overflow: hidden;
					span:first-child{
						float:left;
						width: 30%;
						text-align: left;
					}
					span:last-child{
						float:right;
						width: 70%;
						text-align: right;
					}
				}
		}
}
</style>
