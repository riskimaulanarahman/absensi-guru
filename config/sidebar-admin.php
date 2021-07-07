<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
  'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Dashboard',
            'url' => '/',
            'route-name' => 'admin.index'
        ]
        // [
        //     'icon' => 'fa fa-hdd',
        //     'title' => 'Data Absensi',
        //     'url' => '/data-absensi',
        //     'route-name' => 'admin.report'
        // ]
        
        ,[
            'icon' => 'fa fa-file',
            'title' => 'Generate Absensi',
            'url' => '/generate-qr',
            'route-name' => 'admin.generateqr'

        ],[
            'icon' => 'fa fa-users',
            'title' => 'Kelola User',
            'url' => '/master-user',
            'route-name' => 'admin.masteruser'
        ]
        // ,[
        //     'icon' => 'fa fa-hdd',
        //     'title' => 'Kelola Sistem',
        //     'url' => 'javascript:;',
        //     'caret' => true,
        //     'sub_menu' => [
        //         [
        //             'url' => 'javascript:;',
        //             'title' => 'Inisialisasi Kelurahan'
        //         ],[
        //             'url' => 'javascript:;',
        //             'title' => 'Pemeliharaan Data'
        //         ]]
        // ],[
        //     'icon' => 'fa fa-question-circle',
        //     'title' => 'Bantuan',
        //     'url' => '/bantuan',
        // ]
    ]
];
