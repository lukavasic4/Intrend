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
                        <h2 class="title-1 m-b-25">Messages for admin</h2>
                        <div class="table-responsive table--no-card m-b-20">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Messages</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($poruke as $poruka)
                                   <tr>
                                       <td>{{$poruka->f_name}}</td>
                                       <td>{{$poruka->l_name}}</td>
                                       <td>{{$poruka->email}}</td>
                                       <td>{{$poruka->message}}</td>
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
