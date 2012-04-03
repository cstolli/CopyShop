

var MenuController = function() {



    var self = {

        rowIdCounter : 0,

        tableIds : []

    };



    self.publish = function() {

        var menus = [];



        // iterate through all tables that we

        // found in initTable

        for (var i = 0; i < self.tableIds.length; i++) {

            var tableId = self.tableIds[i];

            var menuSection = { name : tableId, items : [] };

            menus.push(menuSection);



            // get all rows from table and add to array

            var rows = $("#"+tableId+" tr");

            for (var x = 0; x < rows.length; x++) {

                var rowId = rows[x].id;

                var labelId = "#" + rowId + "-label";

                var textId  = "#" + rowId + "-text";

                menuSection.items.push({ 'label' : $(labelId).html(), 'text' : $(textId).html() });

            }

        }



        var jsonData = $.toJSON(menus);



        $.ajax({

          type: 'POST',

          url: 'tools/menu/menu_service.php?function=publish',

          data: jsonData,

          contentType: 'application/json; charset=utf-8',

          success: function() {

              alert("Publish complete!");

          },

          error: function() {

              alert("Failed to save menu data");

          }

        });

    };



    self.initTable = function(json) {

        self.tableIds = [];

        for (var i = 0; i < json.length; i++) {

            var section = json[i];

            for (var x = 0; x < section['items'].length; x++) {

                var menuItem = section['items'][x];

                appendRowToTable(section['name'], menuItem['label'], menuItem['text']);

            }

            var sectionname = "#" + section['name'];

            self.tableIds.push(section['name']);



            $(sectionname).tableDnD();

        }

    };



    self.newRow = function(section) {

        self.editingRowId = '';

        showForm(section, "", "");

    };



    self.saveItem = function() {

        $("#itemFormDiv").hide();



        var label = $("#fieldLabel").val();

        var text  = $("#fieldText").val();



        var sectionname = "#"+self.editingSection;



        if (self.editingRowId) {

            var rowContents = createRowCellHtml(self.editingRowId, label, text);

            $("#"+self.editingRowId).html(rowContents);

        }

        else {

            appendRowToTable(self.editingSection, label, text);

        }



        $(sectionname).tableDnD();



        self.editingSection = '';

        self.editingRowId = '';

    };



    self.deleteItem = function() {

        if (confirm("Delete item?")) {

            $("#itemFormDiv").hide();



            if (self.editingRowId) {

                $('#'+self.editingRowId).remove();

            }



            self.editingSection = '';

            self.editingRowId = '';

        }

    };



    self.cancelEdit = function() {

        $("#itemFormDiv").hide();

    };



    //////////////////////////////////////////

    // private //

    /////////////



    var editRow = function(section, rowId) {

        self.editingRowId = rowId;

        var label = $("#"+rowId+"-label").html();

        var text  = $("#"+rowId+"-text").html();

        showForm(section, label, text);

    };



    var showForm = function(section, labelValue, textValue) {

        self.editingSection = section;

        $("#fieldLabel").val(labelValue);

        $("#fieldText").val(textValue);

        $("#itemFormDiv").show();

    };



    var appendRowToTable = function(tableId, label, text) {

        self.rowIdCounter++;

        var rowId = "row-" + self.rowIdCounter;

        var row = "<tr id='" + rowId + "'>";

        row += createRowCellHtml(rowId, label, text);

        row += "</tr>";



        $("#"+tableId).append(row);



        $("#"+rowId).click(function() {

            editRow(tableId, rowId);

        });

    };



    var createRowCellHtml = function(rowId, label, text) {

        var labelId = rowId + "-label";

        var textId  = rowId + "-text";

        var cell = "<td id='" + labelId + "'>" + label + "</td>";

        cell += "<td id='" + textId + "' style='display:none;'>" + text + "</td>";

        return cell;

    };



    return self;

};