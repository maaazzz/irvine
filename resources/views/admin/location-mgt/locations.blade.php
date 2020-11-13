@extends('admin.layouts.app')


@section('content')

@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

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
                            <input class="form-control" type="text" name="loc_name" />
                        </div>
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control" type="text" name="contact_person" />
                        </div>
                        <div class="form-group">
                            <label>Contact Telephone</label>
                            <input class="form-control" type="tel" name="telephone" />
                        </div>
                        <div class="form-group">
                            <label>Contact Email</label>
                            <input class="form-control" type="email" name="email" />
                        </div>
                        <div class="form-group">
                            <label>Contact Details</label>
                            <input class="form-control" type="text" name="contact_details" />
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
