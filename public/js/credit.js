
function Ajoute(id){
    document.querySelector(".Ajouter").style.transform="scale(1)";
    document.getElementById('Cid').value=id;
}
 $('.annule').click(()=>{
    document.querySelector(".Ajouter").style.transform="scale(0)"  ;
    document.querySelector(".Liste").style.transform="scale(0)";
    document.querySelector(".Modifier").style.transform="scale(0)";
    document.querySelector(".ModifierPay").style.transform = "scale(0)";

})
document.getElementById('btnAjout').addEventListener('click',function(){
    var montant=$('#mnt').val();
    var date=$('#date_mnt').val();
    var ob=$('#observation').val();
    var mdp=$('#mdp').val();
    var Id=$('#Cid').val();
    if (montant!='' && date !="") {
        $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
          })
        
        $.ajax({
          url: '/ligneCredit',
          type: 'POST',
          data : {credit_id:Id,date:date,montant:montant,mode_paiement:mdp,observation:ob},
          dataType:'json',
          success: function(response) {
              // Afficher les factures des client correspondants
           alert('paiement bien ajouter');
           setTimeout( location.reload(),300 );

          },
          error: function() {
              alert('Une erreur s\'est produite lors de la récupération des articles.');
          }
      });
    }else{
        alert('vide');
    }
});

function imprimer(id){
    window.open('/recu/'+id,'_blank');
}

function ModifierLignePay(id){
    $.ajax({
        url: '/modifierLigne/' + id ,
        type: 'GET',
        success: function(response) {
            // Afficher ligne payement
            var result = response.lignePay;
               $('#Mmnt').val(result.montant);
               $('#Mdate_mnt').val(result.date);
               $('#Mmdp').val(result.mode_paiement);
               $('#Mobservation').val(result.observation);
               $('#modifierPay').attr('action','/modifierLigneP/'+id);
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la récupération de vtrfit.');
        }
    });
    document.querySelector(".ModifierPay").style.transform = "scale(1)";
    document.querySelector(".Liste").style.transform="scale(0)";

}

function Modifier(id) {
    var cid = id;
    var pm = $('#pm');
    var pr = $('#pr');
    var datec = $('#date');
    var ref = $('#ref');
    var type = $('#type');
    var motif = $('#motif');
    var ob = $('#ob');
    $.ajax({
        url: '/credit/' + cid + '/edit',
        type: 'GET',
        success: function(response) {
            // Afficher les factures des client correspondants
            var result = response.credit;
            // alert('success');
              //  console.log(response.factures);
                pm.val(result.p_marchandise);
                pr.val(result.p_reste);
                datec.val(result.date_credit);
                ref.val(result.ref);
                type.val(result.type);
                motif.val(result.motif);
                ob.val(result.observation);
                $('#cform').attr('action','/credit/'+cid);
                // alert('credit n\'est plus disponible');
            
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la récupération de vtrfit.');
        }
    });
    document.querySelector(".Modifier").style.transform = "scale(1)";
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('#tbt tr');

    searchInput.addEventListener('keyup', function(e) {
        const x = e.target.value.toLowerCase();
        rows.forEach(el => {
            const cellContent = el.querySelector('.cl').textContent.toLowerCase();
            el.style.display = cellContent.includes(x) ? '' : 'none';
        });
    });
});
