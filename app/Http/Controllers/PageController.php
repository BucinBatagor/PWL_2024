<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PageController extends Controller
{
    public function index(){
        return 'Selamat Datang';
    }
    public function about(){
        return 'Nizar Khawarizmi <br> 3202216105';
    }
    public function articles($id){
        return 'Halaman Artikel dengan ID '.$id;
    }
}