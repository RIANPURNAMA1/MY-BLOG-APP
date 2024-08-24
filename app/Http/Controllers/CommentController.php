<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function edit($id)
{
    $comment = Comment::with('user')->findOrFail($id); // Retrieve the comment with user information
    return view('Website.Page.Blog-editComments', compact('comment')); // Pass the comment to the view
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $blog_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'blog_id' => $blog_id,
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
    
        $comment = Comment::findOrFail($id);
    
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to update this comment.');
        }
    
        $comment->content = $request->input('content');
        $comment->save();
    
        return redirect()->route('detail', $comment->blog_id)->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
    
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }
    
        $comment->delete();
    
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
