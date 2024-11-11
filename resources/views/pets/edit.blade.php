@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pet</h1>
        <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Pet Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pet->name }}" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $pet->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photoUrls">Photos (Upload new if needed)</label>
                <input type="file" class="form-control" id="photoUrls" name="photoUrls[]" multiple>
            </div>

            <div class="form-group">
                <label for="tags">Tags (comma separated)</label>
                <input type="text" class="form-control" id="tags" name="tags"
                    value="{{ implode(',', $pet->tags->pluck('name')->toArray()) }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available" {{ $pet->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="pending" {{ $pet->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="sold" {{ $pet->status == 'sold' ? 'selected' : '' }}>Sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Pet</button>
        </form>
    </div>
@endsection
