<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Company;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new Product();
        $post->company_id=$request->company_id;
        $post->product_name=$request->product_name;
        $post->price=$request->price;
        $post->stock=$request->stock;
        $post->comment=$request->comment;
        $post->company_name=$request->company_name;

        if(request('image')){
            $original=request()->file('image')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('image')->move('storage/images', $name);
            $post->image=$name;
        }
        $post->save();
        return back()->with('message', '保存しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::all();
        $post = Product::findOrFail($id);

        $post->company_name=$request->company_name;

        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Product::findOrFail($id);
        $companies=Company::all();
        return view('post.edit', ['post' => $post, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post->company_id=$request->company_id;
        $post->product_name=$request->product_name;
        $post->price=$request->price;
        $post->stock=$request->stock;
        $post->comment=$request->comment;

        if(request('image')){
            $original=request()->file('image')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('image')->move('storage/images', $name);
            $post->image=$name;
        }
        $post->save();
        return back()->with('message', '更新しました');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post->delete();
        return redirect()->route('home')->with('message', '削除しました');
    }
}
