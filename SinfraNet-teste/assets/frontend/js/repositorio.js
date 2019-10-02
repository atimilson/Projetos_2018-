function searchDoc() {

    // Declare variables 
    var input_doc, filter, table, tr, td, i;

    input_doc = document.getElementById("filtro-doc");
    filter = input_doc.value.toUpperCase();
    table = document.getElementById("repositorio");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}
