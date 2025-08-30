<style>
	#debuger pre{
		overflow-y:scroll;
		height: 100%;
	}
	#btn-debuger{
		width:30px;
		height:30px;
		position:fixed;
		bottom:0px;
		right:10px;
		border-radius:0px;
		padding-left:0px;
		padding-right:0px;
		z-index:99999999999;
	}
	#debuger{
		display:none;
		width:100%;
		height:500px;
		position:fixed;
		bottom:0px;
		left:0px;
		z-index:9999999999;
	}
	#debuger .glyphicon-remove{
		color:#e00e0e;
	}
</style>
<button class="btn btn-info" id="btn-debuger">
	<span class="glyphicon glyphicon-info-sign"></span>
</button>

<div id="debuger">
	<span class="glyphicon glyphicon-remove"></span>
	<?php R($DEBUG); ?>
<div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn-debuger").click(function(){
			$("#debuger").show();
		});
		$("#debuger .glyphicon-remove").click(function(){
			$("#debuger").hide();
		});
	});
</script>