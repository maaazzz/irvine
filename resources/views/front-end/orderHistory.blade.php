@extends('front-end.layouts.shop')


@section('content')


		<!-- Main -->
        <main class="main">
            <div class="container-fluid">
                <h5 class="page-title">Order History</h5>

                <div class="filter-box row">
                    <div class="col-md-6">
                        <div class="search-bar input-group mr-3">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-input" />
                            <div class="input-group-append">
                                <button class="small-btn btn" type="button" id="search-input"><i class="icon fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="filter-btns text-md-right">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="#" class="btn"><i class="fas fa-upload"></i>Export</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn"><i class="fas fa-sync-alt"></i>Refresh Data</a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-status text-md-right">
                            <ul class="list-inline d-inline-flex align-items-center m-0">
                                <li class="list-inline-item"><span>Status:</span></li>
                                <li class="list-inline-item">
                                    <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-red"></span><span class="stat-name">Submitted</span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-orange"></span><span class="stat-name">Approved</span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-green"></span><span class="stat-name">Delivered</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="history-table">
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
                                    <th>Justification</th>
                                    <th>Approved</th>
                                    <th>Delivered</th>
                                    <th>View Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        @if($order->status == 2)
                                            <span class="stat-dot stat-green"></span>
                                        
                                        @elseif($order->status == 1)
                                            <span class="stat-dot stat-orange"></span>
                                        
                                        @else
                                            <span class="stat-dot stat-red"></span>
                                        
                                        @endif
                                         
                                    
                                    </td>
                                    <td>04/19/2019</td>
                                <td>{{ $order->date_needed }}</td>
                                <td>{{ $order->location->loc_name }}</td>
                                    <td>{{ $order->accountNumber->account_no }}</td>
                                    <td>{{ $order->projectNumber->project_number }}</td>
                                    <td>{{ $order->shopper->name }}</td>
                                    <td>{{ $order->justification->justification }}</td>
                                    <td>04/19/2019</td>
                                    <td>04/20/2019</td>
                                    <td class="table-links">
                                        <a href="#" class="table-link view-btn" data-toggle="modal" data-target="#orderModal"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="#" class="table-link note-btn" data-toggle="modal" data-target="#notesModal"><i class="far fa-file-alt"></i></a>
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
            </div>
        </main>




@endsection
