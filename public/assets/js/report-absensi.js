// main
var store = new DevExpress.data.CustomStore({
    key: "nip", //command jika ingin mendapatkan key params lebih banyak
    load: function() {
        return sendRequest(apiurl + "/data-absensi");
    },
    insert: function(values) {
        return sendRequest(apiurl + "/data-absensi", "POST", values);
    },
    update: function(key, values) {
        console.log(key);
        $.each(values,function(ind,val){
            console.log(ind);
            console.log(val);
            $.getJSON(apiurl + "/updateabsensi/"+key+"/"+ind+"/"+val,function(response){
                var type = (response.status == "success" ? "success" : "error");
                DevExpress.ui.notify(response.message, type, 2000);
            });
        })
    },
    remove: function(key) {
        return sendRequest(apiurl + "/data-absensi/"+key, "DELETE");
    }
});

var field = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
var row = [{dataField:"year",fixed: true,alignment: "left"},{dataField:"month",fixed: true,alignment: "left"},{dataField:"nip",fixed: true,alignment: "left"},{dataField:"nama_lengkap",fixed: true},{dataField: "total_hadir",fixed:true,fixedPosition: "right",allowHeaderFiltering: false},{dataField: "total_izin",fixed:true,fixedPosition: "right",allowHeaderFiltering: false},{dataField: "total_sakit",fixed:true,fixedPosition: "right",allowHeaderFiltering: false},];
$.map(field,function(val,i){
        var item = {caption: val,alignment: "center",columns: [{caption: "status",dataField: val,alignment: "center",
        customizeText: function(e) {var text = ['','WFH','WFO','I','S'];return text[e.value];}},
        {caption: "in",alignment: "center",dataField: "jam_masuk_"+val,
    },{caption: "out",alignment: "center",dataField: "jam_keluar_"+val,}]};
        row.push(item);
});

var roleuser = $('.roleuser').val();

StatusType = [{id:1,statustype:"masuk"},{id:2,statustype:"pulang"},{id:3,statustype:"tutup"}];
// attribute
var dataGrid = $("#report-absensi").dxDataGrid({    
    dataSource: store,
    // columnsAutoWidth: true,
    showColumnLines: true,
    allowColumnResizing: true,
    columnHidingEnabled: false,
    showBorders: true,
//     filterRow: { visible: true },
    filterPanel: { visible: true },
    headerFilter: { visible: true },
    columnWidth: 100,
    // selection: {
    //     mode: "multiple"
    // },
    columnFixing: { 
        enabled: true
    },
    editing: {
        mode: "cell",
        allowAdding: false,
        allowUpdating: (roleuser !== 'admin')?false:true,
        allowDeleting: false,
    },
    scrolling: {
        mode: "virtual"
    },
    columns : row,
    export: {
        enabled: true,
        fileName: "report-absensi",
        excelFilterEnabled: true,
        allowExportSelectedData: false
    },
    onEditorPreparing: function(e){  
        e.editorOptions.disabled = e.parentType == "dataRow" && e.dataField == "nip" || e.dataField == "nama_lengkap" || e.dataField == "total_hadir" || e.dataField == "total_izin" || e.dataField == "total_sakit" && !e.row.inserted;  
    },
    onToolbarPreparing: function(e) {
        dataGrid = e.component;

        e.toolbarOptions.items.unshift({						
            location: "after",
            widget: "dxButton",
            options: {
                hint: "Refresh Data",
                icon: "refresh",
                onClick: function() {
                    dataGrid.refresh();
                }
            }
        })
    },
}).dxDataGrid("instance");

var months = [1,2,3,4,5,6,7,8,9,10,11,12];

var d = new Date(),
    n = months[d.getMonth()];
    y = d.getFullYear();

//     console.log(n);
$("#report-absensi").dxDataGrid("instance").columnOption("month", {
        selectedFilterOperation: "=",
        filterValue: n
});

$("#report-absensi").dxDataGrid("instance").columnOption("year", {
    selectedFilterOperation: "=",
    filterValue: y
});
