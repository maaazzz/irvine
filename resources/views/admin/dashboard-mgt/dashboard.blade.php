@extends('admin.layouts.app')

@section('content')
<<<<<<< HEAD
=======
@if(Session::has('danger'))
<div class="alert alert-danger">{{Session::get('danger')}}</div>
@endif
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
<div class="page-title">
    <h5>Dashboard</h5>
</div>

<div class="dash-box">
    <div class="dash-group">
        <div class="group-title pb-3">
            <h5 class="d-flex m-0"><span class="mr-4">Total Sales:</span><span>$13,25,656.00</span></h5>
        </div>
        <div class="d-flex flex-column flex-lg-row">
            <div class="row flex-grow-1">
                <div class="col-lg-6">
                    <div class="dash-data">
                        <h6 class="data-title">Sales by Orders by Category:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="dash-list">
                                <ul class="list-unstyled">
                                    <li><span class="color-box color1"></span><span>Cleaning Products </span></li>
                                    <li><span class="color-box color2"></span><span>Safety Products (PPE) </span></li>
                                    <li><span class="color-box color3"></span><span>Sports Equipment </span></li>
                                    <li><span class="color-box color4"></span><span>Batteries </span></li>
                                    <li><span class="color-box color5"></span><span>Stationary </span></li>
                                    <li><span class="color-box color6"></span><span>Clothing </span></li>
                                    <li><span class="color-box color7"></span><span>General Supplies </span></li>
                                    <li><span class="color-box color8"></span><span>Janitorial Products </span></li>
                                    <li><span class="color-box color9"></span><span>Paint </span></li>
                                    <li><span class="color-box color10"></span><span>Tools </span></li>
                                    <li><span class="color-box color11"></span><span>Flags </span></li>
                                    <li><span class="color-box color12"></span><span>Misc. </span></li>
                                </ul>
                            </div>
                            <div class="dash-chart">
                                <canvas id="dashChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dash-data">
                        <h6 class="data-title">Sales by Orders by Department:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="dash-list">
                                <ul class="list-unstyled">
                                    <li><span class="color-box color2"></span><span>Public Works </span></li>
                                    <li><span class="color-box color10"></span><span>Parks & Recs </span></li>
                                    <li><span class="color-box color9"></span><span>Facilites </span></li>
                                    <li><span class="color-box color5"></span><span>Senior Services </span></li>
                                    <li><span class="color-box color6"></span><span>Human Resources </span></li>
                                    <li><span class="color-box color8"></span><span>Information Technology </span></li>
                                </ul>
                            </div>
                            <div class="dash-chart">
                                <canvas id="dashChart2"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="dash-data">
                        <h6 class="data-title">Sales by Orders by Location:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="dash-list">
                                <ul class="list-unstyled">
                                    <li><span class="color-box color6"></span><span>Select All </span></li>
                                    <li><span class="color-box color8"></span><span>Central Warehouse </span></li>
                                    <li><span class="color-box color2"></span><span>City Hall </span></li>
                                    <li><span class="color-box color4"></span><span>Great Parks </span></li>
                                </ul>
                            </div>
                            <div class="dash-chart">
                                <canvas id="dashChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dash-data dash-table-box">
                <h5 class="data-title">Total Sales ($):</h5>
                <div class="dash-table">
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td>Total Open:</td>
                                <td>$3,45,006.00</td>
                            </tr>
                            <tr>
                                <td>Total Pending:</td>
                                <td>$1,34,104.00</td>
                            </tr>
                            <tr>
                                <td>Total Complete:</td>
                                <td>$8,46,546.00</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="table-total">$13,25,656.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="dash-group">
        <div class="group-title pb-3">
            <h5 class="d-flex m-0"><span class="mr-4">Total Orders:</span><span>5,569</span></h5>
        </div>
        <div class="d-flex flex-column flex-lg-row">
            <div class="row flex-grow-1">
                <div class="col-lg-6">
                    <div class="dash-data">
                        <h6 class="data-title">Sales by Orders by Category:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="dash-list">
                                <ul class="list-unstyled">
                                    <li><span class="color-box color1"></span><span>Cleaning Products </span></li>
                                    <li><span class="color-box color2"></span><span>Safety Products (PPE) </span></li>
                                    <li><span class="color-box color3"></span><span>Sports Equipment </span></li>
                                    <li><span class="color-box color4"></span><span>Batteries </span></li>
                                    <li><span class="color-box color5"></span><span>Stationary </span></li>
                                    <li><span class="color-box color6"></span><span>Clothing </span></li>
                                    <li><span class="color-box color7"></span><span>General Supplies </span></li>
                                    <li><span class="color-box color8"></span><span>Janitorial Products </span></li>
                                    <li><span class="color-box color9"></span><span>Paint </span></li>
                                    <li><span class="color-box color10"></span><span>Tools </span></li>
                                    <li><span class="color-box color11"></span><span>Flags </span></li>
                                    <li><span class="color-box color12"></span><span>Misc. </span></li>
                                </ul>
                            </div>
                            <div class="dash-chart">
                                <canvas id="dashChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dash-data">
                        <h6 class="data-title">Sales by Orders by Department:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="dash-list">
                                <ul class="list-unstyled">
                                    <li><span class="color-box color2"></span><span>Public Works </span></li>
                                    <li><span class="color-box color10"></span><span>Parks & Recs </span></li>
                                    <li><span class="color-box color9"></span><span>Facilites </span></li>
                                    <li><span class="color-box color5"></span><span>Senior Services </span></li>
                                    <li><span class="color-box color6"></span><span>Human Resources </span></li>
                                    <li><span class="color-box color8"></span><span>Information Technology </span></li>
                                </ul>
                            </div>
                            <div class="dash-chart">
                                <canvas id="dashChart5"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="dash-data">
                        <h6 class="data-title">Sales by Orders by Location:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="dash-list">
                                <ul class="list-unstyled">
                                    <li><span class="color-box color6"></span><span>Select All </span></li>
                                    <li><span class="color-box color8"></span><span>Central Warehouse </span></li>
                                    <li><span class="color-box color2"></span><span>City Hall </span></li>
                                    <li><span class="color-box color4"></span><span>Great Parks </span></li>
                                </ul>
                            </div>
                            <div class="dash-chart">
                                <canvas id="dashChart6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dash-data dash-table-box">
                <h5 class="data-title">Total Sales (Qty):</h5>
                <div class="dash-table">
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td>Total Open:</td>
                                <td>1,019</td>
                            </tr>
                            <tr>
                                <td>Total Pending:</td>
                                <td>989</td>
                            </tr>
                            <tr>
                                <td>Total Complete:</td>
                                <td>3,561</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="table-total">5,569</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('admin-assets/js/main.js')}}"></script>
<script src="{{asset('admin-assets/js/chart-data.js')}}"></script>
@endsection
