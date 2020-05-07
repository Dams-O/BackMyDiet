let labelsToClick = document.getElementsByTagName('label');
let radios = document.querySelectorAll('.hidden-radio');

$(labelsToClick).click(function action(clicked) {
    radios.forEach(element => {
        $(element.labels[0].firstChild).show();
        $(element.labels[0].lastChild).hide();
    });
    let theLabel = clicked.currentTarget;
    $(theLabel.firstChild).hide();
    $(theLabel.lastChild).show();
})
