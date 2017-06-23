<template>
	<div id="editaddress">
		<Head headTitle="编辑地址信息"></Head>
		<edit_address type="edit"></edit_address>
	</div>
</template>

<script type="es6">
import Head from '../../components/Head'
import edit_address from '../../components/personal/edit_address'

export default {
  name: 'editaddress',
  components: {
    Head,
    edit_address
  },
  data() {
  	return {
      
  	}
  },
  created() {
    
  }
  
}	
</script>

<style lang="scss" scoped>
	
</style>
