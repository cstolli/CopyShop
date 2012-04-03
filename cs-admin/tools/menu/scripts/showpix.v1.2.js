// -----------------------------------------------------------------------------------
// 
// This page coded by Scott Upton
// http://www.uptonic.com | http://www.couloir.org
//
// This work is licensed under a Creative Commons License
// Attribution-ShareAlike 2.0
// http://creativecommons.org/licenses/by-sa/2.0/
//
// Associated frameworks copyright their respective owners
//
// -----------------------------------------------------------------------------------
// --- version date: 07/23/2007 ------------------------------------------------------


/* Basic settings to allow URL-based bookmarking
------------------------------------------------------------*/

// Specify your design's photo CSS border size
var borderSize = 0;

// Get current photo id from URL
var curURL = document.location.href;
var splitURL = curURL.split("#");
var photoId = splitURL[1] - 1;

// If no photoId supplied then set default
var photoId = (!photoId)? 0 : photoId;

// Multiply user-supplied CSS border size from layout
var borderSize = borderSize*2;

// Thumbnails shown already?
var hasThumbs = false;


/* ShowPix Class
------------------------------------------------------------*/
var ShowPix = new Class({
	initialize: function(rsp){
		this.registerEvents();
		this.tweenTimer	= 100;
		this.playTimer	= 3000;
		this.tweenType	= Fx.Transitions.quintOut;
		this.loadDelay	= 0;
		this.loadTimer	= this.tweenTimer + this.loadDelay;
		this.photoNum	= rsp.photos.photo.length;
		this.photoInfo	= {};
		this.rsp 		= rsp;
		
		// Loop through to build object with each photo's info
		for (var i=0; i<this.photoNum; i++){
			this.photoInfo[i] = {
				'id': rsp.photos.photo[i].id,
				'owner': rsp.photos.photo[i].owner,
				'src': 'http://static.flickr.com/'+rsp.photos.photo[i].server+'/'+rsp.photos.photo[i].id+'_'+rsp.photos.photo[i].secret+'.jpg',
				'title': rsp.photos.photo[i].title
			}
			if(i == this.photoNum-1){this.initSwap();}
		}		
	},
	setNewPhotoParams: function(){
		// Set source of new image
		$('Photo').setProperty('src', this.photoInfo[photoId].src);
	},
	setPhotoCaption: function(){
		// Add caption from gallery array
		$('Caption').setHTML(this.photoInfo[photoId].title);
		$('Counter').setHTML(((photoId+1) + '/' + this.photoNum));
		
		// Pop caption link in new window
		$$('#Caption a').addEvent("click", function(e) {
			window.open(this.href);
			new Event(e).stop();
		});
	},
	startResize: function(pid){
		// Get current photo dimensions
		this.wCur = $('Container').getStyle('width').toInt();
		this.hCur = $('Container').getStyle('height').toInt();
		
		// Get new photo dimensions from Flickr
		new MooPix().callFlickrUrl({method: 'flickr.photos.getSizes', photo_id: pid});
	},
	endResize: function(rsp){
		// Set new photo dimensions from response
		this.wNew = rsp.sizes.size[3].width;
		this.hNew = rsp.sizes.size[3].height;
		
		if(this.hCur == this.hNew && this.wCur == this.wNew){
			// Set photo source and links on delay (Firefox bug)
			this.setNewPhotoParams.delay(10,this);
		} else {
			// Set photo source and links
			this.setNewPhotoParams();
			// Only resize if needed
			var myPhoto = new Fx.Styles('Container', { duration: this.tweenTimer, transition: this.tweenType }).custom({
				'height': [this.hCur, this.hNew],
				'width': [this.wCur, this.wNew]
			});
			var myCaption = new Fx.Styles('CaptionContainer', { duration: this.tweenTimer, transition: this.tweenType }).custom({
				'width': [this.wCur, this.wNew]
			});
		}
	},
	showPhoto: function(){		
		// Show photo block, but hide loading graphic
		$('Photo').setStyle('display','block');
		//$('Loading').setStyle('display','none');
		
		// Fade photo in
		//$('Photo').effect('opacity').custom(0,1).chain(function(){
			//$('Controls').setStyle('display','block');
		//});
	},
	nextPhoto: function(){		
		// Figure out which photo is next
		(photoId == (this.photoNum - 1)) ? photoId = 0 : photoId++;
		this.initSwap();
	},
	prevPhoto: function(){
		// Figure out which photo is previous
		(photoId == 0) ? photoId = this.photoNum - 1 : photoId--;
		this.initSwap();
	},
	jumpToPhoto: function(id){
		// Enable direct jumps to specific photos
		photoId = id;
		this.initSwap();
	},
	initSwap: function(){
		// Show loading graphic
		//$('Loading').setStyle('display','block');
		
		// Hide photo, caption, navigation	
		//$('Photo').setStyles({opacity: 0, display: 'none'});
		//$('Controls').setStyle('display','none');
		
		// Resize container and set caption
		this.startResize(this.photoInfo[photoId].id);
		this.setPhotoCaption();
		
		// Highlight the selected image in thumbnail view
		this.setActiveThumb();
	},
	toggleAutoPlay: function(timer){
		if(this.playingInt){
			this.stopAutoPlay();
		} else {
			this.nextPhoto(); 
			this.startAutoPlay(timer);
		}
	},
	startAutoPlay: function(timer){
		this.playingInt = (function(){ this.nextPhoto(); }).bind(this).periodical(timer);
		$('PlayToggle').addClass('pause');
	},
	stopAutoPlay: function(){
		$clear(this.playingInt);
		this.playingInt = null;
		$('PlayToggle').removeClass('pause');
	},
	createThumbs: function(rsp){
		var thumbLink = {};
		var thumbImage = {};
		
		// Loop through photos to generate gallery
		rsp.photos.photo.each(function(value, key) {
			
			// Create links to large photos
			thumbLink[key] = new Element('a', {
				'href': 'javascript://',
				'title': value.title,
				'events': {
					click: function(){
						Slideshow.jumpToPhoto(key); // hack because bind(this) fails
						//$('ThumbContainer').setStyle('display','none');
						$('Container').setStyle('display','block');
						$('CaptionContainer').setStyle('display','block');
					}
					//.bind(this)
				}
			}).injectInside('ThumbContainer');
			
			// 
			thumbImage[key] = new Element('img', {
				'height': '47',
				'width': '47',
				'alt': value.title,
				'src': 'http://static.flickr.com/'+value.server+'/'+value.id+'_'+value.secret+'_s.jpg'
			}).injectInside(thumbLink[key]);
		});
		
		hasThumbs = true;
	},
	setActiveThumb: function(){
		$$('#ThumbContainer a').each(function(el, key){
			el.removeClass('selected');
			if(key == photoId) { el.addClass('selected'); }
		});
	},
	registerEvents: function(){
		
		// Pop all links in paragraphs in new windows
		$$('p a').each(function(el) {
			el.addEvent("click", function(e) {
				window.open(el.href);
				new Event(e).stop()
			});
		});
		
		// Add events for slideshow
		$('PrevLink').addEvent( 'click', function(){ this.prevPhoto();this.stopAutoPlay(); }.bind(this));
		$('NextLink').addEvent( 'click', function(){ this.nextPhoto();this.stopAutoPlay(); }.bind(this));
		$('Photo').addEvent( 'load', function(){ this.showPhoto.delay(this.loadTimer); }.bind(this));
	//	$('Photo').addEvent( 'mouseover', function(){ $('Controls').setStyle('opacity','1.0'); }.bind(this));
	//	$('Photo').addEvent( 'mouseout', function(){ $('Controls').setStyle('opacity','0.7'); }.bind(this));
		//$('Controls').addEvent( 'mouseover', function(){ $('Controls').setStyle('opacity','1.0'); }.bind(this));
		//$('Controls').addEvent( 'mouseout', function(){ $('Controls').setStyle('opacity','0.7'); }.bind(this));
		$('PlayToggle').addEvent( 'click', function(){ this.toggleAutoPlay(this.playTimer); }.bind(this));
		
		
	}
});// JavaScript Document