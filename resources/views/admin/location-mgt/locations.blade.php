@extends('admin.layouts.app')


@section('content')
<div class="page-title">
    <h5>Locations</h5>
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

    <button class="sub-btn green-btn btn ml-auto" type="button" data-toggle="modal" data-target="#addNewModal">Add
        New</button>
</div>

<div class="pt-2">
    <div class="table-responsive">
        <table class="raw-data-table table table-bordered table-striped table-sm">
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
                <tr>
                    <td>Central Warehouse</td>
                    <td>James Smith</td>
                    <td>656-565-6566</td>
                    <td>jsmith@gmail.com</td>
                    <td>Hours: 9am - 5pm</td>
                </tr>
            </tbody>
        </table>
    </div>
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
                <div class="modal-form">
                    <div class="form-group">
                        <label>Location Name</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Contact Telephone</label>
                        <input class="form-control" type="tel" />
                    </div>
                    <div class="form-group">
                        <label>Contact Email</label>
                        <input class="form-control" type="email" />
                    </div>
                    <div class="form-group">
                        <label>Contact Details</label>
                        <input class="form-control" type="text" />
                    </div>
                </div>

                <div class="modal-btns d-flex justify-content-end pt-3">
                    <button type="button" class="main-btn blue-btn btn ml-2" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
