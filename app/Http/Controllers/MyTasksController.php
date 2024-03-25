<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyTasksController extends Controller
{
    public function index() {
        return 'Ruta /my-tasks resuelta por el TaksController';
    }
}
