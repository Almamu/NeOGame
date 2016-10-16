<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>NeOGame</title>
	<meta name="author" content="duhowpi">
	<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/pace.js'); ?>"></script>
	<script src="<?php echo base_url('js/jquery.pjax.js'); ?>"></script>
	<script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/moment.js'); ?>"></script>
	<script src="<?php echo base_url('js/ion.sound.js'); ?>"></script>
	<script src="<?php echo base_url('js/sweetalert2.js'); ?>"></script>
	<script src="<?php echo base_url('js/tipped.js'); ?>"></script>
	<script src="<?php echo base_url('js/pnotify.js'); ?>"></script>
	<script src="<?php echo base_url('js/bootstrap.js'); ?>"></script>
	<!-- Emoji One -->
	<!-- DataTables -->
	<!-- iCheck -->
	<!-- ChartJS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery-ui.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.dataTables.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/animate.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/sweetalert2.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/tipped.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pnotify.css'); ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pace.css'); ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
	<meta name="date" content="28.12.2015 19:14:07">
</head>
<body>
<div id="loader" class="white-text loader">
	<i class="fa fa-4x fa-refresh fa-spin"></i>
</div>
<header>
<div class="row">
	<!-- ad y cambio server -->
	<div class="container">
	
	</div>
</div>
<div class="row">
	<div class="container">
		<ul class="nav navbar-nav">
			<li><a class="nolink white-text">Jugador: <b>duhow</b></a></li>
			<li><a class="reverse" href="<?= site_url('game/buddies'); ?>">Amigos</a></li>
			<li><a class="reverse" href="<?= site_url('game/ignorelist'); ?>">Jugadores ignorados</a></li>
			<li><a class="reverse" href="<?= site_url('game/notes'); ?>">Notas</a></li>
			<li><a class="reverse" href="<?= site_url('game/highscore'); ?>">Clasificación <span id="classification" class="white-text">5087</span></a></li>
			<li><a class="reverse" href="<?= site_url('game/search'); ?>">Búsqueda</a></li>
			<li><a class="reverse" href="<?= site_url('game/preferences'); ?>">Opciones</a></li>
			<li><a class="reverse" href="<?= site_url(); ?>">Support</a></li>
			<li><a class="reverse" href="<?= site_url(); ?>">Chat</a></li>
			<li><a class="reverse" href="<?= site_url('logout'); ?>">Salir</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a id="clock" class="nolink white-text"></a></li>
		</ul>
		
	</div>
</div>
</header>

