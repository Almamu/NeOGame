var MINUTE = 60;
var HOUR = 60 * MINUTE;
var DAY = 24 * HOUR;

var OGame = {
	BaseURL: '',
	System: {
		Start: function(){
			OGame.System.Tick();
			
			// Descargar info de usuario
			// Descargar info de planeta
			// Poner la materia oscura
			// Blablabla
		},

		AnimateStats: function(){
			$('.stats').each(function() {
				var target = $(this);
				var fVal = $(this).data('value');
				var iVal = parseInt(target.text());
				if(iVal != fVal){
					$({
						someValue: iVal
					}).animate({
						someValue: fVal
					}, {
						duration: 700,
						easing: 'swing',
						step: function() {
							target.text(Math.round(this.someValue));
						},
						complete: function(){
							target.text(Math.round(fVal));
						}
					});
				}

				// target.removeClass('danger-text success-text');
				// Over Max Value
				var mVal = target.data('max');
				if(!mVal){
					if(fVal >= mVal){ target.removeClass('success-text').addClass('danger-text'); }
				}

				// Negative Value
				if(fVal < 0){ target.removeClass('success-text').addClass('danger-text'); }
			});
		},

		Clock: function(){
			$("#clock").text(moment().format("L HH:mm:ss"));
		},

		Tick: function(){
			OGame.System.Clock();
			OGame.System.AnimateStats();
			OGame.Resources.ParseTiming();
			OGame.Resources.Update();
			// runMaterials();

			setTimeout(function(){ OGame.System.Tick(); }, 1000);
		},

		PlanetName: function(){
			$(".planet-name").each(function(){
				$(this).text( Planet.Name );
			});
		},

		PasswordSecurity: function(password){
			// Factor: 100 / 7 checks
			var Security = 0; var Increment = (100/7);
			var Match = {
				Symbols: ' !"#$%&()\'*+,-./:;<=>?@[\\]^_`{|}~',
				Numbers: '0123456789',
				Lower: 'abcdefghijklmnopqrstuvwxyz',
				Upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
			};
			$.each(Match, function(e, ch){
				for(i = 0; i < ch.length; i++){
					if(password.indexOf(ch[i])>-1){ Security += Increment; break; }
				}
			});
			$.each([12,10,8], function(i, ln){
				if(password.length >= ln){ Security += Increment; }
			});
			if(password.length < 8){ Security = 0;}

			return Math.round(Security);
		}
	},

	Resources: {

		LimitMax: function(type){
			if(Planet.Resources[type].Amount > Planet.Resources[type].Max){
				Planet.Resources[type].Amount = Planet.Resources[type].Max;
			}
			// Excepto en la energía, ojo con esto! :O
			if(Planet.Resources[type].Amount < 0){ Planet.Resources[type].Amount = 0; }
		},

		Set: function(type, amount){
			Planet.Resources[type].Amount = amount;
			OGame.Resources.LimitMax(type);
		},

		Add: function(type, amount){
			Planet.Resources[type].Amount += amount;
			OGame.Resources.LimitMax(type);
		},

		Update: function(type){
			if(typeof type === 'undefined'){
				type = Planet.Resources;	
			}

			$.each(type, function(Material){
				var amount = 0;
				if(Planet.Resources[Material].Amount){ amount = Planet.Resources[Material].Amount; }

				// Animation will change the visual value :)
				$("#materials ." + Material.toLowerCase() + " span.stats").data('value', amount);
			});
		},

		ParseTiming: function(){
			$.each(Planet.Resources, function(i, Material){
				OGame.Resources.Add(i, (Material.PerHour / HOUR));
			});
		}
	},

	DarkMatter: {
		Update: function(){
			// $("#materials .darkmatter span.stats");
		},
	},

	Buildings: {
		Upgrade: function(id){
			$.ajax({
				url: OGame.BaseURL + "api/upgrade/buildings/" + id,
				dataType: "json"
			}).done(function(ret){
				
			}).fail(function(ret){

			});
		}
	}

};

// Change selected menu entry
$(".ogame-menu-left a").click(function(e){
	$(".ogame-menu-left *").each(function(){
		$(this).removeClass('active');
	});
	$(this).addClass('active');
});
/* $(".ogame-menu-left a").hover(function(e){
	ion.sound.play("select_2");
}, function(){}); */