@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Pet</h1>
        <form action="{{ route('pets.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Pet Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photoUrls">Photos (Upload URLs)</label>
                <input type="file" class="form-control" id="photoUrls" name="photoUrls[]" multiple required>
            </div>

            <div class="form-group">
                <label for="tags">Tags (comma separated)</label>
                <input type="text" class="form-control" id="tags" name="tags">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="sold">Sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Pet</button>
        </form>
    </div>
@endsection
