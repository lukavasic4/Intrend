<form action="{{url('/admin/users/update')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">ID</label>
        <input type="text" class="form-control" value="{{$data->user_id}}" name="id_update" id="id_update">
    </div>
    <div class="form-group has-success">
        <label for="cc-name" class="control-label mb-1">First name</label>
        <input name="first_name_update" id="first_name_update" value="{{$data->first_name}}" type="text" class="form-control" >
        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"></span>
    </div>
    <div class="form-group">
        <label for="cc-number" class="control-label mb-1">Last name</label>
        <input type="text" name="last_name_update" id="last_name_update" value="{{$data->last_name}}" class="form-control "/>
    </div>
    <div class="form-group">
        <label for="cc-number" class="control-label mb-1">Email</label>
        <input type="email" name="email_update" id="email_update" value="{{$data->email}}" class="form-control "/>
    </div>
    <div class="form-group">
        <label for="cc-number" class="control-label mb-1">Password</label>
        <input type="text" name="password_update" id="password_update" value="{{$data->password}}" class="form-control "/>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Roles</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="list_update" id="list_update">
                <option value="0">Choose...</option>
                @foreach($roles as $r)
                    <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <button name="btnUpdateUser" value="Update" id="btnUpdateUser" type="submit"  class="btn btn-lg btn-info btn-block">
            <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
        </button>
    </div>
</form>
