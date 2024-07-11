@extends('front.layouts.app')

@section('content')

    <br>
    <div class="bg-white rounded-2 p-3 mt-2">
        <h2>{{ $note->title }}</h2>
        <hr>
        <p>{{ $note->content }}</p>
    </div>

    <a class="btn btn-success" href="{{route('notes.editPage',$note->id)}}">Düzenle</a>
    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Sil</button>
    </form>

@endsection
