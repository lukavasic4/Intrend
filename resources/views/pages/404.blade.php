@extends('layouts.template')
@section('header')
    @parent
    @include('fixed.header')
    @endsection
@section('sredina')
<section class="error py-5">
    <div class="container py-3">
        <h3 class="heading text-capitalize mb-sm-5 mb-4"> Error Page </h3>
        <div class="error_content">
            <div class="content_left">
                <h2 class="font-weight-bold">404</h2>
                <h5 class="text-capitalize">looks like that page doesn't exist</h5>
                <p class="mt-3">Quisque sit amet odio sit amet nulla finibus commodo. Sed dictum accumsan vestibulum. Mauris ac sem quis augue blandit venenatis non eu est. </p>
                <div class="back_to_index mt-4">
                    <a href="{{url('/home')}}" class="text-capitalize">Back to home</a>
                </div>
                <p class="text-capitalize my-3">Please check the URL and try again</p>
                <div class="b-search">
                    <form action="#" method="post">
                        <input type="text" name="search" placeholder="Enter your keywords here..." required="">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
  @endsection

