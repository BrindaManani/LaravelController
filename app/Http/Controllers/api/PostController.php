<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postList()
    {
        try {
            $posts = Post::with('image')->get();
            return response()->json([
                $posts,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }
    public function postView($id)
    {
        try {
            $post = Post::with('image')->findOrFail($id);
            return response()->json([
                $post,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }

    public function addPost(Request $request, $id = null)
    {

        $request->validate([
            "post_name" => 'required|max:20',
            "post_description" => 'max:255',
        ]);
        try {
            $post = Post::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $request->post_name,
                    'description' => $request->post_description,
                ],
            );
            if ($request->hasFile('post_img')) {
                $post_img = $request->file('post_img')->store('posts', 'public');
                $post->image()->updateOrCreate(
                    ['imageable_id' => $id],
                    [
                        'url' => $post_img,
                        'imageable_type' => Post::class
                    ],
                );
            }
            return response()->json([
                'message' => 'Member added successfully!!',
                $post,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Something went wrong !!'
            ], 500);
        }
    }

    public function deletePost($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            $post->image()->delete();
            return response()->json([
                'message' => 'Post deleted successfully!!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }
}
