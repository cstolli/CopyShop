/*
    Dav Glass
    <dav.glass@yahoo.com>
    http://davglass.com/
*/
YAHOO.widget.Gestures = {
    init: function(obj) {
        //init the object
        if (!obj) {
            alert('You must define a config object!');
            return false;
        }
        this.config = obj;
        if (!this.config.threshold) {
            this.config.threshold = 20;
        }
        this.config.enabled = true;
		this.config.starttarget = 0;
		this.config.endtarget = 0;
        YAHOO.util.Event.addListener(document, 'mousedown', YAHOO.widget.Gestures._mouseDown, YAHOO.widget.Gestures, true);
        YAHOO.util.Event.addListener(document, 'mouseup', YAHOO.widget.Gestures._mouseUp, YAHOO.widget.Gestures, true);
    },
    _mouseDown: function(ev) {
		this.config.starttarget = ev.target.id;
        this.config.down_x = YAHOO.util.Event.getPageX(ev);
        this.config.down_y = YAHOO.util.Event.getPageY(ev);
		// if it's not to the left of a doodle, return;
    },
    _mouseUp: function(ev) {
		this.config.endtarget = ev.target.id;
		//alert(this.config.starttarget + ' ' + this.config.endtarget);
        var proc = false;
        this.config.up_x = YAHOO.util.Event.getPageX(ev);
        this.config.up_y = YAHOO.util.Event.getPageY(ev);
        if (this.config.enabled) {
            YAHOO.util.Event.stopEvent(ev);
			if (this.config.starttarget == this.config.endtarget && this.config.endtarget.indexOf("td_doodle_") !== -1) {
            	this.handle(this.config.endtarget);
			}
            
        }
    },
    disable: function() {
        this.config.enabled = false;
    },
    enable: function() {
        this.config.enabled = true;
    },
    handle: function(elid) {
        var func = '';
        var offsetX = (this.config.down_x - this.config.up_x);
		
        if (this.config.up_x > this.config.down_x) {
            offsetX = (this.config.up_x - this.config.down_x);
        }
        var offsetY = (this.config.down_y - this.config.up_y);
        if (this.config.up_y > this.config.down_y) {
            offsetY = (this.config.up_y - this.config.down_y);
        }
        if (offsetY > this.config.threshold) {
            if (this.config.down_y > this.config.up_y) {
                func = 'up';
            }
            if (this.config.down_y < this.config.up_y) {
                func = 'down';
            }
        }
        if (offsetX > this.config.threshold) {
            if (this.config.down_x > this.config.up_x) {
                func += 'left';
            }
            if (this.config.down_x < this.config.up_x) {
                func += 'right';
            }
        }
        if (func != '') {
            var tmpFunc = eval('this.config.' + func);
			
            if (typeof tmpFunc == 'function') {
			if (offsetX > 300 || offsetX < -300){	
                tmpFunc(elid);
			}
            }
        }
        this.config.up_x = 0;
        this.config.up_y = 0;
        this.config.down_x = 0;
        this.config.down_y = 0;
    }
}
