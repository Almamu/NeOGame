<title>Opciones de Recursos >> NeOGame</title>
<div class="planet-box planet-short">
	<h2>Opciones de recursos - <?= $this->planet->name($this->session->userdata('current_planet')); ?></h2>
</div>
<div class="panel">
	<div class="panel-heading text-right">
		<a href="<?= site_url('game/buildings'); ?>" class="btn btn-dark btn-xs button-close white-text ajax-game"><i class="fa fa-times"></i></a>
	</div>
	<div class="panel-body">
		<div class="row" style="margin-bottom: 10px; ">
			<div class="col-xs-12 text-center white-text">
				Factor de producción: <span class="stats bold" data-value="100">0</span>%
			</div>
			<!-- <div class="col-md-4 col-xs-12 text-center">
				<button class="btn btn-primary btn-sm block">Recalcular</button>
			</div> -->
		</div>
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table id="resource-settings" class="table table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th></th>
							<th>Metal</th>
							<th>Cristal</th>
							<th>Deuterio</th>
							<th>Energía</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$elms = [
								['name' => 'Ingresos básicos', 'values' => [120, 60, 0, 0], 'power' => NULL],
								['name' => 'Mina de metal (Nivel 10)', 'values' => [3112, 0, 0, -260], 'power' => 100],
								['name' => 'Mina de cristal (Nivel 9)', 'values' => [0, 1698, 0, -213], 'power' => 40],
								['name' => 'Sintetizador de deuterio (Nivel 6)', 'values' => [0, 0, 599, -2103], 'power' => 100],
								['name' => 'Planta de energía solar (Nivel 12)', 'values' => [0, 0, 0, 753], 'power' => 100],
								['name' => 'Planta de fusión (Nivel 2)', 'values' => [0, 0, -97, 69], 'power' => 100],
								['name' => 'Satélite solar (Número: 0)', 'values' => [0, 0, 0, 0], 'power' => 0],
								['name' => 'Objetos', 'values' => [0, 0, 0, 0], 'power' => NULL],
							];

						foreach($elms as $e){ ?>
						<tr>
							<th><?= $e['name']; ?></th>
							<?php foreach($e['values'] as $v){ ?>
							<td class="stats" data-value="<?= $v; ?>">0</td>
							<?php } ?>
							<td>
								<?php if($e['power'] !== NULL){ ?>
									<select name="" class="input-xs">
									<?php for($i = 100; $i >= 0; $i-=10){ ?>
										<option value="<?= $i; ?>" <?php if($e['power'] == $i){ echo 'selected'; } ?>><?= $i; ?>%</option>
									<?php } ?>
									</select>
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Capacidad de almacenamiento:</th>
							<td>40000</td>
							<td>40000</td>
							<td>40000</td>
							<td>-</td>
							<td></td>
						</tr>
						<tr data-math="HOUR">
							<th>Total por hora:</th>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td data-math="HOUR">-</td>
							<td></td>
						</tr>
						<tr data-math="DAY">
							<th>Total por día:</th>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td data-math="HOUR">-</td>
							<td></td>
						</tr>
						<tr data-math="DAY*7">
							<th>Total por semana:</th>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td data-math="HOUR">-</td>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){
	// Desde el segundo TR de TFoot por todos los TD excepto el último
	$("#resource-settings tfoot tr").each(function(i){
		if(i == 0){ return true; } // Saltamos el primero, que es capacidad.
		$(this).find("td").each(function(i){
			// Energía y el otro, fuera.
			if(i > 3){ return true; }
			var val = 0;
			$("#resource-settings tbody tr").each(function(j){
				var td = $(this).find("td").eq(i);

				if(td.data('value') > 0){ td.addClass('success-text'); }
				else if(td.data('value') < 0){ td.addClass('danger-text'); }

				val += parseInt(td.data('value'));
			});
			val = (val / HOUR); // Calcular Mat/s
			var mul;
			mul = $(this).data('math'); // Look in child
			if(!mul){ mul = $(this).parent().data('math'); } // Look in parent
			if(mul){ val = val * eval(mul); } // If is set
			if(isNaN(val) || !val){ val = 0; }
			$(this).data('value', val).addClass('stats');

			if(val < 0){ $(this).addClass('danger-text'); }
			else{ $(this).addClass('success-text'); }
		})
	});
});
</script>