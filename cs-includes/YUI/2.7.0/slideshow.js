var Dom = YAHOO.util.Dom;
var Event = YAHOO.util.Event;
var $ = function(id) {
      return document.getElementById(id);
}

//++++++++++++++++++++++++++++++++++++
// YUI IMAGE SLIDESHOW
// 1/9/2008 - Edwart Visser & Arjen Weeber
//
// show a slideshow of images
//
// REQUIRES: yahoo-dom-event.js
// OPTIONAL: animation-min.js
//
//++++++++++++++++++++++++++++++++++++

YAHOO.namespace("lutsr");

YAHOO.lutsr.slideshow = {
	// global variables inside properties objects
	properties : {
		slideshowAutoStart : false,
		slideshowPreload : false,
		slideshowSpeed : 2000,
		slideshowRootNode : null,
		slideshowListItems : null,
		slideshowFrames : null,
		slideshowFrameContainerId : null,
		slideshowIsAnimating : false,
		slideshowFadeInObject : null,
		slideshowFadeOutObject : null,
		isActive : null,
		isNext : null,
		slideshowKeyboardNavigation : true
	},

	disableDefaultBehaviour : function(e) {
		Event.preventDefault(e);
	},

	init : function(slideshowProperties) {		
		// set properties
		this.properties.slideshowAutoStart = slideshowProperties.autoStart;
		this.properties.slideshowPreload = slideshowProperties.preloadImages;
		this.properties.slideshowSpeed = slideshowProperties.slideSpeed;
		this.properties.slideshowRootNode =  $(slideshowProperties.rootId);
		this.properties.slideshowFrameContainerId =  slideshowProperties.frameContainer;

		if(this.properties.slideshowRootNode){
			var slideshowList = this.properties.slideshowRootNode.getElementsByTagName("ul")[0];
			this.properties.slideshowListItems = slideshowList.getElementsByTagName("li");
			this.properties.slideshowFrames = Dom.getElementsByClassName("frame","li",slideshowList);
			this.properties.isActive = this.getCurrent();
			this.properties.isNext = this.getNext();

			// build image container
			this.buildContainer();

			// set slide objects
			this.properties.slideshowFadeInObject = Dom.get("slide2");
			this.properties.slideshowFadeOutObject = Dom.get("slide1");

			// init navigation controlls
			this.initPagination();

			if(this.properties.slideshowAutoStart) {
				this.properties.slideshowIsAnimating = true;
				this.startTimer();
			}

			if(this.properties.slideshowPreload) {
				this.preloadImages();
			}
		}

		if(this.properties.slideshowKeyboardNavigation) {
			this.keyboardNavigation();
		}
	},

	getCurrent : function() {
		if(this.properties.slideshowFrames.length > 0) {
			for(var i=0; i<this.properties.slideshowFrames.length; i++) {
				if(Dom.hasClass(this.properties.slideshowFrames[i],"isActive")) {
					return i;
				}
			}
		}
	},

	getNext : function() {
		if(this.properties.isActive == this.properties.slideshowFrames.length -1) {
			return 0;
		} else {
			return this.properties.isActive + 1;
		}
	},
	
	getPrevious : function() {
		if(this.properties.isActive == 0) {
			return this.properties.slideshowFrames.length -1;
		} else {
			return this.properties.isActive - 1;
		}
	},

	buildContainer : function() {
		if(!$(this.properties.slideshowFrameContainerId)){
			var frameContainer = document.createElement("div");
			var imgA = document.createElement("img");
			var imgB = document.createElement("img");

			// set image sources
			imgA.setAttribute("src",this.properties.slideshowFrames[this.properties.isActive].getElementsByTagName("a")[0].getAttribute("href"));
			imgB.setAttribute("src",this.properties.slideshowFrames[this.properties.isNext].getElementsByTagName("a")[0].getAttribute("href"));

			Dom.addClass(imgA,"slide1");
			Dom.addClass(imgB,"slide2");

			frameContainer.id = this.properties.slideshowFrameContainerId;
			imgA.id = "slide1"; // starts as back image
			imgB.id = "slide2"; // starts as front image

			// append elements
			frameContainer.appendChild(imgA);
			frameContainer.appendChild(imgB);
			this.properties.slideshowRootNode.appendChild(frameContainer);
		}
	},
	
	initPagination : function() {
		for(var i=0; i<this.properties.slideshowListItems.length; i++) {
			var controlNode = this.properties.slideshowListItems[i].getElementsByTagName("a")[0];
			Event.addListener(controlNode,"click",this.disableDefaultBehaviour);

			// add behaviour based on classname
			switch(true) {
				case Dom.hasClass(this.properties.slideshowListItems[i],"navPrev") : var slideTarget = -1;
				break;

				case Dom.hasClass(this.properties.slideshowListItems[i],"navNext") : var slideTarget = 1;
				break;

				default : var slideTarget = 0;
				break;
			}

			Event.addListener(controlNode,"click",this.slideTo,{slidePosition:slideTarget,slideshowObject:this});
		}
	},

	slideTo : function(e,slideProperties,refObj) {
		var slideshowObject = slideProperties.slideshowObject;

		// turn off autostart
		slideshowObject.properties.slideshowAutoStart = false;

		if(!refObj) {
			refObj = this;
		}

		if(slideshowObject.properties.slideshowIsAnimating) {
			var timedAnim = window.setTimeout(function() {slideshowObject.slideTo(null,slideProperties,refObj);}, 1000);
			return false;
		}

		// set frame
		if(slideProperties.slidePosition == 1) {
			slideshowObject.properties.isNext = slideshowObject.getNext();
		} else if (slideProperties.slidePosition == -1) {
			slideshowObject.properties. isNext = slideshowObject.getPrevious();
		} else {
			slideshowObject.properties.isNext = slideshowObject.getSelected(refObj);
		}

		// set slideTo img object source
		slideshowObject.properties.slideshowFadeInObject.src = slideshowObject.properties.slideshowFrames[slideshowObject.properties.isNext].getElementsByTagName("a")[0].getAttribute("href");

		// animate to slideTo img
		slideshowObject.startAnimate(slideshowObject);
	},
	
	startAnimate : function(slideshowObject) {
		// fade out current slide
		fadeOutAnimation = new YAHOO.util.Anim(slideshowObject.properties.slideshowFadeOutObject, { opacity: { to: 0 }},10);
		fadeOutEnd = function() {
			// no action defined
		}
		fadeOutAnimation.useSeconds = false;
		fadeOutAnimation.onComplete.subscribe(fadeOutEnd);
		fadeOutAnimation.animate();
		slideshowObject.properties.slideshowIsAnimating = true;

		// fade in new slide
		fadeInAnimation = new YAHOO.util.Anim(slideshowObject.properties.slideshowFadeInObject, { opacity: { to: .999 }},10);
		
		fadeInEnd = function() {
			Dom.removeClass(slideshowObject.properties.slideshowFrames[slideshowObject.properties.isActive],"isActive");
			Dom.addClass(slideshowObject.properties.slideshowFrames[slideshowObject.properties.isNext],"isActive");

			slideshowObject.properties.slideshowFadeOutObject.src = slideshowObject.properties.slideshowFrames[slideshowObject.properties.isActive].getElementsByTagName("a")[0].getAttribute("href");
			slideshowObject.properties.isActive = slideshowObject.properties.isNext;

			// replace classes
			Dom.replaceClass(slideshowObject.properties.slideshowFadeInObject,"slide2","slide1");
			Dom.replaceClass(slideshowObject.properties.slideshowFadeOutObject,"slide1","slide2");

			// set new fadeIn & fadeOut object references
			slideshowObject.properties.slideshowFadeInObject = Dom.getElementsByClassName("slide2","img",slideshowObject.properties.slideshowRootNode)[0];
			slideshowObject.properties.slideshowFadeOutObject = Dom.getElementsByClassName("slide1","img",slideshowObject.properties.slideshowRootNode)[0];
			
			// remove any inline styling
			slideshowObject.properties.slideshowFadeInObject.removeAttribute("style");
			slideshowObject.properties.slideshowFadeOutObject.removeAttribute("style");
			slideshowObject.properties.slideshowIsAnimating = false;

			if(slideshowObject.properties.slideshowAutoStart) {
				slideshowObject.properties.isNext = slideshowObject.getNext();
				slideshowObject.properties.slideshowFadeInObject.src = slideshowObject.properties.slideshowFrames[slideshowObject.properties.isNext].getElementsByTagName("a")[0].getAttribute("href");

				slideshowObject.startTimer();
			}
		}
		fadeInAnimation.useSeconds = false;
		fadeInAnimation.onComplete.subscribe(fadeInEnd);
		fadeInAnimation.animate();
	},
	

	startTimer : function() {
		var slideshowObject = this;
		var animationTimer = window.setTimeout(function() { slideshowObject.startAnimate(slideshowObject);},this.properties.slideshowSpeed);
	},

	preloadImages : function() {
		for(var i=2; i<this.properties.slideshowFrames.length;i++) {
			var preloadImage = document.createElement("img");
			preloadImage.src = this.properties.slideshowFrames[i].getElementsByTagName("a")[0].getAttribute("href");
		}
	},

	getSelected : function(refObject) {
		// remove previous active class
		Dom.removeClass(this.properties.slideshowFrames[this.properties.isActive],"isActive");

		// set active class
		Dom.addClass(refObject.parentNode,"isActive");

		return this.getCurrent();
	},

	keyboardNavigation : function() {
		var refObj = this;
		Event.addListener(window,"keydown",this.keyPressed,refObj);
	},
	
	keyPressed : function(e,refObj) {
		if(e.keyCode == 37) {
			var slideProperties = {
				slidePosition:-1,
				slideshowObject:refObj
			}
			refObj.slideTo(e,slideProperties,refObj);
		} else if (e.keyCode == 39) {
			var slideProperties = {
				slidePosition: 1,
				slideshowObject:refObj
			}
			refObj.slideTo(e,slideProperties,refObj);
		}
	}
}

initPage = function() {
	// call slideshow init function 
	YAHOO.lutsr.slideshow.init(
	{
		rootId:"slideshowModule",
		autoStart:false,
		slideSpeed:1000,
		preloadImages:true,
		frameContainer:"slideshowFrameContainer"
	});
}

Event.on(window,"load",initPage);