@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Upload Document</h2>

        <form action="{{ route('upload.form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Form Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="file">Select File</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Form Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="admission">Admission</option>
                    <option value="benevolent">Benevolent Claim</option>
                    <option value="kin">Next of Kin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Upload</button>
        </form>
    </div>
</section>
@endsection
