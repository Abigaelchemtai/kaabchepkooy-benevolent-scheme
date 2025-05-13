@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Download Forms</h2>

        @foreach($documents as $document)
            <div class="mb-3">
                <h4>{{ $document->name }}</h4>
                <a href="{{ asset('storage/' . $document->file_path) }}" class="btn btn-primary" download>Download</a>
            </div>
        @endforeach
    </div>
</section>
@endsection
