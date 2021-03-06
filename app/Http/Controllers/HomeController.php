<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //CAPA SEGURIDAD
        $accesos = DB::table('sys_acc_sistemas')
            ->where([
                ['users_id', Auth::user()->id]
            ])
            ->first();

        if ($accesos == null) {
            DB::table('sys_acc_denegado')->insert([
                'fecregistro' => date('Y-m-d H:i:s'),
                'ip' => \Request::ip(),
                'tipo' => 'SISTEMA',
                'sys_sistemas_idsistemasgore' => 1,
                'users_id' => Auth::id()
            ]);
            return view('backend.acc_denegado');
        }

        if ($accesos->sys_sistemas_idsistemasgore == 1 && $accesos->estadoacc == 1) {
            if ($accesos->nivelacc == 1 || $accesos->nivelacc == 2 || $accesos->nivelacc == 3 || $accesos->nivelacc == 4) {
                return view('adminlte::home');
            } else {
                DB::table('sys_acc_denegado')->insert([
                    'fecregistro' => date('Y-m-d H:i:s'),
                    'ip' => \Request::ip(),
                    'tipo' => 'NIVEL',
                    'modulo' => 'INDEX',
                    'sys_sistemas_idsistemasgore' => 1,
                    'users_id' => Auth::id()
                ]);
                return view('backend.acc_denegado');
            }
        } else {
            DB::table('sys_acc_denegado')->insert([
                'fecregistro' => date('Y-m-d H:i:s'),
                'ip' => \Request::ip(),
                'tipo' => 'SISTEMA',
                'sys_sistemas_idsistemasgore' => 1,
                'users_id' => Auth::id()
            ]);
            return view('backend.acc_denegado');
        }

    }
}
