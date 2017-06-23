<template>
	<div>
		<div class="fixed">
			<form class="head">
      <p class="back" @click="$router.go(-1)">&lt;</p>
			<p class="head-title">购物车</p>
			<a class="top-btn" href="javascript::">
        <p v-if="!isDel" @click="edit">编辑</p>
        <p v-if="isDel"@click="ok">完成</p>
      </a>
			</form>
		</div>

    <!-- <mt-header title="购物车" fixed class="fixed">
       <router-link to="" slot="left">
        <mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
       </router-link>
        <mt-button icon="" slot="right" v-if="!isDel" @click="edit">编辑</mt-button>
        <mt-button icon="" slot="right" v-if="isDel"@click="ok">完成</mt-button>
    </mt-header> -->
		
		<div class="empty"v-if="cartList.length==0">
			<img src="../../../static/buycar-images/emptybuycar.png">
			<p>购物车还是空的</p>
			<a href=""><router-link to="/">去逛逛</router-link></a>
		</div>



		<form class="goodz">
			<div class="mui-content" v-for="(goods,index) in cartList">
    			<div class="mui-row">
        			<div class="mui-col-sm-3 mui-col-xs-3">
        				<div class="checklist">
        					<label data-v-cb4f1ed4="" >
								<span>
								<input data-v-cb4f1ed4="" value="" class="mint-checkbox-input" type="checkbox"
								v-model="checkedNames" :value="goods">
								<span data-v-cb4f1ed4="" class="mint-checkbox-core"></span>
								</span>
							</label>
        				</div>
        				
                    	<img :src='goods.goods_image'>
        			</div>
        			<div class="mui-col-sm-6 mui-col-xs-6" >
						<p class="c1"> {{ goods.goods_name }}</p>
						<p class="c2">*</p>
						<p class="c3">￥{{ goods.goods_price }}元</p> 
        			</div>
        			<div class="mui-col-sm-3 mui-col-xs-3">
              <div v-if="!isDel">
                <a  @click="delNum(goods)">-</a>
                  <a>{{goods.num}}</a>
                  <a @click="addNum(goods)">+</a>
              </div>
            	<div v-if="isDel" class="edit-btn" @click="Show">
                <img class="edit-icon" src="../../../static/buycar-images/edit.png"> 
              </div>
        			</div>
    			</div>


			</div>



			<p class="label">产品是否购买成功，以最终下单为准，请尽快结算</p>
		</form>

	
		


		
		<form class="other" v-if="!isDel">
			
			<div class="other-content">
				<div class="other-title">
					<h1>为你推荐</h1>
					<div class="line"></div><span>每一款产品都是酷酷的</span><div class="line"></div>
				</div>
				
				<div class="mui-content" >
    				<div class="mui-row">
        				<div class="mui-col-sm-6 mui-col-xs-6" v-for="(goods,index) in cartList">
            				<div class="mui-table-view-cell">
                    			<img :src='goods.goods_image'>
								<p class="c1">{{ goods.goods_name }}</p>
								<p class="c2">*</p>
								<p class="c3">￥{{ goods.goods_price }}元</p>
								<div class="buycar-icon">
									<a @click="addCart(info)"><img src="../../../static/buycar-images/buycar.png"></a>
								</div>
            				</div>
        				</div>
				
    				</div>
				</div>

		
			</div>
		</form>

		<div class="foot" v-bind="{'goodz': goodz}">
			<div class="mui-content">
    			<div class="mui-row">
        			<div class="mui-col-sm-3 mui-col-xs-3">
                    	<div class="checklist-all">
                    		<label data-v-cb4f1ed4="" >
								<span>
								<input data-v-cb4f1ed4="" value=""  @click="checkAll()" class="mint-checkbox-input" type="checkbox">
								<span data-v-cb4f1ed4="" class="mint-checkbox-core"></span>
								</span>
							</label>
							<p>全/反选</p>
                    	</div>
                    	
        			</div>
        			<div class="mui-col-sm-4 mui-col-xs-4">
                    	<span>合计:</span><span>￥{{ checkedNames | totalPrice }}元</span>
        			</div>
        			<div class="mui-col-sm-5 mui-col-xs-5">
        				<div class="buy-btn">
        					<button v-if="!isDel" @click="confirmOrder()" :disabled="checkedNames.length>0?false:true">
                  结算</button>
        					<button v-if="isDel" @click="del" :disabled="checkedNames.length>0?false:true">删除</button>
        				</div>
        			</div>
    			</div>
			</div>
		</div>

		
	</div>
	
