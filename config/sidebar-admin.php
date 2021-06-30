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
        ],
        // [
        //         'icon' => 'fa fa-hdd',
        //         'title' => 'Master Data',
        //         'url' => 'javascript:;',
        //         'caret' => true,
        //         'sub_menu' => [
        //             [
        //                 'url' => 'javascript:;',
        //                 'title' => 'Master Data Penduduk'
        //             ],[
        //             'url' => 'javascript:;',
        //             'title' => 'Master Data Surat',
        //             'sub_menu' => [[
        //                 'url' => '/surat-masuk',
        //                 'title' => 'Surat Masuk',
        //                 'route-name' => 'admin.suratmasuk'

        //             ],[
        //                 'url' => '/surat-keluar',
        //                 'title' => 'Surat Keluar',
        //                 'route-name' => 'admin.suratkeluar'
        //             ],[
        //                 'url' => '/surat-pelayanan',
        //                 'title' => 'Surat Pelayanan',
        //                 'route-name' => 'admin.suratpelayanan'
        //             ]]
        //         ]]
        // ],
        // [
        //         'icon' => 'fa fa-hdd',
        //         'title' => 'Data Absensi',
        //         'url' => 'javascript:;',
        //         'caret' => true,
        //         'sub_menu' => [
        //             [
        //                 'url' => '/ref-penduduk',
        //                 'title' => 'Penduduk',
        //                 'route-name' => 'admin.refpenduduk'

        //             ],[
        //                 'url' => '/ref-suratpelayanan',
        //                 'title' => 'Surat Pelayanan',
        //                 'route-name' => 'admin.refsuratpelayanan'

        //             ],[
        //                 'url' => '/ref-kelengkapansuratpelayanan',
        //                 'title' => 'Kelengkapan Surat Pelayanan',
        //                 'route-name' => 'admin.refkelengkapansuratpelayanan'

        //             ]
        //             ]
        // ]
        [
            'icon' => 'fa fa-hdd',
            'title' => 'Data Absensi',
            'url' => 'javascript:;',
            // 'route-name' => 'admin.masteruser'
        ]
        ,[
            'icon' => 'fa fa-users',
            'title' => 'Kelola User',
            'url' => '/master-user',
            'route-name' => 'admin.masteruser'
        ]
        ,[
            'icon' => 'fa fa-file',
            'title' => 'Generate Absensi',
            'url' => '/generate-qr',
            'route-name' => 'admin.generateqr'

        ],
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
