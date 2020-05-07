let rememberCheck = document.getElementById('remember');
let label = document.getElementsByTagName('label')[0];

$(rememberCheck).change(function(){
    let first = label.firstChild;
    let last = label.lastChild;
    if(rememberCheck.checked == true) {
        $(first).hide();
        $(last).show();
    }
    if(rememberCheck.checked == false){
        $(last).hide();
        $(first).show();
    }
});



