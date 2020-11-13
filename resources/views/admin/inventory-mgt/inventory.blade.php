@extends('admin.layouts.app')


@section('content')
<div class="page-title">
    <h5>Inventory</h5>
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
            <option selected hidden>Filter by Category</option>
            <option value="">Category 1</option>
            <option value="">Category 2</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Location</option>
            <option value="">Warehouse 1</option>
            <option value="">Warehouse 2</option>
        </select>
    </div>
    <button class="sub-btn blue-btn btn mr-2" type="button">Export Page</button>
    <button class="sub-btn blue-btn btn mr-2" type="button">Export All</button>
    <button class="sub-btn green-btn btn ml-auto" type="button" data-toggle="modal" data-target="#addNewModal">Add
        New</button>
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
                   {{ $inventories->links() }}
                </ul>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="raw-data-table table table-bordered table-striped table-sm">
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
    </div>
</div>



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
                        <input class="form-control" name="user_id" type="hidden" value="1" required/>
                            <input type="file" class="custom-file-input" name="images[]" id="productImage"
                                aria-describedby="productImage1" multiple required/>
                            <label class="custom-file-label" for="productImage">Choose Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" name="product_name" type="text" required/>
                    </div>

                    <div class="form-group">
                        <label>Product ID</label>
                        <input class="form-control" name="product_id" type="text" required/>
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
                        <label>Description</label>
                        <input class="form-control" name="description" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" type="text" required/>
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
                        <input class="form-control" type="text" name="quantity_oh" required/>
                    </div>
                    <div class="form-group">
                        <label>Choose Status</label>
                        <select class="custom-select" name="status">

                                <option value="Submitted">Submitted</option>
                                <option value="Approved">Approved</option>
                                <option value="Delivered">Delivered</option>

                        </select>
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
