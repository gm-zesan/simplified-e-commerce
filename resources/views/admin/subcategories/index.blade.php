@extends('admin.layouts.app')
@section('title')
    Sub Categories
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
                            <div class="table-title">Sub Categories</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Sub Categories</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('subcategories.index')}}" class="add-new">Sub Categories<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">SubCategories Name</th>
                                    <th scope="col">Category</th>
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
                <form action="{{ isset($subCategory) ? route('subcategories.update', ['subcategory' => $subCategory->id]) : route('subcategories.store') }}" method="POST" autocomplete="off">
                @csrf
                @if (isset($subCategory))
                    @method('PUT')
                @endif
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header table-header">
                                    <div class="title-with-breadcrumb">
                                        <div class="table-title">Sub Categories</div>
                                    </div>
                                    <button type="submit" class="btn add-new">{{ isset($subCategory) ? 'Update' : 'Save' }}
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                        </span>
                                    </button>
                                </div>
                                <div class="card-body custom-form">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="category_id" class="form-label custom-label">Category</label>
                                            <select class="form-control custom-input single-select2" name="category_id">
                                                @if (!isset($subCategory))
                                                    <option value="" disabled selected> -- Select Category --</option>
                                                @endif
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if (isset($subCategory))
                                                            {{  $category->id == $subCategory->category_id ? 'selected' : '' }}
                                                        @endif
                                                    >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('category_id'))
                                                <div class="error_msg">
                                                    {{ $errors->first('category_id') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <label for="name" class="form-label custom-label">Sub Categories Name</label>
                                            <input type="text" class="form-control custom-input" name="name" id="name"
                                                @if (isset($subCategory))
                                                    value="{{ $subCategory->name }}"
                                                @else
                                                    placeholder="Sub Categories name"
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


@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>



    {{-- Datatable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/subcategories';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'category', name: 'category', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/subcategories/' + data + '/edit" title="edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<form action="' + SITEURL + '/subcategories/' + data + '" method="POST" class="d-inline">';
                            btn1 += '@csrf';
                            btn1 += '@method("DELETE")';
                            btn1 += '<button type="submit" class="btn btn-delete" title="delete" data-method="delete" data-confirm="Are you sure?"><i class="ri-delete-bin-2-line"></i></button>';
                            btn1 += '</form>';
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']]
            });
        });
    </script>


@endpush
