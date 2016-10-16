<title><?= $this->planet->name($this->session->userdata('current_planet')); ?> >> NeOGame</title>
<div class="planet-box overview">
	<h2>Mi planeta (me necesita) - <?= $this->planet->name($this->session->userdata('current_planet')); ?></h2>
	<div class="col-xs-12 footer pull-right text-right white-text">
		<table class="table table-condensed table-hover">
		<tbody>
			<tr>
				<th>Diámetro:</th>
				<td>12.800km (50/163)</td>
			</tr>
			<tr>
				<th>Temperatura:</th>
				<td>de <span class="temperature low">-32</span> a <span class="temperature high">8</span></td>
			</tr>
			<tr>
				<th>Posición:</th>
				<td class="planet-position">3:17:12</td>
			</tr>
			<tr>
				<th>Puntos:</th>
				<td>97 (Lugar 4.918 de 5.100)</td>
			</tr>
			<tr>
				<th>Puntos de honor:</th>
				<td>0</td>
			</tr>
		</tbody>
		</table>
		<br />
		<span class="pull-left">Reubicar</span>
		<span class="pull-right">abandonar/renombrar</span>
	</div>
</div>
<div style="margin-bottom: 20px;"></div>
<script>
	$("#buildings li").each(function(){
		var m = {ready: 0, busy: 1, unavailable: 2};
		var s = $(this).data('status');
		$(this)
		.css('background', "url('/img/buildings/" + $(this).data('image') + "')")
		.css('background-position', "-2px -" + parseInt(100 * m[s]) + "px");
		console.log(m[s]);
	});

	$(".upgrade").click(function(){
		alert("las dao al butó");
	});

	$("#buildings li").click(function(){
		alert("las dao al item");
	})
</script>