<template>
	<div id="editInfo">
		<Head :headTitle="type" backUrl="/personal/info"></Head>
		<!-- <div class="component">
			<edit_photo></edit_photo>
		</div> -->
		<div class="component" v-if="edit=='name'">
			<edit_name></edit_name>
		</div>
		<div class="component" v-if="edit=='sex'">
			<edit_sex></edit_sex>
		</div>
		<div class="component" v-if="edit=='birth'">
			<edit_birth></edit_birth>
		</div>
		<div class="component" v-if="edit=='psw'">
			<edit_psw></edit_psw>
		</div>
	</div>
</template>

<script type="es6">
import {mapMutations} from 'vuex'
import Head from '../../components/Head'
import edit_name from '../../components/edit_name'
import edit_sex from '../../components/edit_sex'
import edit_birth from '../../components/edit_birth'
import edit_psw from '../../components/edit_psw'

export default {
  name: 'editInfo',
  components: {
    Head,
    edit_name,
    edit_sex,
    edit_birth,
    edit_psw
  },
  data() {
  	return {
      edit: '',
      type: ''
  	}
  },
  created() {
    
  },
  beforeRouteEnter  (to, from, next) {
     next(vm => {
       vm.edit=to.query.e
       if(vm.edit=='name') {
       	vm.type = '修改姓名'
       } else if(vm.edit=='sex') {
       	vm.type = '修改性别'
       } else if(vm.edit=='birth') {
       	vm.type = '修改生日'
       } else if(vm.edit=='psw') {
       	vm.type = '修改密码'
       }
    })
    
  },
  methods: {
    ...mapMutations(['setHeadTitle','setHeadUrl']) //映射方法
  }
}	
</script>

<style scoped lang="scss">
#editInfo{
	padding-top:40px;
	.component{
		margin-top:8px;
	}
}
</style>
