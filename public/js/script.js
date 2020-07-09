$(document).ready( function () {
    $('#myTable').DataTable();
} );

$(document).ready(function() {
    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});



        // vérifier si l'étudiant est bousier et logé => on lui donne une chambre et un montant
        // s'il est boursier seulement et pas logé => pas de chambre mais un montant
        // sinon on affiche enregistre l'adresse de l'étudiant