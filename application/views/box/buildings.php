<div class="col-md-4 col-xs-12 no-padding">
	<div id="panel-buildings" class="panel">
		<div class="panel-heading text-center">Edificios</div>
		<div class="panel-body white-text text-center">

		</div>
	</div>
</div>
<script>
$(function(){
	$.ajax({
		url: "<?= site_url('api/running/building'); ?>",
		dataType: "json"
	}).done(function(ret){
		if(ret.status == "empty"){
			$("#panel-buildings .panel-body").text("No hay edificios en construcción.");
		}else{
			$("#panel-buildings .panel-body").text("Se está construyendo algo. Pero aún no sé que es.");
		}
	});
});
</script>