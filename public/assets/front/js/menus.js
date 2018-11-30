var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
});

$(document).ready(function () {
    

    $("#input-search").click(function () {
        if($( window ).width() > 767){
            openSearchList();
        }
    });


    $('#c-button--slide-left').click(function (e) {
        e.preventDefault;
        slideLeft.open();
    });

    $('#form_tarif_bandeau').on('submit', function (e) {

        if($('#form__email').val() == ''){
            $('#form__email').addClass('form-tarif-error');
            return false;
        }else if(!(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($('#form__email').val()))){
            $('#form__email').addClass('form-tarif-error');
            return false;
        }

        if (!(/^([0-9]{5})$/.test($('#cp').val()))) {
            codeAddressB();
        }else{
            return true;
        }

        return false;

    });

    google.maps.event.addDomListener(window, 'load', function () {
        initializeAutocompleteB('form_cp_bandeau');
    });
});

function openSearchList(){
    if ($("#search-slide-menu:first").is(":hidden")) {
        $("#search-slide-menu").slideDown("slow");
        $("#c-mask").show();
        $("#c-mask").addClass('fadeIn');
        $("#c-mask").addClass('is-active');
        $("#c-mask").removeClass('fadeOut');
        $("#c-mask").click(function () {
            $("#search-slide-menu").slideUp("slow");
            $("#c-mask").addClass('fadeOut');
            $("#c-mask").removeClass('is-active');
            $("#c-mask").removeClass('fadeIn');
            $("#c-mask").hide();
        })
    } else {
        
        $("#search-slide-menu").slideUp("slow");
        $("#c-mask").addClass('fadeOut');
        $("#c-mask").removeClass('is-active');
        $("#c-mask").removeClass('fadeIn');
        $("#c-mask").hide();
    }
}

function search() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('input-search');
    filter = input.value.toUpperCase();
    ul = document.getElementById("list-produit");
    li = ul.getElementsByTagName('a');

    // Loop through all list items, and hide those who don't match the search query
    var j = 0;
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("p")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && j <= 5) {
            li[i].style.display = "";
            j++;
        } else {
            li[i].style.display = "none";
        }

    }
}

function searchMobile() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('input-search-mobile');
    filter = input.value.toUpperCase();
    ul = document.getElementById("list-produit-mobile");
    li = ul.getElementsByTagName('a');

   

    // Loop through all list items, and hide those who don't match the search query
    var j = 0;
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("p")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && j <= 5) {
            li[i].style.display = "";
            j++;
        } else {
            li[i].style.display = "none";
        }

    }
}

function initializeAutocompleteB(id) {
    var element = document.getElementById(id);

    if (element) {
        geocoder = new google.maps.Geocoder();
        var autocomplete = new google.maps.places.Autocomplete(element, {types: ['geocode'], componentRestrictions: {country: 'fr'}});
        google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChangedB);
    }
}

function onPlaceChangedB() {
    var place = this.getPlace();

    for (var i in place.address_components) {
        var component = place.address_components[i];
        for (var j in component.types) {  // Some types are ["country", "political"]
            var type_element = document.getElementById(component.types[j]);
            if (type_element) {
                type_element.value = component.long_name;
            }
        }
    }

    $.ajax({
        url: 'https://maps.googleapis.com/maps/api/geocode/json?place_id=' + place.place_id + '&key=AIzaSyD8Wvb3Fzqx0HTshChYwsD3mbQn1bVvO1o',
        method: 'POST',
        dataType: 'json'
    }).done(function (data) {
        data.results.forEach(function (adresse) {
            adresse.address_components.forEach(function (type) {

                if (type.types[0] == 'postal_code')
                    $('#cp_bandeau').val(type.long_name);
                if (type.types[0] == 'neighborhood')
                    $('#ville_bandeau').val(type.long_name);
                else if (type.types[0] == 'locality')
                $('#ville_bandeau').val(type.long_name);
                if (type.types[0] == 'street_number')
                $('#adresse_bandeau').val(type.long_name);
                if (type.types[0] == 'route')
                $('#adresse_bandeau').val($('#adresse_bandeau').val() +' '+type.long_name);

            });
        })
    }).fail(function (error) {
    });
}

function codeAddressB() {

    geocoder = new google.maps.Geocoder();

    var address = document.getElementById("form_cp").value;

    if ((/^([0-9]{5})$/.test(address))) {
    document.getElementById('cp_bandeau').value = address;
    return true;
    }else if(address != ''){
        geocoder.geocode({'address': address + ' France'}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var coords = results[0].geometry.location;
                codeLatLngB(coords.lat() + ',' + coords.lng());
            }else{
                return false;
            }
        });
    }else{
        $('#form_cp_bandeau').addClass('form-tarif-error');
        return false;
    }
}

function codeLatLngB(input) {
    var latlngStr = input.split(",", 2);
    var lat = parseFloat(latlngStr[0]);
    var lng = parseFloat(latlngStr[1]);
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                var elt = results[0].address_components;
                for (i in elt) {
                    if (elt[i].types[0] == 'postal_code')
                    document.getElementById('cp_bandeau').value = elt[i].long_name;
                    if (elt[i].types[0] == 'locality')
                    document.getElementById('ville_bandeau').value = elt[i].long_name;

                }

            }
            $('#form_tarif_bandeau').submit();

        } else {
            return false;
        // alert("Geocoder failed due to: " + status);
        }
    });
}