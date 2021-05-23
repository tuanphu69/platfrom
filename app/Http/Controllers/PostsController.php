<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\DB;



class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     */
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('posts.index')->with('posts',Post::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = array();
        // $data['title'] = $request->title;
        // $data['content'] = $request->content;
        // $data['category_id'] = $request->category_id;
       
        // $get_image = $request->file('featrued');
        // // echo'<pre>';
        // // print_r($data);
        // // echo '</pre>';
        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image = current(explode('.',$get_name_image)); //
        //     $new_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalEXtension(); //đăt tên cho ảnh up lên ko bị trungd
        //     $get_image->move('update/post',$new_image);
        //     $data['featrued'] = $new_image;
        //     DB::table('posts')->insert($data);
        //     return redirect('post/store');
        // }
        // $data['posts']='';
        // DB::table('posts')->insert($data);
        // return redirect('posts.create');
        
        // DB::table('posts')->insert($post);
        
        // dd($request->all());
        // dd($post);


        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'featrued' => 'required|image',
            
        ]);

        $featrued = $request->featrued;
        $featrued_new_name = time().$featrued->getClientOriginalName();
        $featrued->move('update/post',$featrued_new_name);

        $post = Post::create([ 
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'featrued' => 'update/post/'.$featrued_new_name,
                'slug' => str_slug($request->title) // my new post -> my-new-post
            ]);

        // dd($request->all());
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
