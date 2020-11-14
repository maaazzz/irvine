@extends('admin.layouts.app')


@section('content')
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif


<div class="page-title">
    <h5>Categories</h5>
</div>

<div class="filter-box d-flex flex-wrap align-items-center">
    <div class="mr-2">
        <div class="search-bar input-group">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                aria-describedby="search-input" required />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="search-input"><i
                        class="icon fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <button class="sub-btn green-btn btn ml-auto" type="button" data-toggle="modal" data-target="#addNewModal">Add
        New</button>
</div>

<div class="pt-2">
    <div class="single-table">
        <table class="table table-bordered table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




<!-- Add New Modal -->
<div class="add-new-modal modal fade" id="addNewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="modal-form">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" />
                        </div>

                    </div>

                    <div class=" modal-btns d-flex justify-content-end pt-3">
                        <button type="submit" class="main-btn blue-btn btn ml-2">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
