$(document).ready( function () {
    $('#articles_table').DataTable({
        language: {
            lengthMenu: 'Afficher _MENU_ enregistrements par page',
            zeroRecords: 'Aucun enregistrement disponible - désolé',
            info: 'Afficher la page _PAGE_ de _PAGES_',
            infoEmpty: 'Aucun enregistrement disponible',
            infoFiltered: '(filtré à partir de _MAX_ enregistrements totaux)',
            search: "Recherche:",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent",
            },},
    });
} );

//aficher ajoute
function Ajoute(){
    document.querySelector(".AjouteClient").style.transform="scale(1)"
  }

//annuler
function annuler(){
    document.querySelector(".AjouteClient").style.transform="scale(0)"
  }