<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request, $articleId)
   {
      if(Auth::user()->can('store',Comment::class)) {
         $comment = new Comment();
         $comment->comment = $request->comment;
         $comment->user_id = Auth::user()->id;
         $comment->article_id = $articleId;
         if($comment->save()) {
               return redirect()->back()->with('success','Commentaire ajouté avec succès !');
         }
      } else {
         abort(403);
      }
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
      $comment = Comment::findOrFail($id);
      if(Auth::user()->can('destroy', $comment)) {
         if($comment->delete()) {
            return redirect()->route('blog.show', $comment->article_id)->with('success','Le commentaire a été supprimé avec succès !');
         }
      } else {
         abort(403);
      }
   }
}
