<template>

	<div class="menu" id="cate">
        <div class="menu-wrap">
            <div class="menu-header"><Head headTitle="商品分类"></Head></div>
            <!-- <menuData :menu_data="cateTList"></menuData> -->
            <div>
                <div class="menu-two" v-for="menu in cate_list">
                      <div id="" class="section d_jump">
                        <!-- ../../assets/images/menu1.png -->
                          <img :src="'/api/' +menu.cate_thumb" v-show="menu.cate_mane" @click="jumpDetail()" style="width:100%">
                      </div>
                  
                      <div class="section ">                              
                          <div name="m1" class="category_title">
                          <span>{{ menu.cate_name  }}</span>
                          </div>                
                      </div>
                  
                      
                        <div class="category_group">
                            <div class="box">
                                <div class="product" v-for="goods in menu.goods_list">
                                     <router-link :to="'/detail?id='+goods.id">
                                        <div class="img">
                                            <img :src="'/api/' + goods.goods_img">
                                        </div>
                                        <div class="name">
                                            {{ goods.goods_title }}
                                        </div>
                                    </router-link>
                                </div>                    
                            </div>
                        </div>
                </div>
            </div>
        </div>
        


        <div class="menu-one">
          <ul class="menu-list">
            <li v-for="(cate,index) in cateList" id="index">
              <a @click="jump(index)" :class="{active:steps.active==index}">{{ cate.cate_name }} </a>
            </li>        
          </ul>       
        </div>

    </div>



</template>

<script type="es6">
import { mapMutations,mapState } from 'vuex'
import { Axios } from '../../service/config'
import Vue from 'vue'
import Head from '../../components/Head'
export default{
    name: 'cate',
    components:{
       Head
    },
    data(){
        return{
            cate_list: null,
             steps:{
                active:0,
                step:this.cateList
             },
        }       
    },

    /*  获取更新后的DOM的Vue方法    
        Vue.nextTick()回调函数中的执行的应该是会对DOM进行操作的 js代码
    */
     mounted: function () {
        this.$nextTick(function () {
          window.addEventListener('scroll', this.onScroll)
        })
    },

    computed:{
        ...mapState(['cateList','cateTList'])
    },
    watch: {
      '$route' : 'fetchData'
    },
    created(){
        this.setSelected('tab2');
        //console.log(this.$route)
        Axios.get('/api/cate').then( rtnData=> {
            this.setcateList(rtnData.data)


            console.log(this.cateList)
        }),
        this.fetchData();
        /*Axios.get('api/cate_two').then( rtnData=> {
          this.setcateList(rtnData.data)
          console.log(this.cateTList)
        })*/

    },
    methods:{
        ...mapMutations(['setcateList','setcateTList','setSelected']),
        jumpDetail(){
          this.$router.push('/detail')
        },
        fetchData( ){
        // 获取ID
        // this.$route.params.id
        // 请求API，
        Axios.get('/api/mobile/cate/getCate').then( rtnData=>{
         
          this.cate_list = rtnData.data
           console.log(this.cate_list)
        })
        
      },
        onScroll (item) {
            let scrolled = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop
            let scrollH = document.documentElement.scrollHeight || window.pageYHeight || document.body.scrollHeight

            if (scrolled >= 3500) {
              this.steps.active = 7
            } else if (scrolled < 3500 && scrolled >= 2800) {
              this.steps.active = 6
            } else if (scrolled < 2800 && scrolled >= 2500) {
              this.steps.active = 5
            } else if (scrolled < 2500 && scrolled >= 2000) {
              this.steps.active = 4
            } else if (scrolled < 2000 && scrolled >= 1150) {
              this.steps.active = 3
            } else if (scrolled < 1150 && scrolled >= 700) {
              this.steps.active = 2
            } else if (scrolled< 700 && scrolled >0) {
              this.steps.active = 1
            } else {
              this.steps.active = 0
            }
        },   
        jump (index) {
            // 用 class="d_jump" 添加锚点
            let jump = document.querySelectorAll('.d_jump')
            let total = jump[index].offsetTop
            let distance = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop
            // 平滑滚动，时长500ms，每10ms一跳，共50跳
            let step = total / 50
            if (total > distance) {
              smoothDown()
            } else {
              let newTotal = distance - total
              step = newTotal / 50
              smoothUp()
            }
            function smoothDown () {
              if (distance < total) {
                distance += step
　　　　        document.body.scrollTop = distance
                document.documentElement.scrollTop = distance
                window.pageYOffset = distance
                setTimeout(smoothDown, 10)
              } else {
                 document.body.scrollTop = total
                 document.documentElement.scrollTop = total
                 window.pageYOffset = total
              }
            }
            function smoothUp () {
                if (distance > total) {
                    distance -= step
　　　　        　　document.body.scrollTop = distance
                    document.documentElement.scrollTop = distance
                    window.pageYOffset = distance
                    setTimeout(smoothUp, 10)
                } else {
                    document.body.scrollTop = total
                    document.documentElement.scrollTop = total
                    window.pageYOffset = total
                }
            }
        }


    },
    ready(){

    }
   
}
    



</script>

<style scoped>
   .menu { /*max-width: 786px; min-width: 400px;*/width: 100%;/*overflow-x: auto;*/ }
   .menu-wrap{ width:100%; top: 0; left: 0; right: 0; overflow-y: auto;padding-bottom: 200px; }
   .menu-header { height: 40px; background: #f2f2f2; text-align: center; }
   .menu-one { position:fixed; top:40px;width: 18%; background: grey;border-bottom: 0px; height:100%; overflow-y: auto; }
   .menu-list { width: 100%;border-right: 2px solid red; margin: 0px; padding: 0px; border:0px;background-color: #ffffff;height: 100%; overflow-y: auto;  position: absolute; z-index: 90; }
   .menu-list li { display:flex;list-style: none;text-align: center; }
  .menu-list li a{ text-decoration: none;font-size: 14px;color: #414141; width: 70px; padding:10px 0; display: block;width: 100%; }
   /*.menu-list li a:hover,*/ .menu-list li a.active { color: #ff6b00; font-size: 18px; }
   .menu-list::-webkit-scrollbar {display:none}


  .menu-two { width:80%;float: right;overflow: hidden; margin-left: 18%; padding: 2px 4.5%; border-left: 1px solid #d9d9d9;  }
   .category_title{background: #fff; font-size: 24px; text-align: center; font-weight: 400; margin-top: 30px; height: 80px; line-height:80px; overflow: hidden; } 
   .category_group{ overflow: hidden;}
        .product {width: 33.33%; float: left; box-sizing: border-box;margin-bottom:10px;  }
        .product a{ width: 50px;height: 50px; color: #337ab7; text-decoration: none; text-align: center;}
        .product a .img{width:100%;text-align: center; margin-top: 30px; margin-bottom: 20px;  }
        .product a .img img { transform-origin: 0px 0px 0px;vertical-align: middle; opacity: 1; transform: scale(1, 1);width: 60%; }
        .product a:hover{ text-decoration: none; }
        .product a .name{  white-space: nowrap; font-size: 18px; color: rgba(0,0,0,.54); }

</style>
<!-- .col-md-8 { border: 1px solid grey; }
   .menu-list li { -moz-box-flex:1;display:flex;list-style: none;height: auto; border: 1px solid grey; text-align: center; }
   .menu-list li a { display: block; width: 70px; height: 50px; line-height: 50px;font-size: 10px; color: #414141; text-decoration:none; } -->
