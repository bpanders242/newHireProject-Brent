<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    #Controller functions for directing to views
    public function index(){
        return view('welcome');
    }
    public function search(){
        return view('search');
    }
    public function results(){
        return view('results');
    }
}
