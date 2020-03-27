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
                                    <h3 class="text-center title-2">Update post</h3>
                                </div>
                                <hr>
                                @isset($errors)
                                    @foreach($errors->all() as $error)
                                        {{ $error }}.<br>
                                    @endforeach
                                @endisset
                               @component('admin.components.gallery.update_gallery',[
                        'post' => $oneOfPost,
                        'cat' => $cat
]);
                                   @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
