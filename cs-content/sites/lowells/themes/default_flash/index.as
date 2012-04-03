_global.ui = new Object();


ui.init = function()
{
	// set main_mc
	ui.main_mc = _root.main_mc;
	
	// choose which season to show by the user's local date
	var season = get_season();
	ui.main_mc.season_mc.attachMovie(season,"season",1);
}
ui.loadSection = function (s)
{
	if (this.main_mc.page.page_mc != undefined)
	{
		this.main_mc.page.page_mc.removeMovieClip();
	}
	this.main_mc.page.attachMovie(s,"page_mc",2);
}
ui.highlightNavButton = function (bt_active)
{
	var sy = 194;
	var dy = 14.4;
	var move_y = -20;
	var apple = this.nav_mc.apple;
	var stick = this.nav_mc.stick;
	var buttons = [
						{ bt: this.nav_mc.n1, sw: 60,  bracket: true },
						{ bt: this.nav_mc.n2, sw: 50,  bracket: true },
						{ bt: this.nav_mc.n3, sw: 30, bracket: true },
						{ bt: this.nav_mc.n4, sw: 40, bracket: true },
						{ bt: this.nav_mc.n5, sw: 50,  bracket: true },
						{ bt: this.nav_mc.n6, sw: 60,  bracket: true },
						{ bt: this.nav_mc.n7, sw: 50,  bracket: true },
						{ bt: this.nav_mc.n8, sw: 50,  bracket: false }
						
					 ];
	
	apple._visible = false;
	stick._width = 300;
	//myformat = new TextFormat();
			//myformat.color = 0x0000FF;
			//myformat.size =16;
			//myformat.align="center";				
			//myformat.font = "secret";
	for(var i=0; i<buttons.length; i++)
	{
		var bt = buttons[i];
		var bf = bt.bt.menu_label[0].getTextFormat();
		bt.bt._y =  (sy + dy * i);
		if (bt.bt == bt_active)
		{
			
			apple._y = bt_active._y - 20;
			stick._y = bt_active._y;
			
			apple._visible = true;
			move_y *= -1;
			
			var myformat:TextFormat = new TextFormat();
			myformat.font = "secret";
			myformat.size=20;
			
						//bf.font="secret";
			bt.bt.menu_label.text = toInitialCap(bt.bt.menu_label.text);
			bt.bt.menu_label.setTextFormat(myformat);
			bt.bt.menu_label._y = -27.5;
			stick.mask_mc._width = (300 - (bt.bt.menu_label.text.length * 5)) - 20;
			if (bt.bracket)
			{
				this.nav_mc.showBracket();
			}
			else
			{
				this.nav_mc.hideBracket();
			}
		}
		else
		{
			var myformat:TextFormat = new TextFormat();
			myformat.font = "gothmed";
			myformat.size=10;
			bt.bt.menu_label.text = bt.bt.menu_label.text.toUpperCase();
			bt.bt.menu_label.setTextFormat(myformat);
			bt.bt.menu_label._y = -7.4;
			//bt.bt.menu_label._height = 14.9;
			//bt.bt.nav_mc._height=14.9;
			bt.bt._y +=  move_y;
		}
	}
}
ui.initNav = function(nav_mc)
{
	this.nav_mc = nav_mc;
	this.text = "hello";
	this.nav_mc.showBracket = function() { this.stick_mask.gotoAndPlay(2); }
	this.nav_mc.hideBracket = function() { this.stick_mask.gotoAndStop(1); }

	function onNavItemClick() {
		//trace("test:"+buttons[0].y);
		//trace(this._name);
		var sections = {
			n1: "our_story",
			n2: "philosophy",
			n3: "cafe",
			n4: "deli",
			n5: "wine_bar",
			n6: "community",
			n7: "gallery",
			n8: "find_us"
		};
		ui.highlightNavButton(this);
		ui.loadSection(sections[this._name]);

	getURL("javascript:hideSlideShow();");


	}
	
	this.nav_mc.apple._visible = false;
	
	this.nav_mc.n1.controller = this;
	this.nav_mc.n2.controller = this;
	this.nav_mc.n3.controller = this;
	this.nav_mc.n4.controller = this;
	this.nav_mc.n5.controller = this;
	this.nav_mc.n6.controller = this;
	this.nav_mc.n7.controller = this;
	this.nav_mc.n8.controller = this;
	
	this.nav_mc.n1.menu_label.text=model.pages.page[0].name;
	this.nav_mc.n1.menu_label.embedFonts = true;
	this.nav_mc.n1.menu_label.autoSize = true;
	
	this.nav_mc.n2.menu_label.text=model.pages.page[1].name;
	this.nav_mc.n2.menu_label.embedFonts = true;
	this.nav_mc.n2.menu_label.autoSize = true;
	
	this.nav_mc.n3.menu_label.text=model.pages.page[2].name;
	this.nav_mc.n3.menu_label.embedFonts = true;
	this.nav_mc.n3.menu_label.autoSize = true;
	
	this.nav_mc.n4.menu_label.text=model.pages.page[3].name;
	this.nav_mc.n4.menu_label.embedFonts = true;
	this.nav_mc.n4.menu_label.autoSize = true;
	
	this.nav_mc.n5.menu_label.text=model.pages.page[4].name;
	this.nav_mc.n5.menu_label.embedFonts = true;
	this.nav_mc.n5.menu_label.autoSize = true;
	
	this.nav_mc.n6.menu_label.text=model.pages.page[5].name;
	this.nav_mc.n6.menu_label.embedFonts = true;
	this.nav_mc.n6.menu_label.autoSize = true;
	
	this.nav_mc.n7.menu_label.text=model.pages.page[6].name;
	this.nav_mc.n7.menu_label.embedFonts = true;
	this.nav_mc.n7.menu_label.autoSize = true;
	
	this.nav_mc.n8.menu_label.text=model.pages.page[7].name;
	this.nav_mc.n8.menu_label.embedFonts = true;
	this.nav_mc.n8.menu_label.autoSize = true;
	
	this.nav_mc.n1.onRelease = onNavItemClick;
	this.nav_mc.n2.onRelease = onNavItemClick;
	this.nav_mc.n3.onRelease = onNavItemClick;
	this.nav_mc.n4.onRelease = onNavItemClick;
	this.nav_mc.n5.onRelease = onNavItemClick;
	this.nav_mc.n6.onRelease = onNavItemClick;
	this.nav_mc.n7.onRelease = onNavItemClick;
	this.nav_mc.n8.onRelease = onNavItemClick;	
	
}