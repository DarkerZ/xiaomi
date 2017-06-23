<template>
	<div id="newaddress">
		<Head headTitle="新建地址"></Head>
		<edit_address type="new"></edit_address>
	</div>
</template>

<script type="es6">
import Head from '../../components/Head'
import edit_address from '../../components/personal/edit_address'

export default {
  name: 'newaddress',
  components: {
    Head,
    edit_address
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

<style lang="scss" scoped>
	
</style>
