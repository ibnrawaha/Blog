<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){

		$pages = Page::all();
		return view('pages')->with('pages', $pages);
	}

	public function home(){
		return view('pages.index');
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create(){
		return view('pages.create');
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request){

		$this->validate($request, [
				'title' => 'required',
				'content' => 'required',
				'image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
			]);

		if($request->hasFile('image')){
            // TO GET THE REAL FILE NAME
            $file = $request->file('image')->getClientOriginalName();
            $fileExplode = explode('.', $file);
            $fileToStore = $fileExplode[0]. time() . "." .  $fileExplode[1];
            // MUST BE ADDED TO DECLARE THE PATH
            $path = $request->file('image')->storeAs('public/image/pages', $fileToStore);
        }
        else {
            // IF THERE ARE NO IMAGES
            $fileToStore = 'noImage.jpg';
        }

		$page = new Page;
		$page->title = $request->title;
		$page->content = $request->content;
		$page->image = $fileToStore;
		$page->user_id = auth()->user()->id;
		$page->save();

		return redirect('/pages')->with('success', 'Page ' . ucfirst($request->title) . ' Created Successfully');

	}

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($title){

        if(auth()->user()){
    		$page = Page::where('title', '=', $title)->get()->first();

    		return view('pages.edit')->with('page', $page);
            
        }
        else {
            return view('error.404');
        }

	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $title){

		// $page = Page::find($title);
		$page = Page::where('title', '=', $title)->get()->first();

		$this->validate($request, [
			'title' => 'required',
			'content' => 'required',
			'image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
			]);

		if($request->hasFile('image')){
            // TO GET THE REAL FILE NAME
            $file = $request->file('image')->getClientOriginalName();
            $fileExplode = explode('.', $file);
            $fileToStore = $fileExplode[0]. time() . "." .  $fileExplode[1];
            // MUST BE ADDED TO DECLARE THE PATH
            $path = $request->file('image')->storeAs('public/image/pages', $fileToStore);
        }
        else {
            // IF THERE ARE NO IMAGES
            $fileToStore = 'noImage.jpg';
        }
		// dd($request);
		// dd($page);
		$page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->image = $fileToStore;
        $page->user_id = auth()->user()->id;
        $page->save();

        return redirect('pages')->with('success', 'Page Edited Successfully');

	}

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($title)
    {
        // $page = Page::find($title);
        $page = Page::where('title', '=', $title)->get()->first();

        return view('pages.show')->with('page',$page);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    	$page = Page::find($id);
    	$message = "Page " . ucfirst($page->title). " Was Deleted Successfully";
    	$page->delete();

    	return redirect('/pages')->with("error", $message);
    }


}
