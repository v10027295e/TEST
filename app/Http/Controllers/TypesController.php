<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Post as PostEloquent;	
use App\Type as TypeEloquent;
use View;
use Redirect;

class TypesController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth', [
            'except' => [
                'show'
            ]
        ]); 
    }

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
        return View::make('posts.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        TypeEloquent::create($request->only('name'));
        return Redirect::route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = TypeEloquent::findOrFail($id);
        $posts = PostEloquent::where('type', $id)->orderBy('created_at', 'DESC')->paginate(5);
        return View::make('posts.index', compact('posts', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_type = TypeEloquent::findOrFail($id);
        return View::make('posts.types.edit', compact('post_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $post_type = TypeEloquent::findOrFail($id);
        $post_type->fill($request->only('name'));
        $post_type->save();
        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_type = TypeEloquent::findOrFail($id);
        $post_type->posts()->delete();
        $post_type->delete();
        return Redirect::route('posts.index');
    }
}