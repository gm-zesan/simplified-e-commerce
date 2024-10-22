@extends('admin.layouts.app')
@section('title')
    Product
@endsection


@push('custom-style')
    <style>
        .select2-container.select2-container--default {
            max-width: 694.656px;
            width: 100% !important;
        }
    </style>
@endpush


@section('content')


<div class="container-fluid my-3">
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Product</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('products.index')}}">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Product</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('products.index')}}" class="add-new">Product<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        
                        <div class="row">

                            <div class="col-12">
                                <label for="" class="form-label custom-label">Name</label>
                                <input type="text" class="form-control custom-input" name="name" value="{{ $product->name }}">
                                @if($errors->has('name'))
                                    <div class="error_msg">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="categoryId" class="form-label custom-label">Category</label>
                                <select class="form-select custom-input single-select2" name="category_id" id="categoryId">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="error_msg">
                                        {{ $errors->first('category_id') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="subCategoryId" class="form-label custom-label">Subcategory</label>
                                <select class="form-select custom-input single-select2" name="subcategory_id" id="subCategoryId">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('subcategory_id'))
                                    <div class="error_msg">
                                        {{ $errors->first('subcategory_id') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="old_price" class="form-label custom-label">Old Price</label>
                                <input type="number" class="form-control custom-input" name="old_price" value="{{ $product->old_price }}">
                                @if($errors->has('old_price'))
                                    <div class="error_msg">
                                        {{ $errors->first('old_price') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="new_price" class="form-label custom-label">New Price</label>
                                <input type="number" class="form-control custom-input" name="new_price" value="{{ $product->new_price }}">
                                @if($errors->has('new_price'))
                                    <div class="error_msg">
                                        {{ $errors->first('new_price') }}
                                    </div>
                                @endif
                            </div>



                            <div class="col-md-12">
                                <label for="description" class="form-label custom-label">Description</label>
                                <textarea class="form-control custom-input" name="description" rows="5"  placeholder="Description"  style="resize: none; height: auto">{{ $product->description }}</textarea>
                                @if($errors->has('description'))
                                    <div class="error_msg">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-md-4 col-12">
                <div class="row g-4">
                    <div class="col-12 order-last order-md-first">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">Save
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('products.index')}}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Product Image</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="image-select-file">
                                    <label class="form-label custom-label" for="cover_image">
                                        <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                        <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                        <div class="user-image">
                                            <img id="cover_imagePreview" src="{{ $product->image ? asset('storage/' . $product->image) : asset('admin/images/default.jpg') }}" alt="background-image" class="image-preview">
                                            <span class="formate-error cover_imageerror"></span>
                                        </div>
                                        <span class="upload-btn">Upload Image</span>
                                    </label>
                                </div>

                                <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                @if($errors->has('cover_image'))
                                    <div class="error_msg">
                                        {{ $errors->first('cover_image') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </form>
</div>

@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
