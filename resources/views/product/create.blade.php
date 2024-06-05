@extends('layout')
@section('title',"products")
@section('content')
<section class="create">
    <h1>create new product</h1>
       <form action="{{route('product.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div>
        <label for="product-img">Image</label>
        <input value="{{old('product-img')}}" type="file" name="product-img" id="product-img">
        @error('product-img')
           <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="product-title">title</label>
        <input value="{{old('product-title')}}" type="text" name="product-title" id="product-title">
        @error('product-title')
       <div class="error">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="product-description">description</label>
        <input value="{{old('product-description')}}" type="text" name="product-description" id="product-description">
        @error('product-description')
       <div class="error">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="product-category">category</label>
        <select name="product-category" value="{{old('product-category')}}" id="product-category">
            <option value="electronics">electronics</option>
            <option value="clothing">clothing</option>
            <option value="books">books</option>
            <option value="home">home</option>
        </select>
        @error('product-category')
       <div class="error">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="product-price">price</label>
        <input value="{{old('product-price')}}" type="text" name="product-price" id="product-price">
        @error('product-price')
       <div class="error">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="product-stock">stock</label>
        <select name="product-stock" id="product-stock" value="{{old('product-stock')}}">
            <optgroup label="stock">
                <option value="in stock">in </option>
                <option value="out stock">out </option>
            </optgroup>
        </select>
        @error('product-stock')
       <div class="error">{{ $message }}</div>
    @enderror
    </div>
    <div><button type="submit">Submit</button></div>
   </form>
</section>

@endsection