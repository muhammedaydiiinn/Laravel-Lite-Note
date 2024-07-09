@extends('front.layouts.app')
@section('content')

<a class="btn btn-success" href="{{ route('notes.createPage') }}">Not Oluştur</a>

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@foreach($notlar as $not)
    <div class="card mt-5">
        <div class="card-header">
            {{ $not->title }}
        </div>
        <div class="card-body">
            {{ $not->content }}
        </div>
    </div>
@endforeach

<div class="mt-3">
    {{ $notlar->links() }}
</div>

@endsection
