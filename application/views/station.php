<title>Instalaciones >> NeOGame</title>
<div class="planet-box station">
	<h2>Instalaciones - <?= $this->planet->name($this->session->userdata('current_planet')); ?></h2>
</div>
<div class="panel">
	<div class="panel-heading text-center">Instalaciones</div>
	<div class="panel-body">
		<ul id="buildings">
			<?php $r = ['on', 'disabled', 'off']; ?>
			<?php foreach($buildings as $b){ ?>
			<li class="big" data-status="<?= $r[rand(0,2)]; ?>" data-image="<?= $b['icon']; ?>">
				<button class="upgrade" type="button"><i class="fa fa-chevron-up"></i></button>
				<span class="level">5</span>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<script>
	$("#buildings li").each(function(){
		var m = {on: 0, disabled: 1, off: 2};
		var s = $(this).data('status');
		$(this)
		.css('background', "url('/img/buildings/" + $(this).data('image') + "')")
		.css('background-position', "-2px -" + parseInt(100 * m[s]) + "px");
		// console.log(m[s]);
	});

	$(".upgrade").click(function(){
		alert("las dao al butó");
	});

	$("#buildings li").click(function(){
		alert("las dao al item");
	});


</script>