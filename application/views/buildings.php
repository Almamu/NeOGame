<title>Recursos >> NeOGame</title>
<div class="planet-box buildings">
	<h2>Recursos - <?= $this->planet->name($this->session->userdata('current_planet')); ?> </h2>
	<div class="footer pull-right text-right">
		<a href="<?= current_url() .'/settings'; ?>" class="btn btn-xs btn-dark ajax-game">Opciones de recursos</a>
	</div>
</div>
<div id="info" class="planet-box hidden panel" style="margin-bottom: 0;">
	<div class="loader hidden">
		<i class="fa fa-refresh fa-spin fa-4x white-text"></i>
	</div>
	<div id="buildinfo" class="panel-body">
		<div class="row">
			<div class="col-xs-4 image" style="background: red;">

			</div>
			<div class="col-xs-8 content">
				<div class="row title">
					<div class="col-xs-8 name">
						<h2>Laboratorio de investigación</h2>
					</div>
					<div class="col-xs-2 pull-right text-right">
						<button class="btn btn-xs btn-dark" style="width: 100%;"><i class="fa fa-times"></i></button>
					</div>
					<div class="col-xs-2 level text-right no-padding">
						<span>Nivel <span class="amount">6</span></span>
					</div>
				</div>
				<div class="row content">
					
				</div>
				<div class="row requirements">
					<span style="display: block;">Requerido para subir al nivel 7:</span>
					<ul>
					

					</ul>
					<button class="btn btn-lg btn-dark pull-right">Conseguir Materia Oscura</button>
				</div>
			</div>
		</div>
		
		
	</div>
</div>
<div class="panel">
	<div class="panel-heading text-center">Edificios de recursos</div>
	<div class="panel-body">
		<ul id="buildings"></ul>
	</div>
</div>
<script>
$(function(){
	$.ajax({
		url: "<?= site_url('api/buildings'); ?>",
		dataType: "json"
	}).done(function(ret){
		$.each(ret.data, function(i, Building){
			var dsb = "";
			if(Building.Disabled){ dsb = "disabled"; }
			$("#buildings").append(
				'<li class="big" data-id="' + Building.ID + '" data-status="' + Building.Status +'" data-image="' + Building.Icon + '" ' + dsb + '>'
				+	'<button class="upgrade" type="button"><i class="fa fa-chevron-up"></i></button>'
				+	'<span class="level">' + Building.Level + '</span>'
				+ '</li>'

			);
		});
		$("#buildings li").each(function(){
			var y = 0;
			if($(this).data("status") == "off"){ y = 2; }
			if($(this).is("[disabled]")){ y = 1; }

			$(this)
				.css("background", "url('/img/buildings/" + $(this).data('image') + "')")
				.css("background-position-x", "-2px")
				.css("background-position-y", "-" + parseInt(100 * y) + "px");
		});

		$("#buildings li .upgrade").click(function(e){
			e.stopPropagation(); // Prevent action in info button
			var res = OGame.Buildings.Upgrade($(this).data("id"));
			ion.sound.play("ratchet_buy");
		});

		$("#buildings li").click(function(){
			// alert("las dao al item");
			if($(this).data("status") == "off"){
				ion.sound.play("ratchet_error");
			}else{
				ion.sound.play("ratchet_select");
			}
		});
	});
});
</script>