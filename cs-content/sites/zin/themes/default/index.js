var events = YAHOO.util.Event;
var $$ = YAHOO.util.Selector.query;
var fx = YAHOO.widget.Effects;
//var $ = YAHOO.util.Dom;
var ani =  YAHOO.util.Anim;
var el = YAHOO.util.Element;

function openframe(el) {

  var id=el.id;
  
  var frm = document.getElementById("frame_" + id);

  if (frm.style.height == '1px') {
   frm.style.height='auto';

   el.src='cs-content/sites/zin/themes/default/images/zin_minus_icon.png';
}
else{
  frm.style.height='1px';
 el.src='cs-content/sites/zin/themes/default/images/zin_plus_icon.png';
}
}


var events = YAHOO.util.Event;
events.addListener(window, "load", attachToForms);	   
events.onDOMReady(function(){
						   
					
			//animateIntro();			   		   
//	flirInit();
	//initNavHistory();

});

