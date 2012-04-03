// JavaScript Document

//window.onerror = function(){return true;}
var events = YAHOO.util.Event;
var el = YAHOO.util.Element;
var dom = YAHOO.util.Dom;
var $$ = YAHOO.util.Selector.query;


var $ = jQuery.noConflict();
var changetab=function(e){ 
	
	id = events.getTarget(e).id;
	var tabs = $$("div.tab");
	dom.setStyle(tabs, "display", "none");

	//var el = $$("div."+id);
	var el = $$("div#"+id);
	dom.setStyle(el, "display", "block");
	}
	
	//var selecttabs = $$('a#content');events.addListener("content_select", "click",al );
//panel.showEvent.subscribe(myEditor.show, myEditor, true); 
events.onDOMReady(function(){
	
	var al=function(e){ 
	alert(this.id);
	}
	
	var selecttabs = $$('a.button.tab');

	
	events.addListener(selecttabs, "click", changetab, this);
	events.addListener($$('.cs_version_button'), "click", saveVersion, this);
	//vents.addListener(element, "change", function(){alert('hello');}, this);
	//$('input[name="upload2"]').bind('change', function(){alert('hello');});
	//$('.cs_preview_button').bind('click', previewPage);
	
	//events.addListener('cke_88_textInput', "change", fixImgUrl, this);
	//events.addListener('cke_88_textInput', "blur", fixImgUrl, this);
	//events.addListener('cke_88_textInput', "focus", fixImgUrl, this);
	
	//alert($('swilTerm').attr('id'));
	
	$('form#swilTerm').submit(function() {
 		 var result = $.post("/copyshop/cs-includes/swil.php", $(this).serialize(),
   			function(data) {
				//alert(data);
    		 var results = $.parseJSON(data);
			 if (results){
				//alert(results);
				 //var nmfld = results.namefield;
				// var form = "{'hid_action':'add', 'hid_referrer':'ajax', 'hid_table': " + results.model+", "+nmfld+":"+results.item};
				// alert(form);
			 $.post("/copyshop/cs-includes/db.php", results, function (data)
			 	
			 	{ var newEl = $('.cs_edit_row').first().clone(); $('.cs_edit_row').first().before(newEl); $('.cs_edit_row:first-child').attr('id', 'cs_data_div_'+data); $('.cs_edit_row:first-child>a').text(results[results.namefield]); $('.cs_edit_row:first-child>a').attr('href', '?tbl='+results.hid_table+'&action=form&id='+data);
				  $('#swil').val(results.hid_action + " '" + results.hid_table.replace('cs_', '').replace("_", "") + "' ");
				//alert(data);
				});
			 	
			 }
   			});
 	 	return false;
	});
	
	start();});


//YAHOO.util.Event.onDOMReady(start());
cal = null, //Reference to the calendar object we are about to create
        selectedDate = null; //Reference to the current selected date.


function saveVersion(){alert('saving version');

	$('#hid_action').attr('value', 'version');
	$('#hid_referrer').attr('value', $('#hid_referrer').attr('value').replace("status=1", "status=2"));
	$('.cs_tool_box').submit();
}

function fixImgUrl(){

	document.getElementById('cke_88_textInput').value= "../cs-content/sites/"+CS_SITE+"/uploads" + el.slice(el.indexOf('/images/'));
	
}

function hello(){
	alert('hello');
}
function statusFade(){
	
		
		
		
		
		
			
		
		//setTimeout('something.styles.display=\'none\'', 2000);
		
}

