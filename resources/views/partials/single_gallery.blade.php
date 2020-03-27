<article class="blog-x row">
    <div class="blog_info">
        <div class="blog-img">
            <a>
                <img src="{{url("/images")}}/{{$gallery->image}}" alt="" class="img-fluid" />
            </a>
        </div>
        <h5>
            <a href="#">{{$gallery->title}}</a>
        </h5>
        <p>{{$gallery->description}}</p>
    </div>
    <div class="clearfix"></div>
</article>
