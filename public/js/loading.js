let theSpinner = document.querySelectorAll(".load")
let theButton = document.querySelector(".submit")
let buttonText = document.querySelector(".buttonText")
let theInputs = document.querySelectorAll('.input')

$(theSpinner).hide();

theButton.addEventListener('click', function(ev){
    let theForm = document.querySelector(".form")
    ev.preventDefault();
    if (theForm.checkValidity()) {
        $(buttonText).hide();
        $(theSpinner).show();
        theForm.submit();
    } 
});