</template>

<script type="es6">
import { mapState,mapMutations } from 'vuex'
import {Toast} from 'mint-ui'

export default {
  data () {
    return {
      total_price:'',
      checkedNames: [],
      block:true,
      isDel:false,
      cartList: [
      {goods_image:'../../../static/buycar-images/xm6_320.png',goods_name:'小米6',goods_price:'2499',num:1},
      {goods_image:'../../../static/buycar-images/xiaomiNote2.jpg',goods_name:'小米Note2',goods_price:'2799',num:1}
      ],
      buytList: [
      {goods_image:'../../../static/buycar-images/xm6_320.png',goods_name:'小米6',goods_price:'2499',num:1},
      {goods_image:'../../../static/buycar-images/xiaomiNote2.jpg',goods_name:'小米Note2',goods_price:'2799',num:1}
      ]
      				
    }
  },
  filters: {
    totalPrice(k){
      let price=0;
      for(var i=0;i< k.length;i++){
        price += Number(k[i].goods_price)*k[i].num;
      }
      return price;
    }
  },
  created() {
    this.setSelected('tab3');
  },
  computed: {//激活的时候
      ...mapState(['buyList'])//映射
  },
  methods: {
  	 ...mapMutations(['setbuyList', 'setSelected', 'setCartList']),
    addNum(goods){
       goods.num++;
    },
    delNum(goods){
      if (goods.num>1) {
        goods.num--;
      }else{
        Toast('没有放入产品哦！')
      }
    },
    checkAll(){
       if(typeof(this.checkedNames[0]) != 'undefined'){
         this.checkedNames = []; 
       }else{
          for(var i=0;i< this.cartList.length;i++){
              this.checkedNames.push(this.cartList[i]);
         }
       }
    },
    del(index,id){
      this.cartList.splice(index,1)
      for(var i=0;i< this.checkedNames.length;i++){
           if (id == this.checkedNames[i].id) {
              this.checkedNames.splice(i,1)
           }
       }
    },
    edit(){
      this.isDel=true
    },
    ok(){
      this.isDel=false
    },

    addCart(goods){
        this.$set(goods, 'num', 1)
        this.setCart(goods)
     },
    confirmOrder(){//结算判断登陆已否
      // if (this.uinfo) {
         this.setbuyList(this.checkedNames)
      //    Toast('即将为你买单');
         this.$router.push('/bill')
      // }else{
      //   Toast('请先登录！');
      //   this.$router.push('/user/login');
      // }
    }
  }
}
</script>

<style lang="css" scoped>
.iconfont{
  font-family:"iconfont" !important;
  font-size:16px;font-style:normal;
  -webkit-font-smoothing: antialiased;
  -webkit-text-stroke-width: 0.2px;
  -moz-osx-font-smoothing: grayscale;
}

.fixed{
  height: 3rem;
 background: #ff6700;
 position: fixed;
 top:0;
 left:0;
 width: 100%;
 z-index:999;
}
.fixed .mint-header-title{
 color: #fff !important;
}

.head{
  position: relative;
  background: #ff6700;
}
.head .back{
  display: inline-block;
  left: 1rem;
  position: absolute;
  top: 0;
  padding: 1rem 0;
  font-size:20px;
  color:#fff;
}
.head .head-title{
  padding: 1rem 0;
}
.head .top-btn{
  display: inline-block;
  right: 1rem;
  position: absolute;
  top: 0;
  padding: 1rem 0;
 
 }
 .head p{
  color: white;
  font-size: .8rem;
 }


