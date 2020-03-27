<tr>
    <td>{{$user->user_id}}</td>
    <td>{{$user->first_name}}</td>
    <td>{{$user->last_name}}</td>
    <td >{{$user->email}}</td>
    <td >{{$user->password}}</td>
    <td>{{$user->uloga}}</td>
    <td>
        <form action="{{route("update_user",['id' => $user->user_id])}}" method="get">
            <button type="submit" class="UpdateUser btn btn-outline-dark" name="UpdateUser" data-id="{{$user->user_id}}"><i class="zmdi zmdi-edit"></i></button>
        </form>
    </td>
    <td>
{{--        <form action="{{route("users.delete",['id' => $user->user_id])}}" method="delete">--}}
        <button type="submit" class="DeleteUser btn btn-outline-dark" name="DeleteU" data-id="{{$user->user_id}}" ><i class="zmdi zmdi-delete"></i></button>
{{--        </form>--}}
    </td>
</tr>
