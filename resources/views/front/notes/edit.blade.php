@extends('front.layouts.app')

@section('content')
    <h2>Not Güncelle</h2>


        <div class="card-body">
            <form action="{{ route('notes.update',$note->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Başlık</label>
                    <input type="text" name="title" value="{{$note->title}}" class="form-control" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">İçerik</label>
                    <textarea name="note_content" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{$note->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Kaydet</button>
            </form>
        </div>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
