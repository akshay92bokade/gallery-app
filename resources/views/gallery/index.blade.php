@extends('layouts.app')

@section('content')
    <h2>Your Gallery</h2>

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="mb-3">
            <label>Select Images:</label>
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>
        <button class="btn btn-success">Upload</button>
    </form>

    <div class="row">
        @forelse($images as $image)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ url('public/storage/' . $image->image_path) }}" class="card-img-top" alt="Image">
                    <div class="card-body d-flex justify-content-between">
                        <form method="POST" action="{{ route('gallery.destroy', $image->id) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <form method="POST" action="{{ route('cart.add', $image->id) }}">
                            @csrf
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No images uploaded yet.</p>
        @endforelse
    </div>

    {{ $images->links() }}
@endsection