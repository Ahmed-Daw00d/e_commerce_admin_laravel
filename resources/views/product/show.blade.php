@extends('layout')

@section('title', $product->title)

@section('content')
<section class="product-details">
    <div class="container mt-5">
        <h1 class="mb-4">{{ $product->title }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->title }}">
            </div>
            <div class="col-md-6">
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Category:</strong> {{ $product->category }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
