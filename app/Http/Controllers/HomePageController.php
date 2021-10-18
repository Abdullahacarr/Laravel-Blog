<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Models
use App\Models\Posts;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;



class HomePageController extends Controller
{
    public function index(){
        $data['posts']=Posts::orderBy('created_at','DESC')->paginate(4);
        $data['categories']=Category::inRandomOrder()->get();
        return view('homepage',$data);
    }
    public function post($category,$post){
        $category=Category::where('slug',$category)->first() ?? abort(403,'Böyle bir kategori  bulunamadı..');
        $data['post']=Posts::where('slug',$post)->where('category_id',$category->id)->first() ?? abort(403,'Böyle bir yazı  bulunamadı..');
        $p=Posts::where('slug',$post)->where('category_id',$category->id)->first();
        $data['commen']=Comment::where('p_id',$p->id)->get();
        $data['categories']=Category::inRandomOrder()->get();
        return view('post',$data);

    }
    public function categori($slug)
    {
        $category=Category::where('slug',$slug)->first() ?? abort(403,'Böyle bir kategori  bulunamadı..');
        $data['category']=$category;
        $data['posts']=Posts::where('category_id',$category->id)->orderBy('created_at','DESC')->get();
        $data['categories']=Category::inRandomOrder()->get();
        return view('category',$data);
    }
    public function commentAdd(Request $request,$category,$post)
    {
        
            $comment = new Comment();
            $comment->p_id = $request->input('p_id');
            $comment->name = $request->input('name');
            $comment->comment = $request->input('comment');
            $comment->slug = Str::slug($request->input('comment'));
            $comment->save();
    
        return post($category,$post);
    }
}
