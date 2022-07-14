<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    public function index()
    {
        $route = Route::current();

            $name = Route::currentRouteName();

            $action = Route::currentRouteAction();

        return response($name);
    }
}