<main class="container">
	<div class="col-md-10 col-xs-12">
		<!-- Central container -->
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<!-- Logo -->
				<img class="logo img-responsive" src="<?php echo base_url('img/logo.png'); ?>">
			</div>
			<div class="col-md-6 col-xs-12 text-center">
				<ul id="materials">
					<li class="metal"><span class="stats" data-header="Metal">0</span></li>
					<li class="crystal"><span class="stats" data-header="Cristal">0</span></li>
					<li class="deuterium"><span class="stats" data-header="Deuterio">0</span></li>
					<li class="energy"><span class="stats" data-header="Energía">0</span></li>
					<li class="darkmatter"><span class="stats" data-header="Materia Oscura">0</span></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-12 pull-right text-center">
				<ul id="officers">
					<li class="commander" data-header="Contratar comandante"></li>
					<li class="admiral" data-header="Contratar almirante"></li>
					<li class="engineer enabled" data-header="Contratar ingeniero"></li>
					<li class="geologist" data-header="Contratar geólogo"></li>
					<li class="technocrat" data-header="Contratar tecnócrata"></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-xs-12 pull-left" style="margin-right: 20px;">
				<!-- Menu buttons -->
				<div class="row" style="margin-bottom: 15px;">
					<div class="col-xs-3 pull-right text-right">
						<button class="btn" title="Visión general del tutorial">?</button>
					</div>
				</div>
				<ul class="ogame-menu-left">
				<?php
					$menu = [
						[
							'left' => ['text' => 'Resumen', 'link' => 'game/overview'],
							'right' => ['icon' => 'fa fa-archive']
						],
						[
							'left' => ['text' => 'Recursos', 'link' => 'game/buildings'],
							'right' => ['icon' => 'fa fa-dashboard', 'tooltip' => 'Opciones de recursos']
						],
						[
							'left' => ['text' => 'Instalaciones', 'link' => 'game/station'],
							'right' => ['icon' => 'fa fa-archive']
						],
						[
							'left' => ['text' => 'Mercader', 'link' => 'game/trader', 'premium' => TRUE, 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-refresh', 'tooltip' => 'Mercado de recursos']
						],
						[
							'left' => ['text' => 'Investigación', 'link' => 'game/research', 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-flask', 'tooltip' => 'Técnica']
						],
						[
							'left' => ['text' => 'Hangar', 'link' => 'game/shipyard', 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-arrow-circle-up']
						],
						[
							'left' => ['text' => 'Defensa', 'link' => 'game/defense', 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-archive']
						],
						[
							'left' => ['text' => 'Flota', 'link' => 'game/fleet', 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-archive', 'tooltip' => 'Movimientos de flota']
						],
						[
							'left' => ['text' => 'Galaxia', 'link' => 'game/galaxy'],
							'right' => ['icon' => 'fa fa-archive']
						],
						[
							'left' => ['text' => 'Alianza', 'link' => 'game/alliance', 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-archive']
						],
						[
							'left' => ['text' => 'Casino', 'link' => 'game/premium', 'premium' => TRUE, 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-archive']
						],
						[
							'left' => ['text' => 'Tienda', 'link' => 'game/shop', 'premium' => TRUE, 'disabled' => TRUE],
							'right' => ['icon' => 'fa fa-archive', 'tooltip' => 'Inventario']
						]
					];

					foreach ($menu as $entry) { ?>
					<li>
						<div class="row">
						<?php if(isset($entry['left'])){ ?>
							<div class="col-md-10 col-xs-9 no-padding">
								<?php 
									$extra = '';
									$link = '';
									$disabled = '';
									if(isset($entry['left']['premium'])){ $extra .= 'premium-text '; }
									if(isset($entry['left']['active'])){ $extra .= 'active '; }
									if(isset($entry['left']['link'])){ $link = site_url($entry['left']['link']); }
									if(isset($entry['left']['disabled'])){ $disabled = 'disabled'; }
								?>
								<a href="<?= $link; ?>" <?= $disabled; ?> class="btn btn-default <?= $extra; ?>"><?= $entry['left']['text']; ?></a>
							</div>
						<?php }
							if(isset($entry['right'])){ ?>
							<div class="col-md-1 col-xs-2 no-padding pull-right">
								<?php 
									$extra = '';
									if(isset($entry['right']['premium'])){ $extra .= 'premium-text '; }
									if(isset($entry['right']['active'])){ $extra .= 'active '; }
								?>
								<a class="btn btn-default btn-xs <?= $extra; ?>" <?php if(isset($entry['right']['tooltip'])){ echo 'title="' .$entry['right']['tooltip'] .'"'; } ?>><i class="<?= $entry['right']['icon']; ?>"></i></a>
							</div>
						<?php } ?>
						</div>
					</li>
					<?php } ?>
				</ul>
				<div class="col-xs-12 no-padding">
					<div class="panel white-text">
						El Happy Hour terminará en: <br />
						<h3 style="font-size: 18px;" class="premium-text countdown" data-time="2016-01-03">14h 13m 12s</h3>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-xs-3 text-center">
						<div class="col-xs-6"><a href="<?= site_url('game/messages'); ?>" class="ajax-game button-icon"><i class="fa fa-3x fa-envelope"></i></a></div>
						<div class="col-xs-6"><a href="<?= site_url('game/chat'); ?>" class="ajax-game button-icon"><i class="fa fa-3x fa-comment"></i></a></div>
					</div>
					<div class="col-xs-8 text-center no-padding white-text">
						<p style="display:table-cell; vertical-align: middle; height: 34px;">
							<i class="fa fa-info"></i> Everything is OK. :)
						</p>
					</div>
					<div class="col-xs-1 text-center no-padding">
						<i class="fa fa-3x fa-exclamation-triangle"></i>
					</div>
				</div>
				<div class="row" id="ajax-game-container">
					<script>
						$(function(){
							<?php if(isset($redirect) and !empty($redirect)){ $url = $redirect; } else { $url = site_url('game/overview'); } ?>
							$.pjax({url: "<?= $url; ?>", container: "#ajax-game-container" });
						});
					</script>
				</div>
			</div>
			<div class="col-md-2 col-xs-12 no-padding pull-right" style="margin-right: -32px;">
				<!-- Planet list -->
				<div class="panel">
					<div class="panel-heading text-center">1/1 Planetas</div>
					<div class="panel-body white-text">
						<div class="planet">
							<img>
							<span class="name"><?= $this->planet->name($this->session->userdata('current_planet')); ?></span>
							<span class="position">3:17:12</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-xs-12">
		<!-- Ads right -->
	</div>
</main>

<script src="<?php echo base_url('js/script.js'); ?>"></script>
<script>
OGame.BaseURL = "<?= base_url(); ?>";
moment.locale('es');
ion.sound({
	sounds: [
		{name: "alarm"},
		{name: "completed"},
		{name: "confirm"},
		{name: "error"},
		{name: "newtask"},
		{name: "question"},
		{name: "select"},
		{name: "select_2"},
		{name: "send"},
		{name: "ratchet_buy"},
		{name: "ratchet_error"},
		{name: "ratchet_select"},
	],

	path: OGame.BaseURL + "sounds/",
	preload: true,
	multiplay: true,
	volume: 0.5,
});
$(document).pjax('.ajax-game, .ogame-menu-left a', '#ajax-game-container');
$(document).on('pjax:send', function(){
	ion.sound.play("select_2");
	$("#loader").show(0);
});
$(document).on('pjax:complete',function(){
	$("#loader").fadeOut(200);
});

var Planet = {
	Resources: {
		Metal: {
			Amount: 0,
			Max: 10000,
			PerHour: 3600
		},
		Crystal: {
			Amount: 0,
			Max: 10000,
			PerHour: 5400
		},
		Deuterium: {
			Amount: 13566,
			Max: 10000,
			PerHour: 0
		},
		Energy: {
			Amount: 0,
		},
	},
	Name: "Planeta del Retraso",
};

var Account = {
	DarkMatter: 1040,
	Name: "duhow",
};

$(function(){
	OGame.System.Start();
	Tipped.create('[title]', function(e){
		return {
			title: $(e).data('header'),
			content: $(e).prop('title'),
		};
	});

	$(".countdown").text( moment( $(".countdown").data('time') ).fromNow() );
});

</script>
</body>
</html>