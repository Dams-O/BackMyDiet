function initPrice(price){

    price = ''+price;
    var data = price.split('.');

    if(data.length > 1){

        if(data[1].length<=1)
            data[1] = data[1]+'0';
        else
            data[1] = data[1].substring(0,2);
    }else{
        data[1] = '00';
    }

    price_text= '<span class="prix-grand">'+data[0]+'</span>'+
                '<span class="prix-euro">€</span>'+
                '<span class="prix-petit">'+data[1]+'</span>'+
                '<span class="prix-ttc">TTC</span>' ;

    $('#tarif-produit').html(price_text);
    $('#tarif-produit-fiscal').html(Math.round(price*50)/100+'€ <span class="ttc-fiscal">TTC</span>');
}

function addToCart(produit, date, opts, adresse, duree, heure, item) {

    if(!opts)
        opts = [];

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/panier/add/' + produit,
        type: "post",
        data: {
            date: date,
            options: opts,
            adresse: adresse,
            duree: duree,
            heure: heure,
            item: item
        },
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('server not responding...');
    });
}
