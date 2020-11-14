@extends('admin.layouts.app')


@section('content')
@if (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

<h5 class="page-title">Approvals</h5>

<div class="filter-box d-flex flex-wrap align-items-center">
    <div class="mr-2">
        <div class="search-bar input-group">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                aria-describedby="search-input" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="search-input"><i
                        class="icon fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Status</option>
            <option value="">Status 1</option>
            <option value="">Status 2</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Shopper Name</option>
            <option value="">Shopper Name 1</option>
            <option value="">Shopper Name 2</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Department</option>
            <option value="">Department 1</option>
            <option value="">Department 2</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Approver</option>
            <option value="">Approver 1</option>
            <option value="">Approver 2</option>
            <option value="">Approver 3</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Account No.</option>
            <option value="">Account Number 1</option>
            <option value="">Account Number 2</option>
            <option value="">Account Number 3</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Project No.</option>
            <option value="">Project 1</option>
            <option value="">Project 2</option>
            <option value="">Project 3</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Delivery</option>
            <option value="">Delivery 1</option>
            <option value="">Delivery 2</option>
            <option value="">Delivery 3</option>
        </select>
    </div>
    <button class="main-btn sub-btn blue-btn btn mr-2" type="button" data-toggle="modal"
        data-target="#sortDateModal">Sort by Date</button>
    <button class="main-btn sub-btn blue-btn btn mr-2" type="button">Export Page</button>
    <button class="main-btn sub-btn blue-btn btn mr-2" type="button">Export All</button>
</div>

<div class="">
    <div class="filter-status text-md-right">
        <ul class="list-inline d-inline-flex align-items-center m-0">
            <li class="list-inline-item"><span>Status:</span></li>
            <li class="list-inline-item">
                <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-red"></span><span
                        class="stat-name">Submitted</span></a>
            </li>
            <li class="list-inline-item">
                <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-orange"></span><span
                        class="stat-name">Approved</span></a>
            </li>
            <li class="list-inline-item">
                <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-green"></span><span
                        class="stat-name">Delivered</span></a>
            </li>
        </ul>
    </div>
</div>

<div class="">
    <div class="table-filter">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <p class="show-txt">Showing 0 to 0 of 0 entries</p>
            <div class="row-select d-flex align-items-center">
                <span>Show </span>
                <select class="custom-select">
                    <option value="1">10</option>
                    <option value="2">50</option>
                    <option value="3">100</option>
                </select>
                <span> entries</span>
            </div>

            <div class="">
                <ul class="pagination pagination-sm justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Needed</th>
                    <th>Location</th>
                    <th>Account #</th>
                    <th>Project</th>
                    <th>Shopper</th>
                    <th>Justification</th>

                    <th>Delivered</th>
                    <th>Approved</th>
                    <th>View Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvals as $approval)
                <tr>
                    <td><span class="stat-dot stat-green"></span></td>
                    <td>{{ date('Y-m-d', strtotime($approval->created_at))}}</td>
                    <td>{{ $approval->date_needed }}</td>
                    <td>{{ $approval->location->loc_name }}</td>
                    <td>{{ $approval->accountNumber->account_no }}</td>
                    <td>{{ $approval->projectNumber->project_number }}</td>
                    <td>{{$approval->approver->name}}</td>
                    <td>{{ $approval->justification->justification }}</td>
                    <td>{{ $approval->delivery_type }}</td>

                    <td>
                        <form action="{{ route('approval.approved',$approval->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @if ($approval->status == 0)
                            <input type="submit" class="btn btn-sm btn-info" value="approve">
                            @else
                            approved
                            @endif
                        </form>
                    </td>
                    <td class="table-links">
                        <a href="#" class="table-link note-btn" data-toggle="modal" data-target="#notesModal"><i
                                class="far fa-file-alt"></i></a>
                    </td>
                    <td class="table-links">
                        <a href="#" class="table-link note-btn"><i class="fas fa-pen"></i></a>
                        <a href="#" class="table-link note-btn"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection