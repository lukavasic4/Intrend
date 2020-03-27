<form action="{{url('/admin/gallery/update')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">ID</label>
        <input type="text" class="form-control" value="{{$post->gallery_id}}" name="id_gallery" id="id_gallery">
    </div>
    <div class="form-group has-success">
        <label for="cc-name" class="control-label mb-1">Image</label>
        <input name="image_update" id="image_update"  value="{{$post->image}}" type="file" class="form-control" >
        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"></span>
    </div>
    <div class="form-group">
        <label for="cc-number" class="control-label mb-1">Title</label>
        <input type="text" name="title_update"  value="{{$post->title}}" id="title_update" class="form-control "/>
    </div>
    <div class="form-group">
        <label for="cc-number" class="control-label mb-1">Description</label>
        <input type="text" name="description_update"  value="{{$post->description}}" id="description_update" class="form-control "/>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Categories</label>
        </div>
        <div class="contact-fields-w3ls">
            <select name="cat_update" id="cat_update">
                <option value="0">Choose...</option>
                @foreach($cat as $c)
                    <option value="{{$c->categories_id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <button name="btnUpdateGallery" value="Update" id="btnUpdateGallery" type="submit"  class="btn btn-lg btn-info btn-block">
            <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
        </button>
    </div>
</form>
