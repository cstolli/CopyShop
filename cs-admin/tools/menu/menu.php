<html>

    <head>

        <title>peterlowells.com - menu admin tool</title>

        <link rel="stylesheet" type="text/css" href="css/admin.css"/>

        <script type="text/javascript" src="scripts/jquery.js"></script>

        <script type="text/javascript" src="scripts/jquery.tablednd_0_5.js"></script>

        <script type="text/javascript" src="scripts/json.js"></script>

        <script type="text/javascript" src="menu.js"></script> 

        <script type="text/javascript">



            var menuController = new MenuController();

            

            $(document).ready(function(){



                $.getJSON("menu_service.php?function=load", function(json) {
					alert(json);
                    menuController.initTable(json);

                });



            });



        </script>

    </head>

    <body>

        <div class="menu">

            <div class="sectionWrapper">

                <div class="sectionHead"><span class="header">Cafe:</span> <a href="javascript: void(0)" class="button" onClick="menuController.newRow('cafe'); return false;">add item</a></div>

                <table id="cafe" class="section"></table>

            </div>

            <div class="sectionWrapper">

                <div class="sectionHead"><span class="header">Deli:</span> <a href="javascript: void(0)" class="button" onClick="menuController.newRow('deli'); return false;">add item</a></div>

                <table id="deli" class="section"></table>

            </div>

            <div class="sectionWrapper">

                <div class="sectionHead"><span class="header">Wine Bar:</span> <a href="javascript: void(0)" class="button" onClick="menuController.newRow('wine_bar'); return false;">add item</a></div>

                <table id="wine_bar" class="section"></table>

            </div>

            <a href="#" class="button" onClick="menuController.publish(); return false;">publish</a>



            <br/><br/>

            <b>Tips:</b>

            <ul>

                <li>Drag and drop items to re-order</li>

                <li>Changes will be lost unless you publish</li>

            </ul>

        </div>

        <div id="itemFormDiv" class="itemEditPane" style="display:none;">

            <form action="#" id="itemForm">

                <div class="itemTitleWrapper">

                    <div class="itemTitleHead">

                        <span class="header">Item:</span>

                    </div>

                    <!--<input type="text" size="50" id="fieldLabel" name="fieldLabel" />-->

                    <textarea rows="1" cols="50" scrollable="no" id="fieldLabel" name="fieldLabel"></textarea>

                </div>

                <div class="itemTextWrapper">

                    <div class="itemTextHead">

                        <span class="header">Text:</span>

                    </div>

                    <textarea rows="20" cols="50" id="fieldText" name="fieldText"></textarea>

                </div>

                <a href="#" class="button" onClick="menuController.saveItem(); return false;">save</a>

                &nbsp;&nbsp;&nbsp;

                <a href="#" class="button" onClick="menuController.cancelEdit(); return false;">cancel</a>

                &nbsp;&nbsp;&nbsp;

                <a href="#" class="button" onClick="menuController.deleteItem(); return false;">delete</a>

            </form>



            Note: Enclose bold text in: <code>[header]</code> and </code>[/header]</code>

        </div>

    </body>

</html>