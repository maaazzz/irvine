@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

<div class="page-title">
    <h5>Locations</h5>
</div>

<div class="filter-box d-flex flex-wrap align-items-center">
    <button class="sub-btn green-btn btn ml-auto" type="button" data-toggle="modal" data-target="#addNewModal">Add
        New</button>
</div>

<div class="pt-2">
    <table class="raw-data-table table table-bordered table-striped table-sm" id="example">
        <thead class="thead-dark">
            <tr>
                <th>Location Name</th>
                <th>Contact Person</th>
                <th>Contact Telephone</th>
                <th>Contact Email</th>
                <th>Contact Details</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($locations as $location)
            <tr>
                <td>{{ $location->loc_name }}</td>
                <td>{{ $location->contact_person }}</td>
                <td>{{ $location->telephone }}</td>
                <td>{{ $location->email }}</td>
                <td>{{ $location->contact_details }}</td>
            </tr>
            @empty
            <p>categories not found</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="add-new-modal modal fade" id="addNewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('locations.store') }}" method="post">
                    @csrf
                    <div class="modal-form">
                        <div class="form-group">
                            <label>Location Name</label>
                            <input class="form-control" type="text" name="loc_name" required />
                        </div>
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control" type="text" name="contact_person" required />
                        </div>
                        <div class="form-group">
                            <label>Contact Telephone</label>
                            <input class="form-control" type="tel" name="telephone" required />
                        </div>
                        <div class="form-group">
                            <label>Contact Email</label>
                            <input class="form-control" type="email" name="email" required />
                        </div>
                        <div class="form-group">
                            <label>Contact Details</label>
                            <input class="form-control" type="text" name="contact_details" required />
                        </div>
                    </div>

                    <div class="modal-btns d-flex justify-content-end pt-3">
                        <button type="submit" class="main-btn blue-btn btn ml-2">Save</button>
                    </div>
                </form>
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
    } );
        table.buttons().container()
            .appendTo($('div.eight.column:eq(0)', table.table().container()));

        $('#category-filter').on('change', function(){
            table.search(this.value).draw();
        });

        $('#location-filter').on('change', function(){
            table.search(this.value).draw();
        });
    });
</script>

@endsection