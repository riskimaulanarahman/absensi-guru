// main
    var store = new DevExpress.data.CustomStore({
        key: "id",
        load: function() {
            return sendRequest(apiurl + "/master-user");
        },
        insert: function(values) {
            return sendRequest(apiurl + "/master-user", "POST", values);
        },
        update: function(key, values) {
            return sendRequest(apiurl + "/master-user/"+key, "PUT", values);
        },
        remove: function(key) {
            return sendRequest(apiurl + "/master-user/"+key, "DELETE");
        }
    });

    RoleType = [{id:1,roletype:"admin"},{id:2,roletype:"guru"},{id:3,roletype:"kepsek"}];
    // attribute
    var dataGrid = $("#master-user").dxDataGrid({    
        dataSource: store,
        columnsAutoWidth: false,
        columnHidingEnabled: false,
        showBorders: true,
        filterRow: { visible: true },
        filterPanel: { visible: true },
        headerFilter: { visible: true },
        selection: {
            mode: "multiple"
        },
        editing: {
            mode: "popup",
            allowAdding: true,
            allowUpdating: true,
            allowDeleting: true,
            popup: {
                title: "User Info",
                showTitle: true,
                width: 700,
                height: 525,
                position: {
                    my: "center",
                    at: "center",
                    of: window
                }
            },
            form: {
                items: [{
                    itemType: "group",
                    colCount: 2,
                    colSpan: 2,
                    items: [
                        {
                            dataField: "nip",
                        },
                        {
                            dataField: "nama_lengkap",
                        },
                        {
                            dataField: "jabatan",
                            // visible: false,
                        },
                        {
                            dataField: "nomor_hp",
                            // visible: false,
                        }
                    ]
                }, {
                    itemType: "group",
                    colCount: 2,
                    colSpan: 2,
                    caption: "Login Info",
                    items: ["role","email","password"]
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
                dataField: "nip",
                validationRules: [
                    { type: "required" }
                ]
            },
            { 
                dataField: "nama_lengkap",
                caption: "nama lengkap",
                validationRules: [
                    { type: "required" }
                ]
            },
            { 
                dataField: "password",
                visible: false,
            },
            { 
                dataField: "email",
                validationRules: [
                    { 
                        type: "required" 
                    }
                ]
            },
            { 
                dataField: "role",
                editorType: "dxSelectBox",
                validationRules: [
                    { type: "required" }
                ],
                editorOptions: {
                    dataSource: RoleType,  
                    valueExpr: 'roletype',
                    displayExpr: 'roletype',
                },
            },
            { 
                dataField: "jabatan",
                validationRules: [
                    { type: "required" }
                ]
            },
            { 
                dataField: "nomor_hp",
                caption: "nomor hp",
                validationRules: [
                    { type: "required" }
                ]
            },
            
           
        ],
        export: {
            enabled: true,
            fileName: "master-user",
            excelFilterEnabled: true,
            allowExportSelectedData: true
        },
        onEditorPreparing: function(e) {
            if (e.dataField === "password" && e.parentType === "dataRow") {
                e.editorOptions.value = "";
            }
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