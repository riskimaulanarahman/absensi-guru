<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SuratMasuk;
use App\SuratKeluar;
use App\SuratPelayanan;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        if(Auth::user()->role == 'admin') {

            return view('dashboard-admin');

            
            // return view('dashboard-admin')->with(compact(
            //     'todaysm', 'weeksm', 'monthsm','monthsmlast',
            //     'todaysk', 'weeksk', 'monthsk','monthsklast',
            //     'todaysp', 'weeksp', 'monthsp','monthsplast'
            // ));

        } elseif(Auth::user()->role == 'kepsek') {

            return view('dashboard-kepsek');

        } elseif(Auth::user()->role == 'guru') {

            return view('dashboard-guru');

        }
    }
}
