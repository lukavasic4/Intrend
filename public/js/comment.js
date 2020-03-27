$(document).ready(function () {
    $("#sendComment").click(function (e) {
        e.preventDefault();
        let postId = $("#post_id").val();
        let textComment = $("#textComment").val();
        $.ajax({
            url : BASE_URL + "/postComment/" + postId,
            method : "GET",
            dataType : "json",
            data : {
                _token : $("input[name='_token']").val(),
                textComment : textComment
            },
            success : function (comment) {
                prikaziKomentare(comment);
            },
            error : function (err) {
            }
        })
    });
    function prikaziKomentare(comment) {
        let prikaz = "";
        for(let c of comment){
            prikaz+= `
                <div class="media mb-3">
    <div class="media-body">
        <h5 class="mt-0">${c.first_name} ${c.last_name}</h5>
        <p>${c.commentText}</p>
        <p> ${c.commentDate}</p>
    </div>
</div>`;
        }
    $("#komentari").html(prikaz);
    }
});
