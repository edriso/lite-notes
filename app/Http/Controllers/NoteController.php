<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'details' => 'required'
        ]);

        Note::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'details' => $request->details
        ]);

        return to_route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // $note = Note::where('uuid', $uuid)->where('user_id', Auth::id())->firstOrFail();
        // we can use Gates and Policies instead if if condition
        // https://laravel.com/docs/10.x/authorization
        if ($note->user_id !== Auth::id()) {
            return abort(403);
        }
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            return abort(403);
        }

        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required|max:100',
            'details' => 'required'
        ]);

        $note->update([
            'title' => $request->title,
            'details' => $request->details
        ]);

        return to_route('notes.show', $note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            return abort(403);
        }

        $note->delete();

        return to_route('notes.index');
    }
}
