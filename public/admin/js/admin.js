$(document).ready(function () {
   $(".DeleteUser").click(function (e) {
        e.preventDefault();
       let id = $(this).data('id');
        $.ajax({
            url : BASE_URL + "/admin/users/" + id + "/delete",
            method : "GET",
            dataType : "Json",
            success : function (users) {
                showUsers(users);
            },
            error : function (err) {
                console.log(err);
            }
        })
   });
    $(".DeleteGallery").click(function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url : BASE_URL + "/admin/gallery/" + id + '/delete',
            method : "GET",
            dataType : "Json",
            success : function (gallery) {
                showGallery(gallery);
            },
            error : function (err) {
                console.log(err);
            }
        })
    });
        $(document).on('change','#filterDate',function (e) {
            e.preventDefault();
            let vrednost = $(this).val();
                $.ajax({
                    url : BASE_URL + "/admin/filterDate/" + vrednost,
                    method : "get",
                    dataType : "json",
                    success : function (podaci) {
                        showActions(podaci);
                    }
                })
        });
     function showActions(podaci) {
         let prikaz ="";
         for(let p of podaci){
            prikaz+=` <tr>
                                        <td>${p.date_action}</td>
                                        <td>${p.action}</td>
                                    </tr>`;
         }
         $("#akcija").html(prikaz);
     }
    function showGallery(gallery) {
        let ispis = "";
        for(let g of gallery){
            ispis+=`<tr>
    <td>${g.gallery_id}</td>
    <td>${g.image}</td>
    <td>${g.title}</td>
    <td>${g.description}</td>
    <td >${g.ime}</td>
    <td>
        <form action="{{route("gallery_update",['id' => ${g.gallery_id}])}}" method="post">
            <button type="submit" class="UpdateGallery btn btn-outline-dark" name="UpdateG" data-id="${g.gallery_id}"><i class="zmdi zmdi-edit"></i></button>
        </form>
    </td>
    <td>
        <button type="submit" class="DeleteGallery btn btn-outline-dark" name="DeleteG" data-id="${g.gallery_id}"><i class="zmdi zmdi-delete"></i></button>
    </td>
</tr>`;
        }
        $("#galerija").html(ispis);
    }
    function showUsers(users) {
        let prikaz = "";
        for(let u of users){
            prikaz+=`<tr>
    <td>${u.user_id}</td>
    <td>${u.first_name}</td>
    <td>${u.last_name}</td>
    <td >${u.email}</td>
    <td>${u.password}</td>
    <td>${u.uloga}</td>
    <td>
        <form action="{{route("update_user",['id' => ${u.user_id}])}}" method="post">
            <button type="submit"  class="UpdateUser btn btn-outline-dark" name="UpdateUser" data-id="${u.user_id}"><i class="zmdi zmdi-edit"></i></button>
            </form>
    </td>
    <td>
       <button type="submit" class="DeleteUser btn btn-outline-dark" name="DeleteU" data-id="${u.user_id}"><i class="zmdi zmdi-delete"></i></button>
    </td>
</tr>`;
        }
        $("#korisnici").html(prikaz);
    }
});
