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
                                    <h3 class="text-center title-2">Add post</h3>
                                </div>
                                <hr>
                                @isset($errors)
                                    @foreach($errors->all() as $error)
                                        {{ $error }}.<br>
                                    @endforeach
                                @endisset
                                <form action="{{url('/admin/gallery/insert')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input type="file" name="add_image_post" class="form-control" >
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Title</label>
                                        <input name="title_add" type="text" class="form-control" >
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Description</label>
                                        <input type="text" name="description_add" class="form-control "/>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Categories</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="categories_list">
                                                <option value="0">Choose...</option>
                                                @foreach($cat as $c)
                                                    <option value="{{$c->categories_id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" name="btnAddPost" type="submit"  class="btn btn-lg btn-info btn-block">
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

