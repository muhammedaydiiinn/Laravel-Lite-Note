<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $notlar = Note::where('user_id', $user_id)->paginate(10);
            return view('front.notes.index', compact('notlar'));
        } else {
            return redirect()->route('login');
        }
    }

    public function createPage()
    {
        return view('front.notes.create');
    }

    public function editPage($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return redirect()->back();
        }
        return view('front.notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'note_content' => 'required'
            ], [
                'title.required' => 'Başlık boş olamaz!',
                'note_content.required' => 'İçerik boş olamaz!',
            ]
        );

        $note = Note::find($id);
        if (!$note) {
            return redirect()->back();
        }

        $note->title = $request->title;
        $note->content = $request->note_content;
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Not Güncellendi.');
    }

    public function detail($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return redirect()->back();
        }
        return view('front.notes.detail', compact('note'));
    }

    public function addNote(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'note_content' => 'required'
            ], [
                'title.required' => 'Başlık boş olamaz!',
                'note_content.required' => 'İçerik boş olamaz!',
            ]
        );

        $note = new Note();
        $note->user_id = Auth::user()->id;
        $note->title = $request->title;
        $note->content = $request->note_content;
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Not Oluşturuldu.');
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return redirect()->back()->with('error', 'Not bulunamadı.');
        }

        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Not silindi.');
    }
}
