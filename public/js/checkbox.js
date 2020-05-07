
 let checkbox = document.querySelectorAll('.check');
 let moins = document.querySelectorAll('.addButton.moins');
 let plus = document.querySelectorAll('.addButton.plus');

 $(moins).click(function(clickedMinus){
     let button = clickedMinus.target;
     let inputToLess = button.nextElementSibling;
     let value = inputToLess.value;
     if(value != 0) {
         inputToLess.value = parseInt(value) - 1;   
     }
 });

 $(plus).click(function(clickedPlus){
     let button = clickedPlus.target;
     let inputToPlus = button.previousElementSibling;
     let value = inputToPlus.value;
     if(value < 99) {
         inputToPlus.value = parseInt(value) + 1;   
     }
 });

 $(checkbox).change(function(clicked){
     let theLabel = clicked.currentTarget.labels;
     let theCheckbox = theLabel[0].control;
     let first = theLabel[0].firstChild;
     let last = theLabel[0].lastChild;
     if($(theCheckbox).prop("checked") == true) {
         $(first).hide();
         $(last).show();
     } else {
         $(last).hide();
         $(first).show();
     }
 });
