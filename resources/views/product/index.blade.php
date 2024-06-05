@extends('layout')

@section('title', 'Products')

@section('content')
<section class="allProduct">
    <div class="container mt-5">
        <h1 class="mb-4">Products</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
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
            @endforeach
        </div>
    </div>
</section>
@endsection
