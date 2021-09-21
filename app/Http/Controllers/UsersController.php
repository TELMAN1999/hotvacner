<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {


       $test = $request->validate([
            "Article_title" => "required|max:255|min:1",
            "Article" => "required",
            "Author" => "required|string",
            "Year" => "sometimes"
        ]);

        $data = new article;
        $data -> Article_title = $request -> Article_title;
        $data->Article=$request->Article;
        $data->Author=$request->Author;
        $data->Year=$request->Year;
        $data->email=Auth::user()->email;
        $data->save();
        $articles= DB::table('article')->get();
        return Redirect::to('/');

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $articles= DB::table('article')->get();
        $data =$request -> all();
        $article = article::where('id', $data['id'])
        ->where('email', Auth::user()->email);
        $id =$data['id'];
        $year=$data['Year'];
        $Article_title = $data['Article_title'];
        $Article =$data['Article'];
        $Author =$data['Author'];
        DB::update('update article set year = ?, Article_title = ?, Article = ?, Author = ? where id = ?',
            [ $year, $Article_title, $Article, $Author, $id]);
        $articles= DB::table('article')->get();

        return Redirect::to('/');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function delete(Request $request)
    {
        DB::delete('delete from article where id = ?',[$request->all()['id']]);
        $articles= DB::table('article')->get();
        return Redirect::to('/');

    }
    public function search(Request $request){
//       dd($request-> all()['title']);
        $articles = DB::select('select * from article where article_title = ? ',[$request-> all()['title']]);
        return view('search', compact('articles'));
    }
}
