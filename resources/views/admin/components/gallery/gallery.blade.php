
<tr>
    <td>{{$ag->gallery_id}}</td>
    <td><img class="slike" src="{{asset('images/'.$ag->image)}}"/></td>
    <td>{{$ag->title}}</td>
    <td >{{$ag->description}}</td>
    <td >{{$ag->ime}}</td>
    <td>
        <form action="{{route("gallery_update",['id' => $ag->gallery_id])}}">
            <button type="submit" class="UpdateGallery btn btn-outline-dark" name="UpdateG" data-id="{{$ag->gallery_id}}"> <i class="zmdi zmdi-edit"></i></button>
        </form>
    </td>
    <td>
        <button type="submit" class="DeleteGallery btn btn-outline-dark" name="DeleteG" data-id="{{$ag->gallery_id}}"><i class="zmdi zmdi-delete"></i></button>
    </td>
</tr>
