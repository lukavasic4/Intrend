@extends('layouts.template')
@section('title')
    @parent
    Gallery
@endsection
@section('header')
    @parent
    @include('fixed.header')
    @endsection
@section('sredina')

<div class="gallery py-5">
    <div class="container py-sm-3">
            <input type="search" class="" name="pretraga" id="pretraga" placeholder="Search.."/>
        <h2 class="heading text-capitalize mb-sm-5 mb-3"> Categories </h2>
        <div class="banner-bottom">
            <div class="container-fluid">
                <div class="banner_bottom_agile_grids">
                    <div class="row wthree_banner_bottom_right_grids pr-sm-3">
                       @foreach($kategorije as $kategorija)
                            @component('partials.categories',[
                            "k" => $kategorija
]);
                        @endcomponent
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <h2 class="heading text-capitalize mb-sm-5 mb-3"> Gallery </h2>
        <div class="row gallery-grids" id="galerija">
            @foreach($galerija as $g)
                @component('partials.item',[
                "item" => $g
]);
                @endcomponent
                @endforeach
        </div>
        @component('partials.paginacija');
        @endcomponent
    </div>
</div>
@endsection
@section('gallery_script')
@parent
    <script type="text/javascript" src="{{asset('js/gallery.js')}}"></script>
@endsection
