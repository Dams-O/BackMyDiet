$(function () {
    $(".input-nombre").each(function () {
        initNombreAffichage($(this))
    });

    $(".bouton-number").on("click", function () {

        var boutonNumber = $(this);
        var min = boutonNumber.parent().find(".input-nombre").data("min");
        var max = boutonNumber.parent().find(".input-nombre").data("max");
        var oldValue = boutonNumber.parent().find(".input-nombre").val();

        if (boutonNumber.text() == "+") {
            if (oldValue < max) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                newVal = max;
            }
        } else {
            if (oldValue > min) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = min;
            }
        }
        boutonNumber.parent().find(".input-nombre").val(Number(newVal));
        initNombreAffichage(boutonNumber.parent().find(".input-nombre"))

    });
});

function initNombreAffichage(nombreInput) {

    var nombre = nombreInput.val();
    var nomType = nombreInput.data("type");
    nombreInput.parent().find(".input-nombre-affichage").val(nombre + (nomType != 'H' ? " " : "") + nomType);

}