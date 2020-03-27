<div class="media mb-3">
    <div class="media-body">
        <h5 class="mt-0">{{$comment->first_name}} {{$comment->last_name}}</h5>
        <p>{{$comment->commentText}}</p>
        <p> {{date('d-m-Y', strtotime($comment->commentDate))}}</p>
    </div>
</div>
