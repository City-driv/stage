let Produits = [];
// let CopyProduit = [];

document.querySelector("select[name='Article']").addEventListener("change", () => {
let pr = JSON.parse(document.querySelector("select[name='Article']").value);
let idp = pr.id;
pr['QteCmd'] = 1;
pr['QteRecue'] = 0;
// console.log(pr);
// CopyProduit.push(pr);
if (Produits.length==0) {
    Produits.push(pr);
}
for (let index = 0; index < Produits.length; index++) {
    if (Produits[index].id !== pr.id) {
        Produits.push(pr);
    }
}
// console.log(Produits);
chargerInTable();
});

function chargerInTable() {
document.querySelector("table tbody").innerHTML = "";
for (let index = 0; index < Produits.length; index++) {
// console.log(Produits[index].description);
document.querySelector("table tbody").innerHTML +=`
    <tr>
        <td>${Produits[index].description}</td>
        <td><input type='number'onchange='ModifierQteC(this.value,${Produits[index].id})' style="width:70px;" min='0' value="${Produits[index].QteCmd}" /></td>
        <td><input type='number' onchange='ModifierQteR(this.value,${Produits[index].id})' style="width:70px;" min='0' value="${Produits[index].QteRecue}" /></td>
        <td><input type='number' onchange='ModifierPrix(this.value,${Produits[index].id})' style="width:70px;" min='0' value="${Produits[index].price}" /></td>
        <td><button onclick=suprimer(${Produits[index].id}) style='background-color:white;border:0;'><i style='color:red;' class="h3 fas fa-trash-alt"></i></button></td>
    </tr>
`;
}
}

//Modifier QteCmd
function ModifierQteC(val,IdM){
    for (let index = 0; index < Produits.length; index++)
      if(Produits[index].id==IdM)
        Produits[index].QteCmd=val;
}
//Modifier Qte recue
function ModifierQteR(val,IdM){
    for (let index = 0; index < Produits.length; index++)
       if(Produits[index].id==IdM)
           Produits[index].QteRecue=val ;    
}
//Modifier prix
function ModifierPrix(val,IdM){
    for (let index = 0; index < Produits.length; index++)
      if(Produits[index].id==IdM)
        Produits[index].price=val
}
//suprimmer 
function suprimer(idS){
    // event.preventDefault()
    for (let index = 0; index < Produits.length; index++)
        if(Produits[index].id==idS)
          Produits.splice(index, 1); 
    chargerInTable()
}
$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

$('#Fachat').on('submit', function(e) {
    e.preventDefault();
    let fr = document.querySelector("select[name='fournisseur']").value;
    let num = document.getElementById('num').value;
    let date = document.getElementById('date').value;
    let total = document.getElementById('total').value;
    let remiseG = document.getElementById('remise').value;
    let mode_paiement = document.getElementById('modePaiement').value;
    let mode_livraison = document.getElementById('modeLiv').value;
    let type = document.getElementById('type').value;
    let piece_jointe = $('#pj')[0].files[0];
  
    // if (fr=='' ||num=='' ||date=='' ||total=='' ||remiseG=='' ||mode_livraison=='' || mode_paiement=='' || type=='' || piece_jointe=='' || Produits.length==0 ) {
    //   swal("Alert!", "Tout les champs sont obligatoires !", "error");
    // }
    // console.log(piece_jointe);
  
    var url = $(this).attr('action');
    var data = {
      Produits: Produits,
      fournisseur_id: fr,
      numero: num,
      date: date,
      total: total,
      remiseGlobal: remiseG,
      mode_paiement: mode_paiement,
      mode_livraison: mode_livraison,
      type: type
    };
  
    if (Produits.length > 0 || Produits.length==0) {
      var fd = new FormData();
      // Append data 
      if (piece_jointe) {
        fd.append('file', piece_jointe);
        data['piece_jointe'] = piece_jointe;
      }
      fd.append('fournisseur_id', fr);
      fd.append('numero', num);
      fd.append('date', date);
      fd.append('total', total);
      if (remiseG) {
        fd.append('remiseGlobal', remiseG);
      }
      if (mode_paiement) {
        fd.append('mode_paiement', mode_paiement);
      }
      if (mode_livraison) {
        fd.append('mode_livraison', mode_livraison);
      }
      fd.append('type', type);
      if (Produits) {
        fd.append('Produits', JSON.stringify(Produits));
      }
  
      $.ajax({
        type: 'POST',
        url: url,
        data: fd,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function(res) {
          swal("Achat Ajouter!", "Votre achat bien ajoutée !", "success").then(function() {
            window.location.href = '/achat'; 
        });
          
        //   console.log( JSON.parse(res.msg));
          // console.log(res.msg);
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
      // console.log(data);
    }
  });