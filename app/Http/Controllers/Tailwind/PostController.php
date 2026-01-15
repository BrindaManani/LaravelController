<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;

class PostController extends Controller
{
    public function postList()
    {
        $posts = Post::with('image')->paginate(6);
        return view('user-management-system.post.postList', compact('posts'));
    }
    public function addPost($id = null)
    {
        if ($id != null) {
            $post = Post::where('id', $id)->first();
            return view('user-management-system.post.addPost', compact('post'));
        }
        return view('user-management-system.post.addPost');
    }

    public function createPost(Request $request, $id = null)
    {
        $request->validate([
            "post_name" => 'required|max:20',
        ]);

        $post = Post::updateOrCreate(
            ['id' => $id],
            ['name' => $request->post_name],
        );
        if ($request->hasFile('post_img')) {
            $post_img = $request->file('post_img')->store('posts', 'public');
            $post->image()->updateOrCreate(
                ['imageable_id' => $id],
                ['url' => $post_img],
            );
        }


        return redirect()->route('user-management-system.post.postList')->with('success', 'Post saved successfully!');
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $post->image()->delete();
        return redirect()->route('user-management-system.post.postList')->with('alert', 'Post deleted successfully!');
    }
}
