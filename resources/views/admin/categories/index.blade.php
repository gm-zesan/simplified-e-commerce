@extends('admin.layouts.app')
@section('title')
    Categories
@endsection

@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    {{-- Data Table --}}
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-7">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Categories</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('categories.index')}}" class="add-new">Categories<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <form action="{{ isset($category) ? route('categories.update', ['category' => $category->id]) : route('categories.store') }}" method="POST" autocomplete="off">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif

                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header table-header">
                                    <div class="title-with-breadcrumb">
                                        <div class="table-title">Categories</div>
                                    </div>
                                    <button type="submit" class="btn add-new">{{ isset($category) ? 'Update' : 'Save' }}
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                        </span>
                                    </button>
                                </div>
                                <div class="card-body custom-form">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label custom-label">Category Name</label>
                                            <input type="text" class="form-control custom-input" name="name" id="name"
                                                @if (isset($category))
                                                    value="{{ $category->name }}"
                                                @else
                                                    placeholder="Category Name"
                                                @endif
                                            >
                                            @if($errors->has('name'))
                                                <div class="error_msg">
                                                    {{ $errors->first('name') }}
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
        </div>
    </div>

@endsection



