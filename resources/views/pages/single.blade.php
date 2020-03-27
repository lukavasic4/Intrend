@extends('layouts.template')
@section('title')
    @parent
    Single
@endsection
@section('header')
    @parent
    @include('fixed.header')
@endsection
@section('sredina')
    <section class="banner-bottom-w3ls-agileinfo py-5">
        <!--/blog-->
        <div class="container py-md-3">
            <h2 class="heading text-capitalize mb-sm-5 mb-3"> Single Page </h2>
            <div class="row inner-sec-wthree-agileits">
                <div class="col-lg-8 blog-sp">
                    @foreach($gallery as $g)
                        @component("partials.single_gallery",[
                        "gallery" => $g
]);
                        @endcomponent
                    @endforeach

                    <div class="comment-top" id="komentari">
                        <h4>Comments</h4>
                        @foreach($comment as $c)
                            @component("partials.comment",[
                            "comment" => $c
]);
                            @endcomponent
                        @endforeach
                    </div>
                    <div class="comment-top">
                        <h4>Leave a Comment</h4>
                        <div class="comment-bottom">
                            @if(session()->has('warning'))
                                {{ session('warning') }}
                            @endif
                            <form action="#" method="post">
                                @csrf
                                <input type="hidden" name="post_id" id="post_id" value="{{$g->gallery_id}}">
                                <textarea name="textComment" id="textComment"  placeholder="Message..." required=""></textarea>
                                <input class="form-control" id="sendComment" name="sendComment" type="submit" value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @endsection
    @section('appendScript')
        @parent
        <script src="{{asset('js/comment.js')}}"></script>
        @endsection
