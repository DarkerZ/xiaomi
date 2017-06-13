<template>
	<div id="info">
		<Head headTitle="个人资料" backUrl="/personal"></Head>
		<div class="items">
      <ul>
        <li class="i-head">
          <router-link to="" class="item">
            <span>头像</span>
          </router-link>
        </li>
        <li class="i-name">
          <router-link to="info/editInfo?e=name" class="item">
            <span>姓名</span>
          </router-link>
        </li>
        <li class="i-sex">
          <router-link to="info/editInfo?e=sex" class="item">
            <span>性别</span>
          </router-link>
        </li>
        <li class="i-birth">
          <router-link to="info/editInfo?e=birth" class="item">
            <span>生日</span>
          </router-link>
        </li>
        <li class="i-phone">
          <router-link to="" class="item">
            <span>手机号码</span>
          </router-link>
        </li>
      </ul>
      <ul>
        <li class="i-psw">
          <router-link to="info/editInfo?e=psw" class="item">
            <span>修改密码</span>
          </router-link>
        </li>
        <!-- <li class="i-address">
          <router-link to="/personal/setting" class="item">
            <span>收货地址</span>
          </router-link>
        </li> -->
      </ul>
    </div>
	</div>
</template>

<script type="es6">
import {mapMutations} from 'vuex'
import Head from '../../components/Head'

export default {
  name: 'info',
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
    // ...mapMutations(['setHeadTitle','setHeadUrl']) //映射方法
  }
}	
</script>

<style scoped lang="scss">
	#info{
    padding-top:50px;
    .items{
      margin-top:6px;
      text-align: left;
      ul{
        background: #fff;
        margin: 0 0 6px 0;
        padding: 0;
        border-top: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        li{
            position: relative;
            color: rgba(0,0,0,.54);
            vertical-align: middle;
            padding-left: 12px;
            .item{
                  display: block;
                  height: 45px;
                  display: box;
                  display: -webkit-box;
                  box-align: center;
                  -webkit-box-align: center;
                  box-pack: justify;
                  -webkit-box-pack: justify;
                  color:#333;
                  border-bottom: 1px solid rgba(0,0,0,.15);
                  }
          }
          li:after{
                content: "";
                position: absolute;
                right: 10px;
                top:50%;
                width: 9px;
                height: 9px;
                border-left: 1px solid currentColor;
                border-top: 1px solid currentColor;
                transform: translate3d(0,-50%,0) rotateZ(135deg);
                -webkit-transform: translate3d(0,-50%,0) rotateZ(135deg);
                }
          li:last-child .item{
              border-bottom:none;
            }
      }
    }
  }
</style>
