@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
@if(Session::has('danger'))
<div class="alert alert-danger">{{Session::get('danger')}}</div>
@endif
<div class="page-title">
    <h5>Inventory</h5>
</div>

<div class="row mb-5 mt-3">
    <div class="col-sm-3 float-right">
        <div class="form-group">
            <select class="form-control" id="category-filter">
                <option value="" selected hidden>Filter by Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3 float-right">
        <div class="form-group">
            <select class="form-control" id="location-filter">
                <option value="" selected hidden>Filter by Location</option>
                @foreach ($locations as $location)
                <option value="{{ $location->loc_name }}">{{ $location->loc_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6 text-right">
        <button class="sub-btn green-btn btn ml-auto" type="button" data-toggle="modal" data-target="#addNewModal">Add
            New</button>
    </div>
</div>

<table id="example" class="raw-data-table table table-bordered table-striped table-sm">
    <thead class="thead-dark">
        <tr>
            <th class="table-select"><input class="" type="checkbox" /></th>
            <th>Photos</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Product ID</th>
            <th>Description</th>
            <th>Price</th>
            <th>UOM</th>
            <th>Location</th>
            <th>QTY OH</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventories as $inventory)
        <tr>
            <td class="table-select"><input type="checkbox" class="" /></td>
            <td><img class="table-img" src="../images/{{ $inventory->image }}" alt="" /></td>
            <td>{{ $inventory->product_name }}</td>
            <td>{{ $inventory->category->name }}</td>
            <td>{{ $inventory->product_id }}</td>
            <td>{{ $inventory->description }}</td>
            <td>{{ $inventory->price }}</td>
            <td>{{ $inventory->umd }}</td>
            <td>{{ $inventory->location->loc_name }}</td>
            <td>{{ $inventory->quantity_oh }}</td>
        </tr>
        @endforeach

    </tbody>
</table>



<!-- Email Modal -->
<div class="email-modal modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <div class="form-group">
                        <label>Subject</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="" rows="8"></textarea>
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn gray-btn btn" data-dismiss="modal">Upload</button>
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add New Modal -->
<div class="add-new-modal modal fade" id="addNewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('inventory.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="form-group">
                            <label>Product Image</label>
                            <div class="custom-file">
                                <input class="form-control" name="user_id" type="hidden" value="1" required />
                                <input type="file" class="custom-file-input" name="images[]" id="productImage"
                                    aria-describedby="productImage1" multiple required />
                                <label class="custom-file-label" for="productImage">Choose Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control" name="product_name" type="text" required />
                        </div>

                        <div class="form-group">
                            <label>Product ID</label>
                            <input class="form-control" name="product_id" type="text" required />
                        </div>
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="custom-select" name="category_id" required>
                                <option value="" Selected disabled>Choose Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select Related Products</label>
                            <select class="js-example-basic-multiple form-control" name="related_inventories[]"
                                multiple="multiple" style="width:450px !important">

                                @foreach ($inventories as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" type="text" required />
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" type="text" required />
                        </div>

                        <div class="form-group">
                            <label>UMO</label>
                            <select class="custom-select" name="umd">
                                <option value="1">EA</option>
                                <option value="2">PAC</option>
                                <option value="3">BOX</option>
                                <option value="4">LOT</option>
                                <option value="5">LBS</option>
                                <option value="6">FT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Location</label>
                            <select class="custom-select" name="location_id" required>

                                <option value="" Selected disabled>Choose Location</option>
                                @foreach($locations as $location)

                                <option value="{{ $location->id }}">{{ $location->loc_name }}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>QTY OH</label>
                            <input class="form-control" type="text" name="quantity_oh" required />
                        </div>
                        {{-- <div class="form-group">
                            <label>Choose Status</label>
                            <select class="custom-select" name="status">

                                <option value="Submitted">Submitted</option>
                                <option value="Approved">Approved</option>
                                <option value="Delivered">Delivered</option>

                            </select>
                        </div> --}}

                        <div class="form-group">
                            New
                            <input class="mx-1" name="is_featured" type="radio" value="1" />
                            <label>Featured</label>
                            <input class="mx-1 mr-2" name="is_featured" type="radio" value="2" />
                        </div>
                    </div>

                    <div class="modal-btns d-flex justify-content-end pt-3">
                        <button type="button" class="main-btn gray-btn btn" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="main-btn blue-btn btn ml-2">Add Inventory</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
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
