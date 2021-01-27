<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
       // $posts = Post::orderBy('created_at' ,'DESC')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('posts.create');
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required',
            'photo' =>  'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

        $post = Post::create([
            'user_id'  =>  Auth::id(),
            'title'    =>  $request->title,
            'content'  =>  $request->content,
            'photo'    =>  'uploads/posts/'.$newPhoto,
            'slug'     =>   str_slug($request->title),
         ]);  
                return redirect()->back() ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show( $slug)
    {
        //
        $post = Post::where('slug' , $slug )->first();
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find( $id );
        return view('posts.edit')->with('post',$post);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id )
    {
        //
        
        $post = Post::find( $id ) ;
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required'
        ]);

     

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);
        $post->photo ='uploads/posts/'.$newPhoto ;
    }
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();
    
    return redirect()->back()->with('success','post updated successfully')   ;


   } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find( $id ) ;
        $post->delete($id);
        return redirect()->back()->with('success','post deleted successfully')  ;
 ;
    }

    public function restore( $id)
    {
        $post = Post::onlyTrashed()->where('id' ,  $id )->first() ;
        $post->restore();
        return redirect()->back()->with('success','post restored successfully')  ;
    }

public function  deleteForEver(  $id)
    {

        $post = Post::onlyTrashed()->where('id' , $id)->first();
        $post->forceDelete();

        return redirect()->back()
        ->with('success','post deleted successfully') ;
   
   }
public function postsTrashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$posts);
    }
}