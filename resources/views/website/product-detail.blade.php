@extends('website.master')

@section('title')
    Product Detail Page
@endsection

@section('body')
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-start">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default" src="{{ asset('storage/'.$product->image) }}"
                                xoriginal="{{ asset('storage/'.$product->image) }}" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <a href="{{ route('all-products') }}" class="mb-4">Go to Home</a>
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category">
                                <i class="lni lni-tag"></i> Category:
                                <a href="{{ route('product-category', ['id' => $product->category->id]) }}">{{ $product->category->name }}</a>
                                </a>
                            </p>
                            <p class="category">
                                <i class="lni lni-tag"></i>Sub-Category:
                                <a href="{{ route('product-sub-category', ['id' => $product->subcategory->id]) }}">{{ $product->subcategory->name }}</a>
                                </a>
                            </p>
                            Tk. <del>{{ $product->old_price }}</del>
                            <h3 class="price">
                                Tk. {{ $product->new_price }}
                            </h3>
                            <p class="info-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            


            <div class="product-details-info">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
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
            </div>
            


        </div>
    </section>


    {{-- <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="form-control" id="review-rating">
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" id="review-message" rows="8" required></textarea>
                    </div>
                </div>
                <div class="modal-footer button">
                    <button type="button" class="btn">Submit Review</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var quantityInput = $(this).closest('.quantity-wrapper').find('.quantity-input');
                var stockAmount = $('#stock_amount').val();
                var currentVal = parseInt(quantityInput.val());
                if (currentVal < stockAmount) {
                    quantityInput.val(currentVal + 1);
                }
            });

            // Handle decrement
            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var quantityInput = $(this).closest('.quantity-wrapper').find('.quantity-input');
                var currentVal = parseInt(quantityInput.val());
                if (currentVal > 1) { // Prevent going below 1
                    quantityInput.val(currentVal - 1);
                }
            });
        });
    </script>

    
@endpush
