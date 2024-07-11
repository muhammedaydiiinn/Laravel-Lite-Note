@extends('front.layouts.app')

@section('content')

    <a class="btn btn-success" href="{{ route('notes.createPage') }}">Not Oluştur</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if($notlar->count())
        @foreach($notlar as $not)
            <br>
            <div class="bg-white rounded-2 p-3 mt-2">
                <h2>
                    <a class="text-black" style="text-decoration: none" href="{{ route('notes.detail', $not->id) }}">
                        {{ $not->title }}
                    </a>
                </h2>
                <hr>
                <p>{{ $not->content }}</p>

                <a class="btn btn-primary" href="{{ route('notes.editPage', $not->id) }}">Düzenle</a>

                <form action="{{ route('notes.destroy', $not->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bu notu silmek istediğinizden emin misiniz?')">Sil</button>
                </form>
            </div>
        @endforeach

        <div class="mt-3">
            {{ $notlar->links() }}
        </div>
    @else
        <p>Not Bulunamadı</p>
    @endif

@endsection
