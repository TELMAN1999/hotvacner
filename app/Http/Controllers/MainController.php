<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APP;

class MainController extends Controller
{
    public function newAR (){
        return view('new-author');
    }
    public function welcome(){
        $articles= DB::table('article')->get();
        return view('welcome', compact('articles'));

    }
public function editPHP(Request $request){
    $articles= DB::table('article')->get();
    return view('edit', compact('articles'));
}
public function searchPHP(Request $request){
    $articles= DB::table('article')->get();
    return view('search', compact('articles'));
}
}
