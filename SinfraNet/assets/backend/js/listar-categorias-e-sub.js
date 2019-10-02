function search_cat() {

    // Declare variables 
    var input_setor, filter, table, tr, td, i;

    input_setor = document.getElementById("filtro-aniver");
    filter = input_setor.value.toUpperCase();
    table = document.getElementById("tableCat-sub");
    tr = table.getElementsByTagName("tr");


    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}


