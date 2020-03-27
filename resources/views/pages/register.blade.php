@extends('layouts.template')
@section('title')
    @parent
    Register
@endsection
@section('header')
    @parent
    @include('fixed.header')
@endsection
@section('sredina')
<section class="contact py-5">
    <div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4">Register</h2>
        <div class="mail_grid_w3l">
            @isset($errors)
                @foreach($errors->all() as $error)
                    {{ $error }}.<br>
                @endforeach
            @endisset
            <form action="{{url('/register')}}" method="post" onsubmit="return checkRegister()">
                @csrf
                <div class="row">
                    <div class="col-md-6 contact_left_grid" data-aos="fade-right">
                        <div class="contact-fields-w3ls">
                            <input type="text" name="first_name" id="first_name" placeholder="First name" required="">
                        </div>
                        <div class="contact-fields-w3ls">
                            <input type="text" name="last_name" id="last_name" placeholder="Last name" required="">
                        </div>
                        <div class="contact-fields-w3ls">
                            <input type="email" name="email" id="email" placeholder="Email" required="">
                        </div>
                        <div class="contact-fields-w3ls">
                            <input type="password" name="password" id="password" placeholder="Passwd" required="">
                        </div>
                        <div class="contact-fields-w3ls">
                            <input type="submit" value="Submit" name="btnRegister" id="btnRegister">
                        </div>
                    </div>
                    <div class="col-md-4 contact_right_grid">
                        <div class="col-md-6" data-aos="fade-left">
                            <a href="{{url('/login')}}" class="btn-login">Log in</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
{{--@include('fixed.info')--}}
@endsection
@section('javascript')
    @parent
<script type="text/javascript" src="{{asset('js/register.js')}}"></script>
    @endsection

