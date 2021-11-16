<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use App\Http\Requests\SavePostRequest;
use App\Models\Post;

class PostsApiController extends Controller
{
    //

    public function index(){
        $posts = Post::all();
        // if (count($posts) > 0){
        //     $object = (object) [
        //         'posts' => $posts[0],
        //         'tags' => $posts[0]->tags,
        //       ];
    
        //     return $object;
        // }
        $response = APIHelpers::createAPIResponse(false,  200, '', $posts);
        return response()->json($response, 200);
    }
    
    public function store(SavePostRequest $request){
        // return Post::create([
        //     'title' => request('title'),
        //     'content' => request('content')
        // ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post_saved = $post->save();
        
        if($post_saved){
            $response = APIHelpers::createAPIResponse(false,  200, 'Post addes successfully!', $post);
            return response()->json($response, 200);
        }else{
            $response = APIHelpers::createAPIResponse(true,  400, 'Post creation failed.', $post);
            return response()->json($response, 400);
        }

    }

    public function update(Post $post){
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    
        $success = $post->update([
            'title' => request('title'),
            'content' => request('content')
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function destroy(Post $post){
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
