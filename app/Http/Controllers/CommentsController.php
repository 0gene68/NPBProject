<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'content' => 'required',
        ]);

        // 로그인된 사용자 정보
        $userId = auth()->user();

        $teamId = $request->input('team_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->team_id = $teamId;
        $comment->content = $content;
        $comment->user_id = $userId->name;
        $comment->save();

        $selectedTeam = Session::get('selectedTeam');

        if(Auth::check()) {
            return view('logged_in.team_logged_in');
        } else {
            return view('non_logged_in.team_non_logged_in');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
