<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Contect;
use App\Models\Post;
use App\Models\Category;
use App\Models\Country;
use App\Models\Video;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        //one to one
        // $contect=contect::with('user')->first();
        // dd($contect->toArray());
        
        //one to many
        // $user=User::with(['Contect', 'Post'])->find(1);
        // dd($user->toArray());

        //many to many
        // $categories=Category::all();
        // $post=Post::with('categories')->first();
        // $post->categories()->attach($categories);
        // $post=Post::with('categories')->first();
        // dd($post->toArray());

        //hasOneThrough
        // $user=User::with('contectContectinformation')->first();
        // dd($user->toArray());

        //hasManyThrough
        // $country=Country::with('stateCity')->first();
        // dd($country->toArray());

        //One to One Polymorphic
        // $user=User::with('image')->get();
        // dd($user->toArray());
        // $post=Post::with('image')->get();
        // dd($post->toArray());

        //many to many polymorphic
        // $post=Post::with('tags')->first();
        // dd($post->toArray());
        // $video=Video::with('tags')->first();
        // dd($video->toArray());


    }
}
