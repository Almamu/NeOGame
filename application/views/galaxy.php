<div id="galaxy">
	<div class="row toolbar">
		<div class="col-xs-3">
			<i class="fa fa-circle-thin white-text"></i>
			<button class="btn btn-xs btn-dark"><i class="fa fa-caret-left"></i></button>
			<input class="form-control small" type="number">
			<button class="btn btn-xs btn-dark"><i class="fa fa-caret-right"></i></button>
		</div>
		<div class="col-xs-6 text-center">
			<i class="fa fa-stack-overflow white-text"></i>
			<button class="btn btn-xs btn-dark"><i class="fa fa-caret-left"></i></button>
			<input class="form-control small" type="number">
			<button class="btn btn-xs btn-dark"><i class="fa fa-caret-right"></i></button>
			<button class="btn btn-xs btn-dark">¡Vamos!</button>
		</div>
		<div class="col-xs-3 pull-right">
			<button class="btn btn-xs btn-dark block"><i class="fa fa-star"></i> Expedición</button>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center">
			<ul class="info">
				<li>0 Sondas de espionaje</li>
				<li>0 Reciclador</li>
				<li>0 Misiles interplanetarios</li>
				<li>0/5 Espacios usados</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="planet-image">Planeta</th>
						<th class="planet-name">Nombre</th>
						<th class="planet-moon">Luna</th>
						<th class="planet-rubbish">Escombros</th>
						<th class="planet-player">Jugador</th>
						<th class="planet-alliance">Alianza</th>
						<th class="planet-actions">Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i = 1; $i <= 15; $i++){ ?>
					<tr>
						<td><span><?= $i; ?></span>
							<div class="pull-right" style="width: 32px; height: 32px; background: #999; border-radius: 32px; display: inline-block;"></div>
						</td>
						<td>
							<button class="btn btn-xs btn-dark pull-left" title="¡No es posible colonizar un planeta sin un colonizador!"><i class="fa fa-plane"></i></button>
							<button class="btn btn-xs btn-dark pull-left" title="Reubicar"><i class="fa fa-plane"></i></button>
						Retardus C...
						</td>
						<td><div class="text-center" style="width: 30px; height: 30px; background: #999; border-radius: 30px; display: inline-block;"></div></td>
						<td><div class="text-center" style="width: 30px; height: 30px; background: #999; border-radius: 30px; display: inline-block;"></div></td>
						<td>Retarded Combine</td>
						<td>LMC Servers</td>
						<td>
							<button class="btn btn-xs btn-dark pull-left" disabled title=""><i class="fa fa-user"></i></button>
							<button class="btn btn-xs btn-dark pull-left" title="Escribir mensaje"><i class="fa fa-comment"></i></button>
							<button class="btn btn-xs btn-dark pull-left" title="Enviar solicitud de amigo"><i class="fa fa-user"></i></button>
							<button class="btn btn-xs btn-dark pull-left" disabled title=""><i class="fa fa-user"></i></button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
$(function(){
	$("#galaxy table").DataTable({
		bFilter:	false,
		bPaginate:	false,
		paging:		false,
		ordering:	false,
		info:		false,
		// processing: true,
		// serverSide: true,
		// ajax: "../server_side/scripts/server_processing.php",

		iDisplayLength: 15,
		columns: [ 
			{data: 'planet-image'},
			{data: 'planet-name'},
			{data: 'planet-moon', class: 'planet'},
			{data: 'planet-rubbish', class: 'planet'},
			{data: 'planet-player'},
			{data: 'planet-alliance'},
			{data: 'planet-actions'},
		],
		columnDefs: [
			{targets: 'planet-moon, planet-rubbish'}
		],
	});
})
</script>