<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    public function index(){
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }
}
