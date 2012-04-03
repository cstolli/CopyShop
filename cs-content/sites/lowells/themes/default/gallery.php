<script>

function fadeIn(e){
	$(this).addClass("opaque");

}


function fadeOverlay(){

	var ol = document.getElementById("overlay");
	ol.style.display = "block";
	$.addClass("overlay", "opaque");
}


function showlightbox(e){

   var lb = document.getElementById('pic_frame');
      var ol = document.getElementById('overlay');
   
   var img = new Image();
  
   img.style.height="453px";
   img.id = "slide_pic"
      lb.innerHTML="";
   lb.appendChild(img);
	events.addListener("slide_pic", "load", fadeOverlay, true);
   
   img.src = this.src;
   
   
}

function closelightbox(e){

  var ol = document.getElementById('overlay');
  
   $.removeClass(ol, "opaque");
    ol.style.display = "none";
   
}

$(document).ready(function(){
						   
	//var photos = $("div.gallery img");

	$(".gallery img").bind("load", fadeIn);
	
	//events.addListener(photos, "click", showlightbox, true);
	//events.addListener("pic_frame", "click", closelightbox, true);


});

	   
</script>

