@extends('layouts.admin_layouts')
@section('title')
    @parent
    Admin page
@endsection
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rs-select2--dark rs-select2--md m-r-10 mb-2">
                            <select class="js-select2" name="property" id="filterDate">
                                <option value="1">Ascending</option>
                                <option value="2">Descending</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="table-responsive table--no-card m-b-20">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Activity time</th>
                                    <th>Activity</th>
                                </tr>
                                </thead>
                                <tbody id="akcija">
                                @foreach($akcija as $a)
                                    <tr>
                                        <td>{{$a->date_action}}</td>
                                        <td>{{$a->action}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>
@endsection
