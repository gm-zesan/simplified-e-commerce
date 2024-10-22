@extends('admin.layouts.app')
@section('title')
    Product
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush



@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Product</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('products.index')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Product</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('products.create')}}" class="add-new">Create Product<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Subcategory</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
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
        var listUrl = SITEURL + '/products';

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
                    { data: 'category_id', name: 'category_id', orderable: true },
                    { data: 'subcategory_id', name: 'subcategory_id', orderable: true },
                    { data: 'price', name: 'price', orderable: true },
                    { 
                        data: 'description', 
                        name: 'description', 
                        orderable: true ,
                        render: function (data) {
                            return data.length > 50 ? data.substr(0, 50) + '...' : data;
                        }
                    },
                    { 
                        data: 'image', 
                        name: 'image', 
                        orderable: true,
                        render: function (data) {
                            return '<img src="' + data + '" alt="image" style="width: 50px; height: 50px;">';
                        },
                    },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/products/' + data + '/edit" title="edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<form action="' + SITEURL + '/products/' + data + '" method="POST" class="d-inline">';
                            btn1 += '@csrf';
                            btn1 += '@method("DELETE")';
                            btn1 += '<button type="submit" class="btn btn-delete" title="delete" data-method="delete" data-confirm="Are you sure?"><i class="ri-delete-bin-2-line"></i></button>';
                            btn1 += '</form>';
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'desc']]
            });
        });
    </script>


@endpush