@extends('website.master')

@section('title')
    Products
@endsection

@section('body')
    
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="product-sidebar">

                        <div class="single-widget">
                            <a href="{{ route('all-products') }}" class="mb-2">All Products</a>
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('product-category', ['id' => $category->id]) }}">
                                            {{ $category->name }} 
                                        </a>
                                        <span>({{ $category->products_count }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="single-widget">
                            <h3>All Sub Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    @foreach ($category->subCategories as $subCategory)
                                        <li>
                                            <a href="{{ route('product-sub-category', ['id' => $subCategory->id]) }}">
                                                {{ $subCategory->name }} </a>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="row">
                            @forelse ($products as $product)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-product">
                                        <div class="product-image">
                                            
                                            @if (Storage::disk('public')->exists($product->image))
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="{{ asset('admin/images/no-photo.png') }}" alt="Default Image">
                                            @endif
                                            <div class="button">
                                                <a href="{{ route('product-detail', ['id' => $product->id]) }}" class="btn" style="width: 100%;">Product Details</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <span class="category">{{ $product->category->name }}</span>
                                            <h4 class="title">
                                                <a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h4>
                                            <div class="price">
                                                <span class="new">Tk.{{ number_format($product->new_price, 2) }}</span>
                                                <del class="old">Tk.{{ number_format($product->old_price, 2) }}</del>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @empty
                                <div class="alert alert-danger">
                                    No Products Found
                                </div>
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrap-pagination">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
