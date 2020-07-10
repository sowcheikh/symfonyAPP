$(document).ready( function () {
    $('#myTable').DataTable({
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
            } );
        });


$(document).ready(function() {
    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});
//scroll
var x = 0;
$(document).ready(function () {
  $("#result").scroll(function () {
    $("span").text((x += 1));
  });
});


        // vérifier si l'étudiant est bousier et logé => on lui donne une chambre et un montant
        // s'il est boursier seulement et pas logé => pas de chambre mais un montant
        // sinon on affiche enregistre l'adresse de l'étudiant