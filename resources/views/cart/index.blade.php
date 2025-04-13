@extends('layouts.app')

@section('content')
    <h2>Your Cart</h2>

    <div class="row">
        @foreach ($cartItems as $cartItem)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ url('public/storage/' . $cartItem->image->image_path) }}" alt="Image" width="100">
                    <p>{{ $cartItem->image->title }}</p>
                    <form action="{{ route('cart.remove', $cartItem->image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
        @endforeach

        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
