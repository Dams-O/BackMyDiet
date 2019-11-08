function search() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('input-search');
    filter = input.value.toUpperCase();
    ul = document.getElementById("list-nom");
    li = ul.getElementsByTagName('tr');
  
    // Loop through all list items, and hide those who don't match the search query
    var j = 0;
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && j <= 5) {
            li[i].style.display = "";
            j++;
        } else {
            li[i].style.display = "none";
        }
  
    }
}

