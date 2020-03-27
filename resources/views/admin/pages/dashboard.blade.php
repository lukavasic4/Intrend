@extends('layouts.admin_layouts')
@section('title')
    @parent
    Admin page
@endsection
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Users</h2>
                        <div class="table-responsive table--no-card m-b-20">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th >Email</th>
                                    <th>Password</th>
                                    <th >Role</th>
                                    <th >Update</th>
                                    <th >Delete</th>
                                </tr>
                                </thead>
                                <tbody id="korisnici">
                                @foreach($users as $user)
                                    @component('admin.components.user.users',[
                                    "user" => $user
        ]);
                                    @endcomponent
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