.empty{
  margin-top: 4rem;
  background: white;
  padding-bottom: 1rem; 
  display: block;
}
.empty img{
  width: 10%;
  display: inline-block;
  margin-top: 1rem;
  margin-bottom: -.5rem;
}
.empty p{
   display: inline-block;
   font-size: .8rem;
   color: #ccc;
    margin-left: .5rem;
}
.empty a{
  font-size: 1rem;
  color: black;
  display: inline-block;
  border-radius: .5rem;
  border: 1px solid #ccc;
}


.goodz{
  margin-top: 3rem;
 
}
.mui-content +  .mui-content{
  margin-top: .1rem;
 }
 .goodz .mui-content .mui-row {
     background: white;
 }
 
 .goodz .mui-content .mui-row img{
    width: 120%;
    display: inline-block;
    margin-top: 1rem;
    margin-left: 1em;
 }
 .goodz .mui-content .mui-row .c1{
    margin-top: 1rem;
    margin-left: 1.5rem;
    text-align: left;
    color: black;
 }
 .goodz .mui-content .mui-row .c2{
    margin-left: 1.5rem;
    text-align: left;
    margin-top: -.5rem;
    color: #ccc;
  }
 .goodz .mui-content .mui-row .c3{
    margin-left: 1.5rem;
    text-align: left;
    margin-top: -.5rem;
    color: #ff6700;
 }
 .goodz .mui-content .mui-row a{
    border: 1px solid #ccc;
    color: black;
    padding: 0 .5rem;
    float: left;
    margin-top: 4rem;
    margin-left: -1rem;

 }
 .goodz .mui-content .mui-row a +a{
    margin-left: -.1rem;
 }
  .goodz .label{
  font-size: .75rem;
  color: #999;
  padding: .5rem 0 0 .5rem;
  text-align: left;
 }
 .goodz .edit-btn{
    display: inline-block;
 }
 .goodz .edit-btn .edit-icon{
    position: absolute;
     width: 20% !important;
 }


 .other{
  text-align: left;
  padding-bottom: 5rem;
  background: #f8f8f8;
 }
 
 .other .other-title{
  text-align: center;
 
  padding: 1rem 0 .5rem;

 }
 .other .other-title h1{
  font-size: 1rem;
  color: #ff6700;
 }
 .other .other-title span{
  font-size:.8rem;
  color: #999; 
 }
 .other .other-title  .line{
  display: inline-block;
  height: 1px;
  width: 25%;
  border: 1px solid #ccc;
  margin:.3rem ;
 }
 
 .other .mui-content{
  background: white;
  position: relative;
 }
 .other .mui-content img{
  width: 95%;
 }
  .other .mui-content .c1{
    color: black;
  }
  .other .mui-content .c2{
    color: #ccc;
  }
  .other .mui-content .c3{
    color: #ff6700;
  }
  .other .mui-content .buycar-icon{
    
  }
  .other .mui-content .buycar-icon img{
    width: 12%;
    position: absolute;
    bottom: 1rem;
    right: 1rem;
  }



.foot{
  position: fixed;
  width: 100%;
  margin-top: 1rem;
  bottom: 2.4rem;
  overflow: hidden;
  line-height: 3rem;
}
.foot .mui-content .mui-row{
  background: white;
}
.foot .mui-content .mui-row>div:first-child{
  text-align: left;
}

.foot .mui-content .mui-row p{
  display: inline-block;
  margin-left: -1rem;
}
.foot .mui-content .mui-row>div:nth-child(2){
  text-align: right;
}
.foot span:last-child{
  color: #ff6700;
  margin-right: .5rem;
}
.foot span{ 
  color: #999;  
  font-size: .8rem;
}
.foot .buy-btn button{
  width: 100%;
  height: 3rem;
  border:none;
  background: #ff6700;
  color: white;
  border-radius: 0;
}
.foot a{
  color: white;
  font-size: 1rem;
}



.checklist{
  display: inline-block;
  position: absolute;
  bottom: 2rem;
  left: .5rem;
}
.checklist-all{
  display: inline-block;
  margin-left: .5rem;
}


.mint-checkbox-input:checked + .mint-checkbox-core {
    background-color: #ff6700 !important;
    border-color: #ff6700 !important;
}

 


</style>
