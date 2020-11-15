@extends('admin.layouts.app')


@section('content')

@if (Session('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@endif

<div class="page-title">
    <h5>Transactions</h5>
</div>

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
    <button class="sub-btn blue-btn btn mr-2" type="button" data-toggle="modal" data-target="#sortDateModal">Sort by
        Date</button>
    <button class="sub-btn blue-btn btn mr-2" type="button">Export Page</button>
    <button class="sub-btn blue-btn btn mr-2" type="button">Export All</button>
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

            <div class="">
                <ul class="pagination pagination-sm justify-content-end">
                    {{$transactions->links()}}
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
                    <th>Approver</th>
                    <th>Shopper</th>
                    <th>Justification</th>
                    <th>Delivered</th>
                    <th>View Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                <tr>

                    <td>
                        @if ($transaction->status == 0)
                        <span class="stat-dot stat-red"></span>
                        @endif
                        @if ($transaction->status == 1)
                        <span class="stat-dot stat-green"></span>
                        @endif
                        @if ($transaction->status == 2)
                        <span class="stat-dot stat-green"></span>
                        @endif
                    </td>
                    <td>{{ date('Y-m-d', strtotime($transaction->created_at))}}</td>
                    <td>{{ $transaction->date_needed }}</td>
                    <td>{{ $transaction->location->loc_name }}</td>
                    <td>{{ $transaction->accountNumber->account_no }}</td>
                    <td>{{ $transaction->projectNumber->project_number }}</td>
                    <td>{{$transaction->approver->name}}</td>
                    <td>{{$transaction->shopper->name}}</td>
                    <td>{{ $transaction->justification->justification }}</td>
                    <td>{{ $transaction->delivery_type }}</td>

                    <td class="table-links">
                        <a href="#" class="table-link view-btn" data-toggle="modal" data-target="#orderModal"><i
                                class="fas fa-shopping-cart"></i></a>
                        <a href="#" class="table-link note-btn" data-toggle="modal" data-target="#notesModal"><i
                                class="far fa-file-alt"></i></a>
                    </td>
                    <td class="table-links">
                        <a href="" class="table-link note-btn"><i class="fas fa-pen"></i></a>
                        <a href="{{ route('transaction.destroy',$transaction->id) }}" class="table-link note-btn"><i
                                class="far fa-trash-alt"></i></a>
                    </td>
                </tr>

                @empty
                <p>data not found</p>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection
