alert('index');

// //aficher Modifier
// // let Facture;
// // function Md(id){
// // event.preventDefault()
// //  document.querySelector(".modifier").style='transform:scale(1)';
// //     $.ajax({
// //     url: 'achat/' + id + '/edit',
// //     type: 'GET',
// //     success: function(response) {
// //         // Afficher les factures des client correspondants
// //         var result = response.facture;
// //         // alert('success');
// //         document.querySelector(".Modifier").style.transform = "scale(1)";
// //            console.log(response.facture);
// //           Facture={
// //             "idFcature"     : result.id,
// //             "Numero"        : result.numero,
// //             "dateFacture"   : result.date,
// //             "total"         : result.total,
// //             "modeLivraison" : result.mode_livraison,
// //             "modePaiement"  : result.mode_paiement,
// //             "remiseglobal"  : result.remiseGlobal,
// //             "fournisseur"   : result.fournisseur_id,
// //             "type"          : result.type,
// //             "idF"          : result.fournisseur_id,
// //               }
// //             // $('#cform').attr('action','/credit/'+cid);
// //             // alert('credit n\'est plus disponible');
// //             // chargerForm()
        
// //     },
// //     error: function() {
// //         alert('Une erreur s\'est produite lors de la récupération de vtrfit.');
// //     }
// // });
// // }

// let Facture; // Declare the Facture variable outside the function

// function Md(achat) {
//   event.preventDefault();
//   document.querySelector(".modifier").style = 'transform:scale(1)';
//   $.ajax({
//     url: '/achat/' + achat + '/edit',
//     type: 'GET',
//     success: function(response) {
//       // Afficher les factures des clients correspondants
//       var result = response.facture;
//       // alert('success');
//       document.querySelector(".Modifier").style.transform = "scale(1)";
//       console.log(response.facture);

//       // Use let when declaring the Facture variable
//       Facture = {
//         "idFcature": result.id,
//         "Numero": result.numero,
//         "dateFacture": result.date,
//         "total": result.total,
//         "modeLivraison": result.mode_livraison,
//         "modePaiement": result.mode_paiement,
//         "remiseglobal": result.remiseGlobal,
//         "fournisseur": result.fournisseur_id,
//         "type": result.type,
//         "idF": result.fournisseur_id,
//       };

//       // Rest of your code here...
//       // $('#cform').attr('action','/credit/'+cid);
//       // alert('credit n\'est plus disponible');
//       // chargerForm();
//     },
//     error: function() {
//       alert('Une erreur s\'est produite lors de la récupération de vtrfit.');
//     }
//   });
// }


function chargerForm(){
    let [fournisseur,Numero,dateFacture,total,remiseglobal,modePaiement,modeLivraison,type]=document.querySelectorAll(".modifier input,.modifier select");
     fournisseur.value=Facture.idF
     Numero.value=Facture.Numero
     dateFacture.value=Facture.dateFacture
     total.value=Facture.total
     modeLivraison.value=Facture.modeLivraison
     modePaiement.value=Facture.modePaiement
     remiseglobal.value=Facture.remiseglobal
     type.value=Facture.type
}

$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })
//Modifier
document.querySelectorAll(".modifier button")[0].addEventListener("click",(e)=>{
    e.preventDefault()
    let [fournisseur,Numero,dateFacture,total,remiseglobal,modePaiement,modeLivraison,type]=document.querySelectorAll(".modifier input,.modifier select");
    console.log(Numero.value);
    $.ajax({
        type:'PUT',
        url : '/achat/'+ Facture.idFcature,
        data : {numero:Numero.value,date:dateFacture.value,remiseGlobal:remiseglobal.value,mode_paiement:modePaiement.value,mode_livraison:modeLivraison.value,type:type.value},
        dataType:'json',
        success:function(res){
          alert('submited successfully');
          document.querySelector(".modifier").style='transform:scale(0)'
          setTimeout(() => {
            location.reload() 
          }, 300)
        },
        error: function (xhr, status, error) {
        console.log(error);
        }
      })
//     let xhr=new XMLHttpRequest();
//     xhr.open("POST","modifierFacture.php");
//     xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//     xhr.send("idFcature="+Facture.idFcature+"&Numero="+Numero.value+"&dateFacture="+dateFacture.value+"&fournisseur="+fournisseur.value+"&total="+total.value+"&remiseglobal="+remiseglobal.value+"&modeLivraison="+modeLivraison.value+"&modePaiement="+modePaiement.value+"&type="+type.value);
//     document.querySelector(".modifier").style='transform:scale(0)'
//    setTimeout(() => {
//        location.reload() 
//    }, 300)
})
//annuler Modifier
document.querySelectorAll(".modifier button")[1].addEventListener("click",(e)=>{
    e.preventDefault()
    document.querySelector(".modifier").style='transform:scale(0)'
})

let Facture;
$('.Mbtn').on('click',function(){
    var id = $(this).attr('id');
    // alert('Clicked ID: ' + id);
    $.ajax({
        url: '/achat/' + id + '/edit',
        type: 'GET',
        success: function(response) {
            // Afficher les factures des client correspondants
            document.querySelector(".modifier").style.transform = "scale(1)";

            console.log(response.facture);
            let result=response.facture;
            alert('get success');
            Facture = {
                    "idFcature": result.id,
                    "Numero": result.numero,
                    "dateFacture": result.date,
                    "total": result.total,
                    "modeLivraison": result.mode_livraison,
                    "modePaiement": result.mode_paiement,
                    "remiseglobal": result.remiseGlobal,
                    "fournisseur": result.fournisseur_id,
                    "type": result.type,
                    "idF": result.fournisseur_id,
                  };
                  chargerForm();
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la récupération de facture.');
        }
    });
})

// function Liste(id){
//     document.querySelector(".LPay").innerHTML=`
//     <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Libelle</div>
//     <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Qte_cmd</div>
//     <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Qte_recue</div>
//     <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Prix_achat</div>
//     `;
//     document.querySelector(".Liste").style.transform="scale(1)";
//     $.ajax({
//         url: '/getListe/' + id,
//         type: 'GET',
//         success: function(response) {
//             // Afficher les factures des client correspondants
//             document.querySelector(".LPay").innerHTML=`
//             <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Libelle</div>
//             <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Qte_cmd</div>
//             <div class="col-2 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">Qte_recue</div>
//             <div class="col-3 text-center bg-dark text-white h5 pt-1 pb-1" style="border:1px solid white;">prix_achat</div>
//             `;
//             var result = response.articles;
//             alert('success');
//             if (result.length > 0) {
//               //  console.log(response.factures);
//                 $.each(result, function(index, lg) {
//                     document.querySelector(".LPay").innerHTML+=`
//                     <div class="col-3 text-center bg-dark text-white pt-1 pb-1 h5" style="border:1px solid white;">${lg.libelle}</div>
//                     <div class="col-2 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">${lg.qte_cmd}</div>
//                     <div class="col-2 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">${lg.qte_recue}</div>
//                     <div class="col-3 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">${lg.price}</div>
//                     `;
//                   });
//                   document.querySelector(".LPay").innerHTML+=`
//                   <div class="col-3 text-center bg-dark text-white  pt-1 pb-1 h5" style="border:1px  solid white;">${lg.price}</div>
//                   `;
//             } else {
//                 document.querySelector(".LPay").innerHTML+='Aucun article correspondant trouvé.';
//             }
//         },
//         error: function() {
//             alert('Une erreur s\'est produite lors de la récupération des paiements.');
//         }
//     });
// }

function Liste(id){
    document.querySelector(".ArtTable").innerHTML=`
    <thead>
    <tr>
      <th>Libelle</th>
      <th>Qte_cmd</th>
      <th>Qte_recue</th>
      <th>Prix_achat</th>
    </tr>
  </thead>
    `;
    $.ajax({
        url: '/getListe/' + id,
        type: 'GET',
        success: function(response) {
            // Afficher les factures des client correspondants
            document.querySelector(".ArtTable").innerHTML=`
            <thead>
            <tr>
              <th>Libelle</th>
              <th>Qte_cmd</th>
              <th>Qte_recue</th>
              <th>Prix_achat</th>
            </tr>
          </thead>
            `;
            var result = response.articles;
            // alert('success');
            if (result.length > 0) {
              //  console.log(response.factures);
                $.each(result, function(index, lg) {
                    document.querySelector(".ArtTable").innerHTML+=`
                    <tbody>
                        <tr>
                        <td>${lg.libelle}</td>
                        <td>${lg.qte_cmd}</td>
                        <td>${lg.qte_recue}</td>
                        <td>${lg.price} DH</td>
                        </tr>
                    </tbody>
                    `;
                  });
            } else {
                document.querySelector(".ArtTable").innerHTML+='<td colspan="4">Aucun article correspondant trouvé.</td>';
            }
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la récupération des paiements.');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const rows = document.querySelectorAll('#tbt tr');

  searchInput.addEventListener('keyup', function(e) {
      const x = e.target.value.toLowerCase();
      rows.forEach(el => {
          const cellContent = el.querySelector('.fr').textContent.toLowerCase();
          el.style.display = cellContent.includes(x) ? '' : 'none';
      });
  });
});
