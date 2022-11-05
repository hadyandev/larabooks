<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->name;
        $author->save();

        return response()->json([
            "message" => "Author record created",
        ], 201);
    }

    /**
     * Display the specified resource.
     *Author
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Author::where('id', $id)->exists()) {
            $Author = Author::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Author, 200);
          } else {
            return response()->json([
              "message" => "Author not found"
            ], 404);
          }
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
        if (Author::where('id', $id)->exists()) {
            $author = Author::find($id);
    
            $author->name = is_null($request->name) ? $author->name : $author->name;
            $author->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Author not found"
            ], 404);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Author::where('id', $id)->exists()) {
            $author = Author::find($id);
            $author->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Author not found"
            ], 404);
          }
    }
}
