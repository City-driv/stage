    

function Ajoute(id){
    document.querySelector(".Ajouter").style.transform="scale(1)";
    document.getElementById('Cid').value=id;
}
 $('.annule').click(()=>{
    document.querySelector(".Ajouter").style.transform="scale(0)"  ;
    document.querySelector(".Liste").style.transform="scale(0)";
    document.querySelector(".Modifier").style.transform="scale(0)";

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

function Liste(id){
    document.querySelector(".LPay").innerHTML=`
    <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Montant</div>
    <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Date</div>
    <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">reçu</div>
    <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Observation</div>
    <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Etat</div>
    `;
    document.querySelector(".Liste").style.transform="scale(1)";
    $.ajax({
        url: '/getPayments/' + id,
        type: 'GET',
        success: function(response) {
            // Afficher les factures des client correspondants
            var result = response.payments;
            alert('success');
            if (result.length > 0) {
              //  console.log(response.factures);
                $.each(result, function(index, lg) {
                    document.querySelector(".LPay").innerHTML+=`
                    <div class="col-3 text-center bg-dark text-white pt-1 pb-1 h5" style="border:1px solid white;">${lg.montant} DH</div>
                    <div class="col-2 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">${lg.date}</div>
                    <div class="col-2 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;"><i onclick='imprimer(${lg.id})' style='cursor: pointer;background-color: #c7cdd5;border-radius: 5px;border: 1px solid black;color: black;padding: 10px;' class="fas fa-print"> Imprimer</i></div>
                    <div class="col-3 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">${lg.observation}</div>
                    <div class="col-2 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                    style="background: white;color: black;border: 1px solid white;border-radius: 0;"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cog"></i> action</button>
                    <div class="dropdown-menu" style="text-align: left;">
                    <a style="
                     text-decoration: none;
                     color: white;
                     background: #0f950f;
                     padding: 4px;
                     border-radius: 3px;
                     border: 1px solid #9a9797;" href="modifPaiement.php?id=${lg.id}"><i class="fas fa-edit"></i>Modifier</a>
                     <br/>
                     <form action="#"  method="post" onSubmit="return confirm('confirmation suppression')">
                    <button style="    color: white;
                     background: #ff4949;
                     border: 1px solid #8f8f8f;
                     border-radius: 5px;" type="submit" name="suprimerPaiment" value="${lg.id}"><i class="fas fa-trash-alt"></i>Supprimer</button>
                     </form>
                    </div>
                    
                    `;
                  });
                
            } else {
                document.querySelector(".LPay").innerHTML+='Aucun payement correspondant trouvé.';
            }
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la récupération des paiements.');
        }
    });
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
        console.log(x);
        rows.forEach(el => {
            const cellContent = el.querySelector('.cl').textContent.toLowerCase();
            el.style.display = cellContent.includes(x) ? '' : 'none';
        });
    });
});
