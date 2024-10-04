var url = "http://localhost/master-php/proyecto-laravel/public/";

window.addEventListener("load", function () {

    $("#buscador").on("submit", function () {
        // e.preventDefault();
        $(this).attr(
            "action",
            url + "/cuentas/" + $("#buscador #search").val()
        ); /*esto al hacer submit añadira la url correcta*/
    });

    function likes() {
        $(".btn-like-icons a i").on("click", function () {
            // console.log($(this))

            if ($(this).hasClass("likes")) {
                console.log("dislike");
                $(this).toggleClass("likes dislikes");

                ajax_like($(this), "dislike");
            } else {
                console.log("like");
                $(this).toggleClass("likes dislikes");
                ajax_like($(this), "like");
            }

            $(this).toggleClass("fa-solid fa-regular");
        });
    }
    likes();
});

//envia una petición para borrar o crear un like dependiendo del parametro opcion
function ajax_like(elemento, opcion) {
    $.ajax({
        //el data id tiene el id de la imagen para borrar o crear el like mediante
        //el LikeController
        url: url + "/" + opcion + "/" + $(elemento).attr("data-id"),
        type: "GET",
        success: function (response) {
            if (response.like) {
                return console.log("Has dado " + opcion + " a la publicación");
            } else {
                return console.log("Error al dar " + opcion);
            }
        },
    });
}
