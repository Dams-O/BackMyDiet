$(document).ready(function(){
    resizeTabs();
    $(window).resize(function(){
        resizeTabs();
    })
});

function resizeTabs(){
    if($(window).width() < 990){
        $('.titre-prestation').attr("colspan", "3");
        $('.col-sous-prestation').attr("colspan", "3");
        $('.col-sous-sous-prestation').attr("colspan", "3");
        $('.separateur-sous-prestation td').attr("colspan", "6");
    }else{
        $('.titre-prestation').attr("colspan", "2");        
        $('.col-sous-prestation').removeAttr("colspan");
        $('.col-sous-sous-prestation').removeAttr("colspan");
    }
    
}