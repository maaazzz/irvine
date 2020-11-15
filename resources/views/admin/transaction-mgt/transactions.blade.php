@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css">

<style>
    button.dt-button,
    div.dt-button,
    a.dt-button,
    input.dt-button {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
        border-right: #fff !important;

    }

    .ui.basic.button,
    .ui.basic.buttons .buttons-excel {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
        border-right: #fff;
    }

    .ui.basic.button,
    .ui.basic.buttons .buttons-pdf {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
    }

    .ui.basic.button,
    .ui.basic.buttons .buttons-collection {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
    }
</style>

@endsection

@section('content')

@if (Session('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@endif

<div class="page-title">
    <h5>Transactions</h5>
</div>

<div class="filter-box d-flex flex-wrap align-items-center mb-4">
    <div class="mr-2">
        <select class="custom-select" id="filter-by-status">
            <option selected hidden>Filter by Status</option>
            <option value="Submitted">Submitted</option>
            <option value="Approved">Approved</option>
            <option value="Deliverd">Deliverd</option>
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
        <select class="custom-select" id="filter-by-approver">
            <option selected hidden>Filter by Approver</option>
            @forelse ($users as $user)
            @if ($user->role == 2)
            <option value="{{ $user->name }}">{{ $user->name }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select" id="filter-by-acc">
            <option selected hidden>Filter by Account No.</option>
            @foreach ($acc_numbers as $acc)
            <option value="{{ $acc->account_no }}">{{ $acc->account_no }}</option>
            @endforeach
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select" id="filter-by-project-no">
            <option selected hidden>Filter by Project No.</option>
            @foreach ($project_nums as $project)
            <option value="{{ $project->project_number }}">{{ $project->project_number }}</option>
            @endforeach
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select" id="filter-by-deliver">
            <option selected hidden>Filter by Delivery</option>
            <option value="Deliver to Me">Deliver to Me</option>
            <option value="Warehouse Pickup">Warehouse Pickup</option>
        </select>
    </div>
    <button class="sub-btn blue-btn btn mr-2" type="button" data-toggle="modal" data-target="#sortDateModal">Sort by
        Date</button>
</div>

<div class="">
    <div class="filter-status text-md-right mb-3">
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
    <table class="table table-bordered table-striped table-sm text-center" id="example">
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
                <th>Delivered</th>
                <th>View Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                @if($transaction->status == 0)
                <td>
                    <span class="stat-dot stat-red"></span>
                    Submitted
                </td>
                @elseif($transaction->status == 1)
                <td>
                    <span class="stat-dot stat-orange"></span>
                    Approved
                </td>
                @else
                <td>
                    <span class="stat-dot stat-green"></span>
                    Deliverd
                </td>
                @endif
                <td>{{ date('Y-m-d', strtotime($transaction->created_at))}}</td>
                <td>{{ $transaction->date_needed }}</td>
                <td>{{ $transaction->location->loc_name }}</td>
                <td>{{ $transaction->accountNumber->account_no }}</td>
                <td>{{ $transaction->projectNumber->project_number }}</td>
                <td>{{$transaction->approver->name}}</td>
                <td>{{ $transaction->justification->justification }}</td>
                @if ($transaction->delivery_type == 0)
                <td>
                    Warehouse Pickup
                </td>
                @else
                <td>
                    Deliver to Me
                </td>
                @endif

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

<!-- Sort by Date Modal -->
<div class="sort-date-modal modal fade" id="sortDateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sort by Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <div class="form-group">
                        <label>From</label>
                        <input class="form-control" type="date" />
                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <input class="form-control" type="date" />
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Sort</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
        dom: 'Bfrtip',
        select: true,
        colReorder: true,
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
    });

    table.buttons().container()
        .appendTo($('div.eight.column:eq(0)', table.table().container()));

    $('#filter-by-status').on('change', function(){
        table.search(this.value).draw();
    });

    $('#filter-by-approver').on('change', function(){
        table.search(this.value).draw();
    });

    $('#filter-by-acc').on('change', function(){
        table.search(this.value).draw();
    });
    $('#filter-by-project-no').on('change', function(){
        table.search(this.value).draw();
    });
    $('#filter-by-deliver').on('change', function(){
        table.search(this.value).draw();
    });
});
</script>

@endsection