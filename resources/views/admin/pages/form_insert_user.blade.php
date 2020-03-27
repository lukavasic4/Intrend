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
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add user</h3>
                                </div>
                                <hr>
                                @isset($errors)
                                    @foreach($errors->all() as $error)
                                        {{ $error }}.<br>
                                    @endforeach
                                @endisset
                                <form action="{{url('/admin/users/insert')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">First name</label>
                                        <input type="text" class="form-control"  name="first_name_add"  >
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Last name</label>
                                        <input name="last_name_add" type="text" class="form-control" >
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Email</label>
                                        <input type="email" name="email" class="form-control "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Password</label>
                                        <input type="password" name="password_add" class="form-control "/>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Roles</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="list">
                                            <option value="0">Choose...</option>
                                            @foreach($roles as $r)
                                                <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" name="btnAddUser" type="submit"  class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
