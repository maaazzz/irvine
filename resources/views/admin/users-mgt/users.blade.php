@extends('admin.layouts.app')

@section('content')
<div class="page-title">
    <h5>Users</h5>
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
            <option selected hidden>Filter by Account Type</option>
            <option value="">Account Type 1</option>
            <option value="">Account Type 2</option>
            <option value="">Account Type 3</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Account Status</option>
            <option value="">Account Status 1</option>
            <option value="">Account Status 2</option>
            <option value="">Account Status 3</option>
        </select>
    </div>
    <div class="mr-2">
        <select class="custom-select">
            <option selected hidden>Filter by Project</option>
            <option value="">Project 1</option>
            <option value="">Project 2</option>
            <option value="">Project 3</option>
        </select>
    </div>
</div>

<div class="filter-box d-flex flex-wrap align-items-center">
    <button class="sub-btn blue-btn btn mr-2" type="button">Export Page</button>
    <button class="sub-btn blue-btn btn mr-2" type="button">Export All</button>
    <button class="sub-btn blue-btn btn mr-2" type="button" data-toggle="modal" data-target="#emailModal">Email
        Selected</button>
    <button class="sub-btn blue-btn btn mr-2" type="button" data-toggle="modal" data-target="#emailModal">Email
        All</button>

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
                    <th>Shopper Name</th>
                    <th>Email</th>
                    <th>Account Type</th>
                    <th>Account Status</th>
                    <th>Orders</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-select"><input type="checkbox" class="" /></td>
                    <td>Jeremy Smith</td>
                    <td>jsmith7985@gmail.com</td>
                    <td>Shopper</td>
                    <td>Active</td>
                    <td class="">
                        <a href="#" class="table-link" data-toggle="modal" data-target="#ordersModal">View</a>
                    </td>
                    <td class="table-links">
                        <a class="table-link" href="#" data-toggle="modal" data-target="#editModal" title="Edit User"><i
                                class="fas fa-pen"></i></a>
                        <a class="table-link" href="#" data-toggle="modal" data-target="#resetPasswordModal"
                            title="Reset Password"><i class="fas fa-redo-alt"></i></a>
                    </td>
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
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <div class="form-group">
                        <label>Shopper Name</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" />
                    </div>
                    <div class="form-group">
                        <label>Account Type</label>
                        <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="selectAccountType"
                                    id="selectAccountType1" value="" />
                                <label class="form-check-label" for="selectAccountType1">Shopper</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="selectAccountType"
                                    id="selectAccountType2" value="" />
                                <label class="form-check-label" for="selectAccountType2">Approver</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="selectAccountType"
                                    id="selectAccountType3" value="" />
                                <label class="form-check-label" for="selectAccountType3">Warehouse Manager</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Account Status</label>
                        <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountStatusRadio"
                                    id="accountStatusRadio1" value="" />
                                <label class="form-check-label" for="accountStatusRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountStatusRadio"
                                    id="accountStatusRadio2" value="" />
                                <label class="form-check-label" for="accountStatusRadio2">Disabled</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn gray-btn btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Add User</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Orders Modal -->
<div class="orders-modal modal fade" id="ordersModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6><span class="font-weight-normal">Order Date : </span>28/10/2020</h6>
                <h6><span class="font-weight-normal">Order Number : </span>0101</h6>
                <h6><span class="font-weight-normal">Order Status : </span>Active</h6>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="edit-modal modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <div class="form-group">
                        <label>Shopper Name</label>
                        <input class="form-control" type="text" value="Jeremy Smith" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" value="jsmith7985@gmail.com" />
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select class="custom-select">
                            <option value="">Public Safety</option>
                            <option value="">Department 2</option>
                            <option value="">Department 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Account Type</label>
                        <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountTypeRadio"
                                    id="accountTypeRadio1" value="" checked />
                                <label class="form-check-label" for="accountTypeRadio1">Shopper</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountTypeRadio"
                                    id="accountTypeRadio2" value="" />
                                <label class="form-check-label" for="accountTypeRadio2">Approver</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountTypeRadio"
                                    id="accountTypeRadio3" value="" />
                                <label class="form-check-label" for="accountTypeRadio3">Warehouse Manager</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Account Status</label>
                        <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountStatusRadio"
                                    id="accountStatusRadio1" value="" checked />
                                <label class="form-check-label" for="accountStatusRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accountStatusRadio"
                                    id="accountStatusRadio2" value="" />
                                <label class="form-check-label" for="accountStatusRadio2">Disabled</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn gray-btn btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reset Password Modal -->
<div class="reset-password-modal modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" type="password" inputmode="" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" type="password" />
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn gray-btn btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Reset
                        Password</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
