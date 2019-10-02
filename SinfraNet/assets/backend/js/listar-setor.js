function search_setor() {

    var selecionado = $("#selecione option:selected").val();
    // Declare variables 
    var input_setor, filter, table, tr, td, i;

    input_setor = document.getElementById("filtro");
    filter = input_setor.value.toUpperCase();
    table = document.getElementById("tableSetor");
    tr = table.getElementsByTagName("tr");

    if (selecionado === "setor") {
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
    } else if (selecionado === "andar") {
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

}


