<template>
	<div class="editor">
		<div class="input">
			<span class="title">姓名</span>
			<input type="text">
		</div>
		<mt-button type="primary" size="large" class="btn" @click="doUpdate()">确定</mt-button>
	</div>
</template>

<script type="es6">
export default {
	data() {
		return {
           
		}
	},
	methods: {
		doUpdate() {
			
		}
	}	
}
</script>

<style scoped lang="scss">
.editor{
	.input{
		position: relative;
		.title{
			font-size:14px;
			position: absolute;
			top:50%;
			margin-top:-20px;
			left:10px;
		}
		input{
			height: 40px;
			text-indent: 50px;
			font-size:14px;
			border:none;
		}
	}
	.btn{
		font-size:16px;
		width: 90%;
		margin:auto;
		background:#FF5722;
	}
}	
</style>
