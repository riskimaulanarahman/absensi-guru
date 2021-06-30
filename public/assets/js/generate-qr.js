// main
var store = new DevExpress.data.CustomStore({
    key: "id",
    load: function() {
        return sendRequest(apiurl + "/generate-qr");
    },
    insert: function(values) {
        return sendRequest(apiurl + "/generate-qr", "POST", values);
    },
    update: function(key, values) {
        return sendRequest(apiurl + "/generate-qr/"+key, "PUT", values);
    },
    remove: function(key) {
        return sendRequest(apiurl + "/generate-qr/"+key, "DELETE");
    }
});

StatusType = [{id:1,statustype:"masuk"},{id:2,statustype:"pulang"},{id:3,statustype:"tutup"}];
// attribute
var dataGrid = $("#generate-qr").dxDataGrid({    
    dataSource: store,
    columnsAutoWidth: false,
    columnHidingEnabled: false,
    showBorders: true,
    // filterRow: { visible: true },
    // filterPanel: { visible: true },
    headerFilter: { visible: true },
    // selection: {
    //     mode: "multiple"
    // },
    editing: {
        mode: "popup",
        allowAdding: true,
        allowUpdating: true,
        allowDeleting: true,
        form: {
            items: [{
                itemType: "group",
                colCount: 2,
                colSpan: 2,
                items: [
                    {
                        dataField: "kode",
                        visible: false,
                    },
                    {
                        dataField: "status",
                    },
                    {
                        dataField: "created_at",
                        visible: false,
                    },
                    {
                        dataField: "updated_at",
                        visible: false,
                    }
                ]
            }]
        }
    },
    scrolling: {
        mode: "virtual"
    },
    columns: [
        {
            caption: '#',
            formItem: { 
                visible: false
            },
            width: 40,
            cellTemplate: function(container, options) {
                container.text(options.rowIndex +1);
            }
        },
        { 
            dataField: "kode",
            disabled: true
        },
        { 
            dataField: "status",
            editorType: "dxSelectBox",
            validationRules: [
                { type: "required" }
            ],
            editorOptions: {
                dataSource: StatusType,  
                valueExpr: 'statustype',
                displayExpr: 'statustype',
            },
        },
        { 
            caption: "Created",
            dataField: "created_at",
            dataType: "date",
            format: "dd-MM-yyyy hh:mm a"
        },
        { 
            caption: "Updated",
            dataField: "updated_at",
            dataType: "date",
            format: "dd-MM-yyyy hh:mm a"
        },

        
        
       
    ],
    export: {
        enabled: false,
        fileName: "generate-qr",
        excelFilterEnabled: true,
        allowExportSelectedData: true
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