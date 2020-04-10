let theSpinner = document.querySelectorAll(".load")
let theButton = document.querySelector(".submit")
let buttonText = document.querySelector(".buttonText")
let theInputs = document.querySelectorAll('.input')
let alertMsg = document.querySelectorAll('.invalid')

$(theSpinner).hide();
$(alertMsg).hide();

theButton.addEventListener('click', function(ev){
    let theForm = document.querySelector(".form")
    ev.preventDefault();
    if (theForm.checkValidity()) {
        $(buttonText).hide();
        $(theSpinner).show();
        theForm.submit();
    }
});

function checkMail(mail) {
    mail = mail.split("");
}


