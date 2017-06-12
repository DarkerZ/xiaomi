<template>
	<div id="order">
		<Head></Head>
		<div class="content">	
    <mt-navbar v-model="active" class="nav">
        <mt-tab-item id="tab1">全部</mt-tab-item>
        <mt-tab-item id="tab2">待付款</mt-tab-item>
        <mt-tab-item id="tab3">待收货</mt-tab-item>
      </mt-navbar>		
		   <mt-tab-container v-model="active" swipeable class="tab">
        <mt-tab-container-item id="tab1">
        <ul class="order_list">
          <li class="order">
              <div class="item-1">
                <span class="date">2017-02-02 22:16</span>
                <span class="status">已收货</span>
              </div>
              <ul class="item-2">
                <li>
                  <div class="good">
                    <img src="" alt="">
                    <span></span>
                  </div>
                  <div class="price"></div>
                </li>
              </ul>
              <div class="item-3">
                <span class="quantity"></span>
                <span class="total"></span>
              </div>
            </li>
          </ul>
          </mt-cell>
        </mt-tab-container-item>
        <mt-tab-container-item id="tab2">
          <mt-cell v-for="n in 5" title="tab-container 2"></mt-cell>
        </mt-tab-container-item>
        <mt-tab-container-item id="tab3">
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
import { TabContainer, TabContainerItem, Navbar } from 'mint-ui';

Vue.component(TabContainer.name, TabContainer);
Vue.component(TabContainerItem.name, TabContainerItem);
Vue.component(Navbar.name, Navbar);


export default {
  name: 'order',
  components: {
    Head
  },
  data() {
  	return {
      active: 'tab1'
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
	padding-top:40px;
  .content{
      .nav{
        border-bottom: 1px solid #e0e0e0;
        width: 100%;
        margin: 0;
        padding: 0;
        .mint-tab-item{
          padding:10px 0;
          color:#888;
          .mint-tab-item-label{
            font-size:14px;
          }
        }
        .mint-tab-item.is-selected{
          color:#FF5722;
          border-bottom: 1px solid #FF5722;
          margin-bottom:0;
        }
      }
      .tab{
        .mint-tab-container-item{
          .mint-cell{
            margin-top:8px;
          }
          .order_list{
            .order{
              margin-top:8px;
              background:#fff;
              .item-1{
                padding:10px 16px;
                overflow: hidden;
                border-bottom: 1px solid #e0e0e0;
                .date{
                  font-size:12px;
                  float:left;
                  color:#888;
                }
                .status{
                  float:right;
                  font-size:14px;
                  color:#FF5722;
                }
              }
              .item-2{
                li{
                  padding:20px 16px;
                  border-bottom: 1px solid #e0e0e0;
                }
              }
              .item-3{
                padding:10px 16px;
              }
            }
          }
        }
      }
  }
}
</style>
