var events = YAHOO.util.Event;
var $$ = YAHOO.util.Selector.query;
var fx = YAHOO.widget.Effects;
var $ = YAHOO.util.Dom;
var ani = YAHOO.util.Anim;





function animateIntro() {
	
	var ani = new YAHOO.util.Anim('grass', {top: {to:120}}, .5, YAHOO.util.Easing.easeOut);
	
	ani.animate();

	var ani = new YAHOO.util.Anim('dry_grass', {top: {to:70}}, .7, YAHOO.util.Easing.easeOut);

	ani.animate();
	
	var ani = new YAHOO.util.Anim('trees', {top: {to:0}}, .9, YAHOO.util.Easing.easeOut);

	ani.animate();
	
	var ani = new YAHOO.util.Anim('hills', {top: {to:0}}, 1.1, YAHOO.util.Easing.easeOut);

	ani.animate();
	
	var ani = new YAHOO.util.Anim('clouds1', {top: {to:-50}}, 1.3, YAHOO.util.Easing.easeOut);

	ani.animate();
	
	var ani = new YAHOO.util.Anim('clouds2', {top: {to:-50}}, .8, YAHOO.util.Easing.easeOut);
	
	var road = new YAHOO.util.Anim('road1', {height: {to:100}}, .5, YAHOO.util.Easing.easeOut);

	var road2 = new YAHOO.util.Anim('road2', {height: {to:60}}, .5, YAHOO.util.Easing.easeOut);
	
	var shop = new YAHOO.util.Anim('shop', {left: {to: 0}}, .5, YAHOO.util.Easing.easeOut);
	var tower = new YAHOO.util.Anim('tower', {top: {to: -220}}, .5, YAHOO.util.Easing.easeOut);
	var hood = new YAHOO.util.Anim('hood_dark', {top: {to: -190}}, .5, YAHOO.util.Easing.easeOut);
	
	var menu = new YAHOO.util.Anim('cs_site_menu', {left: {to: 100}}, .5, YAHOO.util.Easing.easeOut);
	var content = new YAHOO.util.Anim('cs_content', {opacity: {to: 1}}, .5, YAHOO.util.Easing.easeOut);

	ani.onComplete.subscribe(function() {
									  
			content.onComplete.subscribe(function() {			
				
				setTimeout('$.setStyle(\'hood\', \'visibility\', \'visible\');', 500);

		
			});
												 
			
			tower.onComplete.subscribe(function() { hood.animate(); menu.animate(); content.animate();});
			
			shop.onComplete.subscribe(function() { tower.animate();});
			
			road.onComplete.subscribe(function() {shop.animate();});
			
			road2.onComplete.subscribe(function() { road.animate(); });
				
			road2.animate();
			
			
			
	});
	

	ani.animate();
	

}


function flirInit() {
	
	FLIR.init( { path: 'cs-includes/facelift-1.2/' } );
}



var events = YAHOO.util.Event;

events.onDOMReady(function(){
						   
						   
			//animateIntro();			   		   
//	flirInit();
	//initNavHistory();

});


