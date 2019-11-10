var modal = document.getElementById("Modal");
var button = document.getElementById("ModalButton");
var span = document.getElementsByClassName("close")[0];
var search = document.getElementsByClassName("search")[0];


button.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function inputSearch() {
  var input = document.getElementById("Search");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("Table");
  var tr = table.getElementsByTagName("tr");
  var td, i, txtValue;

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