var callback =
{
	customevents:{
		onStart:function(eventType, args) {
		  // eventType has a string value of "startEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onComplete:function(eventType, args) {
			//delete it from the main div
			
		  // eventType has a string value of "completeEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onSuccess:function(eventType, args) {
			
			//alert(args[0].responseText);
		  	var blah = document.getElementById('cs_data_div_'+args[0].responseText);
			
			
			
			blah.parentNode.removeChild(blah);
//		   * eventType has a string value of "successEvent".
//		   * args[0] is the response object, which has the
//		   * following properties:
//		   *
//		   * args[0].tId
//		   * args[0].status
//		   * args[0].statusText
//		   * args[0].getResponseHeader[ ]
//		   * args[0].getAllResponseHeaders
//		   * args[0].responseText
//		   * args[0].responseXML
//		   * args[0].argument
//		   
		},
		onFailure:function(eventType, args) {
		  // eventType has a string value of "failureEvent".
		  // args[0] is the response object.
		},

        // Define this event handler for file upload transactions *only*.
        // This handler will not be used for any other transaction cases.
		onUpload:function(eventType, args) {
		  // eventType has a string value of "uploadEvent".
		  // args[0] is the response object.
		},
		onAbort:function(eventType, args) {
		  // eventType has a string value of "abortEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		}
	}
}

function confirmDelete(form)
{ 

	
	
 	if (confirm("Really? Deleting this item cannot be undone."))
	{
		YAHOO.util.Connect.setForm(form);
		//alert(form.action);
	    YAHOO.util.Connect.asyncRequest('POST', form.action, callback, null); 
		
	}
	else
	{
		
	}
	
	return false;

}


function confirmFeature(form)
{ 
	//alert(form.id);

		var id = form.id.replace('cs_feature_form_', '');
	
		//alert(id);
 	//if (confirm("Feature this item?"))
	//{
		
		
		
		YAHOO.util.Connect.setForm(form);
		
		//alert(form.action);
	    YAHOO.util.Connect.asyncRequest('POST', form.action, featurecallback, null); 
		
		//alert(form.id);
		
	//}
	//else
	//{
		
	//}
	
	//return false;

}


var featurecallback =
{
	customevents:{
		onStart:function(eventType, args) {
		  // eventType has a string value of "startEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onComplete:function(eventType, args) {
			//delete it from the main div
			
		  // eventType has a string value of "completeEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onSuccess:function(eventType, args) {
			
			var id = args[0].responseText;
			//alert(id);
		  	//var blah = document.getElementById('cs_data_div_'+args[0].responseText);
			var cbx = document.getElementById('inp_featured_'+id);
			
		if (cbx.checked == true) { cbx.checked = false;} else {cbx.checked = true;}
			//blah.parentNode.removeChild(blah);
//		   * eventType has a string value of "successEvent".
//		   * args[0] is the response object, which has the
//		   * following properties:
//		   *
//		   * args[0].tId
//		   * args[0].status
//		   * args[0].statusText
//		   * args[0].getResponseHeader[ ]
//		   * args[0].getAllResponseHeaders
//		   * args[0].responseText
//		   * args[0].responseXML
//		   * args[0].argument
//		   
		},
		onFailure:function(eventType, args) {
		  // eventType has a string value of "failureEvent".
		  // args[0] is the response object.
		},

        // Define this event handler for file upload transactions *only*.
        // This handler will not be used for any other transaction cases.
		onUpload:function(eventType, args) {
		  // eventType has a string value of "uploadEvent".
		  // args[0] is the response object.
		},
		onAbort:function(eventType, args) {
		  // eventType has a string value of "abortEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		}
	}
}

function confirmDuplicate(form)
{ 

	
	
 	if (confirm("Really? This will duplicate the selected item."))
	{
		//YAHOO.util.Connect.setForm(form);
		//alert(form.action);
	    //YAHOO.util.Connect.asyncRequest('POST', form.action, dupCallback, null); 
		form.submit();
		
	}
	else
	{
		
	}
	
	return false;

}



function ajaxNews(form){
	
	if (confirm("Really?") ){ 
	
	YAHOO.util.Connect.setForm(form);
		//alert(form.action);
	    YAHOO.util.Connect.asyncRequest('POST', form.action, newsBack, null); 
	
		return false;
	}
}



var formBack =
{
	customevents:{
		onStart:function(eventType, args) {
		  // eventType has a string value of "startEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onComplete:function(eventType, args) {
			//delete it from the main div
			
		  // eventType has a string value of "completeEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onSuccess:function(eventType, args) {
			
			//alert(args[0].responseText);
		  	var blah = document.getElementById('cs_tools_image_thumb_div_'+args[0].responseText);
			
//		   * eventType has a string value of "successEvent".
//		   * args[0] is the response object, which has the
//		   * following properties:
//		   *
//		   * args[0].tId
//		   * args[0].status
//		   * args[0].statusText
//		   * args[0].getResponseHeader[ ]
//		   * args[0].getAllResponseHeaders
//		   * args[0].responseText
//		   * args[0].responseXML
//		   * args[0].argument
//		   
		},
		onFailure:function(eventType, args) {
		  // eventType has a string value of "failureEvent".
		  // args[0] is the response object.
		},

        // Define this event handler for file upload transactions *only*.
        // This handler will not be used for any other transaction cases.
		onUpload:function(eventType, args) {
		  // eventType has a string value of "uploadEvent".
		  // args[0] is the response object.
		},
		onAbort:function(eventType, args) {
		  // eventType has a string value of "abortEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		}
	}
}


var picOrderCallback =
{
	customevents:{
		onStart:function(eventType, args) {
		  // eventType has a string value of "startEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onComplete:function(eventType, args) {
			//delete it from the main div
			
		  // eventType has a string value of "completeEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		},
		onSuccess:function(eventType, args) {
			
			//alert(args[0].responseText);
		  	//var blah = document.getElementById('cs_tools_image_thumb_div_'+args[0].responseText);
			
//		   * eventType has a string value of "successEvent".
//		   * args[0] is the response object, which has the
//		   * following properties:
//		   *
//		   * args[0].tId
//		   * args[0].status
//		   * args[0].statusText
//		   * args[0].getResponseHeader[ ]
//		   * args[0].getAllResponseHeaders
//		   * args[0].responseText
//		   * args[0].responseXML
//		   * args[0].argument
//		   
		},
		onFailure:function(eventType, args) {
		  // eventType has a string value of "failureEvent".
		  // args[0] is the response object.
		},

        // Define this event handler for file upload transactions *only*.
        // This handler will not be used for any other transaction cases.
		onUpload:function(eventType, args) {
		  // eventType has a string value of "uploadEvent".
		  // args[0] is the response object.
		},
		onAbort:function(eventType, args) {
		  // eventType has a string value of "abortEvent".
		  // args[0].tId is the integer transaction ID.
		  // args[1] contains the value of <code>callback.argument</code>, if callback.argument is defined.
		}
	}
}


var Dom = YAHOO.util.Dom;
var Event = YAHOO.util.Event;
var DDM = YAHOO.util.DragDropMgr;

//////////////////////////////////////////////////////////////////////////////
// example app
//////////////////////////////////////////////////////////////////////////////
YAHOO.example.DDApp = {
    init: function() {
		thumbs = $$(".cs_tools_image_thumb_div");
	
		//alert(thumbs.length);
	
		thumbsdrag = new Array();
	
		for (var x in thumbs) {
	 		//thumbsdrag[x] = new YAHOO.util.DD(thumbs[x]);
		}
        var rows=thumbs.length,cols=1,i,j;
        //for (i=1;i<cols+1;i=i+1) {
           new YAHOO.util.DDTarget("cs_uploader_photos");
        //}

       // for (i=1;i<cols+1;i=i+1) {
           for (j=0;j<rows;j=j+1) {
			 // alert("li.cs_tools_image_thumb_div."+j);
			 
			  
               new YAHOO.example.DDList(thumbs[j]);
			   
           }
       // }

        //Event.on("showButton", "click", this.showOrder);
       // Event.on("switchButton", "click", this.switchStyles);
    },

    showOrder: function() {
        var parseList = function(ul, title) {
            var items = ul.getElementsByTagName("li");
            var out = title + ": ";
            for (i=0;i<items.length;i=i+1) {
                out += items[i].id + " ";
            }
            return out;
        };

        var ul1=Dom.get("ul1"), ul2=Dom.get("ul2");
        alert(parseList(ul1, "List 1") + "\n" + parseList(ul2, "List 2"));

    },

    switchStyles: function() {
        //Dom.get("ul1").className = "draglist_alt";
        //Dom.get("ul2").className = "draglist_alt";
    }
};

//////////////////////////////////////////////////////////////////////////////
// custom drag and drop implementation
//////////////////////////////////////////////////////////////////////////////

YAHOO.example.DDList = function(id, sGroup, config) {

    YAHOO.example.DDList.superclass.constructor.call(this, id, sGroup, config);

    this.logger = this.logger || YAHOO;
    var el = this.getDragEl();
    Dom.setStyle(el, "opacity", 0.67); // The proxy is slightly transparent

    this.goingUp = false;
    this.lastY = 0;
};

YAHOO.extend(YAHOO.example.DDList, YAHOO.util.DDProxy, {

    startDrag: function(x, y) {
        this.logger.log(this.id + " startDrag");

        // make the proxy look like the source element
        var dragEl = this.getDragEl();
        var clickEl = this.getEl();
        Dom.setStyle(clickEl, "visibility", "hidden");
		
		//alert(clickEl.id);

        dragEl.innerHTML = clickEl.innerHTML;

        Dom.setStyle(dragEl, "color", Dom.getStyle(clickEl, "color"));
        Dom.setStyle(dragEl, "backgroundColor", Dom.getStyle(clickEl, "backgroundColor"));
        Dom.setStyle(dragEl, "border", "2px solid gray");
    },

    endDrag: function(e) {

        var srcEl = this.getEl();
        var proxy = this.getDragEl();

        // Show the proxy element and animate it to the src element's location
        Dom.setStyle(proxy, "visibility", "");
        var a = new YAHOO.util.Motion( 
            proxy, { 
                points: { 
                    to: Dom.getXY(srcEl)
                }
            }, 
            0.2, 
            YAHOO.util.Easing.easeOut 
        )
        var proxyid = proxy.id;
        var thisid = this.id;

        // Hide the proxy and show the source element when finished with the animation
        a.onComplete.subscribe(function() {
                Dom.setStyle(proxyid, "visibility", "hidden");
                Dom.setStyle(thisid, "visibility", "");
            });
        a.animate();
		
		// getting the list of items in the container in order
		// show me that list by postiion 1-6 and see what the id's are
		
		thumbs = $$(".cs_tools_image_thumb_div");
		
		var postfields = "";
		
		for (var x in thumbs) {
			postfields += thumbs[x].id.replace("cs_data_div_", "") + "=" + x + "&";
	 		//thumbsdrag[x] = new YAHOO.util.DD(thumbs[x]);
		}
		
		
		//alert(form.action);
	    YAHOO.util.Connect.asyncRequest('POST', "tools/images/updateorder.php", picOrderCallback, postfields); 
		
    },

    onDragDrop: function(e, id) {

		

        // If there is one drop interaction, the li was dropped either on the list,
        // or it was dropped on the current location of the source element.
        if (DDM.interactionInfo.drop.length === 1) {

            // The position of the cursor at the time of the drop (YAHOO.util.Point)
            var pt = DDM.interactionInfo.point; 

            // The region occupied by the source element at the time of the drop
            var region = DDM.interactionInfo.sourceRegion; 
				
            // Check to see if we are over the source element's location.  We will
            // append to the bottom of the list once we are sure it was a drop in
            // the negative space (the area of the list without any list items)
            if (!region.intersect(pt)) {
				
                var destEl = Dom.get(id);
                var destDD = DDM.getDDById(id);
                destEl.appendChild(this.getEl());
                destDD.isEmpty = false;
                DDM.refreshCache();
            }

        }
    },

    onDrag: function(e) {

        // Keep track of the direction of the drag for use during onDragOver
        var y = Event.getPageX(e);

        if (y < this.lastY) {
            this.goingUp = true;
        } else if (y > this.lastY) {
            this.goingUp = false;
        }

        this.lastY = y;
    },

    onDragOver: function(e, id) {
    
        var srcEl = this.getEl();
        var destEl = Dom.get(id);

        // We are only concerned with list items, we ignore the dragover
        // notifications for the list.
        if (destEl.nodeName.toLowerCase() == "li") {
            var orig_p = srcEl.parentNode;
            var p = destEl.parentNode;

            if (this.goingUp) {
                p.insertBefore(srcEl, destEl); // insert above
            } else {
                p.insertBefore(srcEl, destEl.nextSibling); // insert below
            }

            DDM.refreshCache();
        }
    }
});

Event.onDOMReady(YAHOO.example.DDApp.init, YAHOO.example.DDApp, true);



//function buildForm(
