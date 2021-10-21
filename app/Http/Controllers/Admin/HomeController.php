<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function solicitudes() {
        return view('admin.solicitudes');
    }

    public function usuarios() {
        return view('admin.usuarios');
    }

    public function configuracion() {
        return view('admin.configuracion');
    }

    public function configuracion_transporte() {
        return view('admin.config_transporte');
    }
}
