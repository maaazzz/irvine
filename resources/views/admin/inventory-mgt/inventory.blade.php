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
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product110.jpg')}}" alt="" /></td>
                    <td>Surface Spray</td>
                    <td>MISCELLANEOUS</td>
                    <td>160</td>
                    <td>ABSORBENT, OOPS VOMIT CONTROL</td>
                    <td>$2.17</td>
                    <td>EA</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product120.jpg')}}" alt="" /></td>
                    <td>Mr. Clean</td>
                    <td>SAFETY PRODUCTS</td>
                    <td>161</td>
                    <td>ABSORBENT, X-SORB, 13 GAL</td>
                    <td>$17.70</td>
                    <td>BG</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product110.jpg')}}" alt="" /></td>
                    <td>Surface Spray</td>
                    <td>CLEANING PRODUCTS</td>
                    <td>146</td>
                    <td>AIR FRESHENER, DEODORANT SPRAY</td>
                    <td>$1.98</td>
                    <td>EA</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product120.jpg')}}" alt="" /></td>
                    <td>Mr. Clean</td>
                    <td>GENERAL SUPPLIES</td>
                    <td>608</td>
                    <td>BADGE HOLDER, CLEAR SLEEVE</td>
                    <td>$23.26</td>
                    <td>PK</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product110.jpg')}}" alt="" /></td>
                    <td>Surface Spray</td>
                    <td>SAFETY PRODUCTS</td>
                    <td>416</td>
                    <td>BARRICADE, FLASHERS FOR</td>
                    <td>$31.32</td>
                    <td>EA</td>
                    <td>Warehouse 2</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product120.jpg')}}" alt="" /></td>
                    <td>Mr. Clean</td>
                    <td>BATTERIES</td>
                    <td>704</td>
                    <td>BATTERY, D , PK 12</td>
                    <td>$7.23</td>
                    <td>PK</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product110.jpg')}}" alt="" /></td>
                    <td>Surface Spray</td>
                    <td>SAFETY PRODUCTS</td>
                    <td>275</td>
                    <td>BLANKET, SAFETY FOR FIRST AID</td>
                    <td>$2.40</td>
                    <td>EA</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product120.jpg')}}" alt="" /></td>
                    <td>Mr. Clean</td>
                    <td>CLEANING PRODUCTS</td>
                    <td>150</td>
                    <td>BLEACH, 1 GALLON CONTAINER</td>
                    <td>$8.40</td>
                    <td>GL</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td><img class="table-img" src="{{asset('admin-assets/img/product110.jpg')}}" alt="" /></td>
                    <td>Surface Spray</td>
                    <td>CLEANING PRODUCTS</td>
                    <td>171</td>
                    <td>BOTTLE, 32OZ. SPRAY BOTTLE</td>
                    <td>$1.73</td>
                    <td>EA</td>
                    <td>Warehouse 1</td>
                    <td>10</td>
                </tr>
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
            <div class="modal-body">
                <div class="modal-form">
                    <div class="form-group">
                        <label>Product Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="productImage"
                                aria-describedby="productImage1" />
                            <label class="custom-file-label" for="productImage">Choose Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="custom-select">
                            <option value="">Category 1</option>
                            <option value="">Category 2</option>
                            <option value="">Category 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product ID</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>UMO</label>
                        <select class="custom-select">
                            <option value="">EA</option>
                            <option value="">PAC</option>
                            <option value="">BOX</option>
                            <option value="">LOT</option>
                            <option value="">LBS</option>
                            <option value="">FT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Location</label>
                        <select class="custom-select">
                            <option value="">Warehouse 1</option>
                            <option value="">Warehouse 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>QTY OH</label>
                        <input class="form-control" type="text" />
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn gray-btn btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Add Inventory</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
