<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        return view('comments.create', ['post_id' => $post_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|max:255'
        ]);
        $post_id = $request->input('post_id');
        $c = new Comment;
        $c->comment = $validatedData['comment'];
        $c->user_id = auth()->id();
        $c->post_id = $post_id;
        $c->save();

        session()->flash('message', 'Comment was created.');
        return redirect()->route('posts.show', ['post_id' => $post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $userRoles = User::findOrFail(auth()->id())->roles->pluck('name');

        if(auth()->id() == $comment->user->id || $userRoles->contains('admin')){
            return view('comments.edit', ['post_id' => $post_id, 'comment' => $comment]);
        } else {
            return redirect()->route('nopermission');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|max:255'
        ]);
        $post_id = $request->input('post_id');
        $comment_id = $request->input('comment_id');
        $c = Comment::findOrFail($comment_id);
        $c->comment = $validatedData['comment'];
        $c->user_id = auth()->id();
        $c->post_id = $post_id;
        $c->save();

        session()->flash('message', 'Comment was edited.');
        return redirect()->route('posts.show', ['post_id' => $post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();

        return redirect()->route('posts.show', ['post_id' => $post_id])->with('message', 'Comment was deleted.');
    }
}
