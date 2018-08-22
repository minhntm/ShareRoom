<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\BookmarkFormRequest;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = Bookmark::all();
        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookmarkFormRequest $request)
    {
        $data = $request->all();
        $bookmark = Bookmark::create($data);

        return Response::json([
            'status' => 'success',
            'bookmark_id' => $bookmark->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $bookmark->delete();

        return Response::json([
            'status' => 'success',
            'bookmark_id' => ''
        ], 200);
    }
}
