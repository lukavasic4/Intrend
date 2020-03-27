$(document).ready(function () {
    localStorage.clear();
    var idKat =0;
    var value=null;
    getPagination(idKat,value);
     function getPagination(idKat,value){
        $.ajax({
            url : BASE_URL + '/gallery/pagination_page',
            method : "get",
            dataType : "json",
            data:{
                idKat:idKat,
                value:value
            },
            success : function (page) {
                displayPagination(page);
                if(idKat>0){
                    localStorage.setItem("kategorija",idKat);
                }else if(value!=null){
                    localStorage.setItem("value",value);
                }
            }
        });
    }
    function displayPagination(page){
         let paginacija = page;
         let brojPoStrani = 4;
          let sum = Math.ceil(paginacija/brojPoStrani);
          let prikaz = "";
          for(let i = 1; i<= sum;i++){
              prikaz+="<li class='page' data-id='"+ i +"'><a>"+ i +"</a></li>";
          }
          $("#paginacija").html(prikaz);
    }
    $(document).on('click','.page',function (e) {
        e.preventDefault();
        let page = $(this).data('id');
        var kat=localStorage.getItem("kategorija");
        var value=localStorage.getItem("value");
        if(kat==null && (value==null || value==="")){
            $.ajax({
                url : BASE_URL + "/gallery" ,
                method : "GET",
                dataType : "json",
                data: {
                    page : page
                },
                success : function (paginateGallery) {
                    prikaziGaleriju(paginateGallery);
                    getPagination();
                }
            });
        }else if(value!=null){
            $.ajax({
                url : BASE_URL + '/gallery/search',
                method : "GET",
                dataType: "json",
                data : {
                    page:page,
                    value : value
                },
                success : function (search) {
                    prikaziGaleriju(search);
                    getPagination(idKat=0,value);
                }
            })
        }else{
            $.ajax({
                url : BASE_URL + "/gallery/" + kat,
                method : "GET",
                dataType : "json",
                data: {
                    page : page
                },
                success : function (filter) {
                    prikaziGaleriju(filter);
                    getPagination(kat,value="");
                }
            });
        }
    });
    $(".cat").click(function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        getPagination(id,value="");
        $.ajax({
            url : BASE_URL + "/gallery/" + id,
            method : "GET",
            dataType : "json",
            success : function (filter) {
                prikaziGaleriju(filter);
                getPagination(id,value="");
                localStorage.removeItem("value");
            }
        });
    });
    $("#pretraga").keyup(function () {
        let value = $(this).val();
        $.ajax({
            url : BASE_URL + '/gallery/search',
            method : "GET",
            dataType: "json",
            data : {
                value : value
            },
            success : function (search) {
                prikaziGaleriju(search);
                getPagination(idKat=0,value);
                localStorage.removeItem("kategorija");
            }
        })
    });
    function prikaziGaleriju(data) {
        let prikaz = "";
        for(let d of data){
            prikaz+=`<div class="col-lg-3 col-md-4 col-sm-6 ggd baner-top small wow fadeInLeft animated" data-wow-delay=".5s">
    <a href="${BASE_URL + '/single/' + d.gallery_id}" class="b-link-stripe b-animate-go  swipebox">
        <div class="gal-spin-effect vertical ">
            <img src="${BASE_URL + '/images/' + d.image}" alt=" " />
            <div class="gal-text-box">
                <div class="info-gal-con">
                    <h4>${d.title}</h4>
                    <span class="separator"></span>
                    <p>${d.description}</p>
                    <span class="separator"></span>
                </div>
            </div>
        </div>
    </a>
</div>`;
        }
    $("#galerija").html(prikaz);
    }
});
