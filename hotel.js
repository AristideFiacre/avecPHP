// Validation du formulaire d'ajout d'hôtel
var form = document.getElementById("ajouter_hotel");
form.addEventListener("submit", function(event) {
    // Vérification du nom de l'hôtel
    var name_hotel = document.getElementById("name_hotel").value;
    var regex_name_hotel = /^[a-zA-Z0-9\s]+$/;
    if (!regex_name_hotel.test(name_hotel)) {
        document.getElementById("error_name_hotel").innerHTML = "Le nom de l'hôtel doit être alphanumérique.";
        event.preventDefault();
    }

    // Vérification de l'adresse de l'hôtel
    var adress_hotel = document.getElementById("adress_hotel").value;
    var regex_adresse_hotel = /^[a-zA-Z0-9\s]+$/;
    if (!regex_adresse_hotel.test(adress_hotel)) {
        document.getElementById("error_adresse_hotel").innerHTML = "L'adresse de l'hôtel doit être alphanumérique.";
        event.preventDefault();
    }

    // Vérification du téléphone de l'hôtel
    var telephone_hotel = document.getElementById("telephone_hotel").value;
    var regex_telephone_hotel = /^\d+$/;
    if (!regex_telephone_hotel.test(telephone_hotel)) {
        document.getElementById("error_telephone_hotel").innerHTML = "Le numéro de téléphone de l'hôtel doit être numérique.";
        event.preventDefault();
    }
});