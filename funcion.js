$(document).ready(function() {
    $("#btnEliminar").click(function() {
        var id = $(this).data("id");
        alert("ID: " + id);
    });
});