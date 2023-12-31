
// console.log(jsonData.articlesJ[0]);


// Create a variable to store the search input.
var searchInput = document.getElementById("searchInput");

// Create a function to filter the select tag.
function filterSelect() {
  // Get the value of the search input.
  var searchValue = searchInput.value.toLowerCase();
  // Get the select tag.
  var selectTag = document.getElementById("clients");
  // Get all of the options in the select tag.
  var options = selectTag.options;
  // Loop through the options and hide any that do not match the search value.
  for (var i = 0; i < options.length; i++) {
    if (options[i].text.toLowerCase().indexOf(searchValue) < 0) {
      options[i].style.display = "none";
    } else {
      options[i].style.display = "block";
      options[i].selected = true;
    }
  }
}
// Add an event listener to the search input.
searchInput.addEventListener("input", filterSelect);


// Articles
var searchInputArt = document.getElementById("searchInputArt");

function filterSelectArt() {
  var searchValue = searchInputArt.value.toLowerCase();
  var selectTag = document.getElementById("articles");
  var options = selectTag.options;
  for (var i = 0; i < options.length; i++) {
    if (options[i].text.toLowerCase().indexOf(searchValue) < 0) {
      options[i].style.display = "none";
    } else {
      options[i].style.display = "block";
      options[i].selected = true;
    }
  }
}
let Produits=[];

searchInputArt.addEventListener("input", filterSelectArt);

window.addEventListener('load', function() {
    // Votre code à exécuter une fois que la page est chargée
    // Par exemple :
    const ft=jsonData.articlesJ;
    for (let x=0; x< ft.length ;x++){
        // console.log(ft[x]);
        let product={};
        product['description']=ft[x].art.description;
        product['Qtee']=ft[x].quantite;
        product['price']=ft[x].art.price;
        product['tva']=ft[x].art.tva;
        product['quantite']=ft[x].art.quantite;
        product['id']=ft[x].art.id;
        product['MontantTva']=0;
        product['unite']='';
        product['remise']=0;
        product['TTc']=0;
        Produits.push(product);
        
        // console.log(product);

    }
    chargerArticles();
  });

var add=document.getElementById('addArt');
add.addEventListener('click',ajouterArt);

let ValiderVar=false;


function ajouterArt(){
    var select = document.getElementById("articles");
    var produit = JSON.parse(select.value);
    // console.log(produit);
    var Pid=produit.id
    var existP=false;
    produit['MontantTva']=0;
    produit['unite']='';
    produit['Qtee']=1;
    produit['remise']=0;
    produit['TTc']=0;

    Produits.forEach(element => {
      if (element.id==Pid) {
         existP=true;
         EventQte("+",element.Qtee,Pid);
      }
    });
    if (existP==false) {
        Produits.push(produit)
    }
    // console.log(produit);
    // console.log(Produits);
    chargerArticles();
}

function chargerArticles(){

    document.querySelector(".table").innerHTML=`
    <thead class='table-dark'>
    <td >Libelle</td>
    <td>Unité</td>
    <td>Qte</td>
    <td>PU HT</td>
    <td>Taux remise</td>
    <td>TVA (%)</td>
    <td>Montant Tva</td>
    <td>MotTTC</td>
    <td>Action</td>
    </thead>
    `;
    for (let index = 0; index < Produits.length; index++) {
    Produits[index].MontantTva=parseFloat(parseFloat(Produits[index].tva/100) *parseFloat(Produits[index].price)) *Produits[index].Qtee
    Produits[index].TTc=Produits[index].price*Produits[index].Qtee+Produits[index].MontantTva-(Produits[index].price*Produits[index].Qtee*(Produits[index].remise/100))
    document.querySelector(".table").innerHTML+=`
     <tbody class='table-light' value=''>
      <td class=''>${Produits[index].description}</td>
      <td>
      <select id='unite' onblur="uniteModif(${Produits[index].id})" name='SaleDelivery[lines][0][product][unit]' class='form-control valid' style='width:100px;' data-validation='required' data-validation-error-msg='Ce champ est obligatoire.' original=''>
      <optgroup label='Unité'><option value='Douzaine'>Douzaine(s)</option><option value=''>UnitÃ©(s)</option></optgroup>
      <optgroup label='Poids'><option value='t'>t</option><option value='kg'>kg</option><option value='g'>g</option></optgroup>
      <optgroup label='Temps de travail'><option value='Jour'>Jour(s)</option><option value='Heure'>Heure(s)</option></optgroup>
      <optgroup label='Période'><option value='mois'>mois</option><option value='ans'>ans</option></optgroup>

      <optgroup label='Longueur/distance'><option value='km'>km</option><option value='m'>m</option><option value='cm'>cm</option></optgroup>
      <optgroup label='Volume'><option value='Litre'>Litre(s)</option></optgroup>
      </select>
      <td>
      <div class='row'>
      <button style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;' class='col-12 col-md-2  mt-1' onfocus='EventQte("+",${Produits[index].Qtee},${Produits[index].id})' onclick='EventQte("+",${Produits[index].Qtee},${Produits[index].id})'><i style="color:green" class="fa-xs fas fa-arrow-circle-up"></i></button> 
      <input  class="col-12 col-md-8 form-control Qte EQTE" onblur='ModifierQte(this.value,${Produits[index].id})' style='width:50px;height:relative;' type="number" max="${Produits[index].quantite}" min="1" class="" text="${Produits[index].id}" value=${Produits[index].Qtee} />
      <button style='font-size: 20px;padding:0;border:0;background: none;margin: 0;' class='col-12 col-md-2  mt-1' onclick='EventQte("-",${Produits[index].Qtee},${Produits[index].id})'><i style="color:red" class="fa-xs fas fa-arrow-circle-down"></i></button> 
      </div>
      </td>
      <td>
      <div class='row'>
      
      <span style='margin-top: 10%;'> ${Produits[index].price} </span>
      </td>
      <td>   
         <input  class="col-12 col-md-8 form-control Qte EQTE" onblur='ModifierRemise(this.value,${Produits[index].id})' style='width:50px;height:relative;' type="number" max="100" min="1" class="" text="${Produits[index].id}" value=${Produits[index].remise}>      </td>

      <td >
      <div class='row' style="">
      <button class='col-12 col-md-2   mt-1' onclick='EventTva("+",${Produits[index].tva},${Produits[index].id})' style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;'><i style="color:green" class="fa-xs fas fa-arrow-circle-up"></i></button> 
      <input class="col-12 col-md-8 form-control Qte ETVA" onblur='ModifierTva(this.value,${Produits[index].id})' style='width:60px' type="number" max="40" min="1" class="" text="${Produits[index].id}" value=${Produits[index].tva}>
      <button class='col-12 col-md-2   mt-1' onclick='EventTva("-",${Produits[index].tva},${Produits[index].id})' style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;'><i style="color:red" class="fa-xs fas fa-arrow-circle-down"></i></button> 

      </td>
      <td class='pt-3' >${parseFloat(Produits[index].MontantTva).toFixed(2) }DH</td>
      <td class='pt-3'>${parseFloat(Produits[index].TTc).toFixed(2) }DH</td>
      <td class='pt-3'><button onclick=suprimer(${Produits[index].id}) style='background-color:transparent;border:0;'><i style='color:red;background-color:transparent;' class="h3 fas fa-trash-alt"></i></button></td>
    </tbody>`
    // let select=document.querySelectorAll(".valid");
    // for (let i = 0; i < select.length; i++) {
    //     for (let zndex = 0; zndex < select[i].options.length; zndex++) {
    //         if(select[i].options[zndex].value==Produits[i].unite)
    //             select[i].options[zndex].setAttribute("selected","true")
    //     }
    // }
    }
    Calculer()
    // console.log('ttc =' +TTC +'/'+ brutHT+'/ ttva = '+Ttva );
}

//suprimmer
function suprimer(des){
    for (let index = 0; index < Produits.length; index++) 
        if(Produits[index].id==des)
         Produits.splice(index, 1);         
         chargerArticles();
}  

//modifier Quantite
function ModifierQte(val,id){
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].id==id)
            Produits[index].Qtee=val
        
    }
    chargerArticles()
}

//modifier Tva
function ModifierTva(val,id){
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].id==id)
            Produits[index].tva=val
    }
    chargerArticles()
}

//Event Qte
// function EventQte(operation,Qte,id)
// {
//     for (let index = 0; index < Produits.length; index++) {
//         if(Produits[index].id==id){
//             if(operation=="+")
//             Produits[index].Qtee=parseInt(Qte+1)
//             else
//             if(Qte!=0)
//             Produits[index].Qtee=parseInt(Qte-1)
//         }
//     }
//     chargerArticles()
// }

function EventQte(operation,Qte,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].id==id){
            if(operation=="+" && Produits[index].quantite > Produits[index].Qtee ){
              Produits[index].Qtee=parseInt(Qte+1)
            }
            else
            if(Qte!=0)
            Produits[index].Qtee=parseInt(Qte-1)
        }
    }
    chargerArticles()
}

//Event Tva
function EventTva(operation,TVA,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].id==id){
            if(operation=="+")
            Produits[index].tva=parseFloat(TVA+1)
            else
            if(TVA!=0)
            Produits[index].tva=parseFloat(TVA-1)
        }
    }
    chargerArticles();
}

//Event Remise
function ModifierRemise(Remise,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].id==id){
            Produits[index].remise=Remise
            Calculer()
        }
            
    }
    chargerArticles();
}
var Ttva=0;
var Tmontan=0;var TTC=0;var remiseMon=0;var brutHT=0;
// calcule function
function Calculer() {
  // Ttva=0,Tmontan=0,TTC=0,remiseMon=0;brutHT=0;
  for (let index = 0; index < Produits.length; index++) {
      Ttva+=Produits[index].MontantTva
      let monHT=parseFloat(Produits[index].price*Produits[index].Qtee) 
      let monRemise=parseFloat(monHT*Produits[index].remise/100)
      remiseMon+=monRemise
      brutHT+=monHT
      Tmontan+= parseFloat(monHT-monRemise)
      TTC+=Produits[index].TTc
  }
  // console.log(Produits)
  document.querySelector(".ht").innerHTML="Montant Brut HT :"+parseFloat(brutHT).toFixed(2)+" DH"
  document.querySelector(".tva").innerHTML="Montant TVA :"+parseFloat(Ttva).toFixed(2)+" DH"
  document.querySelector(".remise").innerHTML="Remise :"+parseFloat(remiseMon).toFixed(2)+" DH"
  document.querySelector(".Netht").innerHTML="Net HT :"+parseFloat(Tmontan).toFixed(2)+" DH"
  document.querySelector(".ttc").innerHTML="Montant TTC :"+parseFloat(TTC).toFixed(2)+" DH"
}
//valider
function Valider(){
  if(ValiderVar==false){
      if(Produits.length>0){
        saveProductsToLaravel(Produits);

      ValiderVar=true
      }else
      alert("selectionner une Produit")
  }else
  alert("La commande d'eja Valide svp vider commande")
}

function Ajoute(){
  document.querySelector(".AjouteClient").style.transform="scale(1)"
}

document.getElementById('annuler').addEventListener('click',function(){
  document.querySelector(".AjouteClient").style.transform="scale(0)"
})

// function factInfo(){
//   var numFact = $('#Ref').val();
//   var client = $('#clients').val();
//   var typeF = $('#type').val();
//   console.log(numFact +'::'+ client + '::'+typeF);

// }

// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // Fonction pour envoyer les données à Laravel
    // function saveProductsToLaravel(products) {
    //     fetch('/facture/store', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Assurez-vous d'avoir la balise meta CSRF dans votre HTML.
    //         },
    //         body: JSON.stringify({ products: products })
    //     })
    //     .then(response => response.json())
    //     .then(data => console.log(data.message))
    //     .catch(error => console.log('Une erreur s\'est produite :', error));
    // }
// :::::::::::::::::::::

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    })

    $('#FForm').on('submit',function(e){
      e.preventDefault();

      if(ValiderVar==false){
        if(Produits.length>0){
              var numFact = $('#Ref').val();
              var client = $('#clients').val();
              var typeF = $('#type').val();
              var example=$('#exemple').val();
              var th=parseFloat(brutHT).toFixed(2);
              var ttc=parseFloat(TTC).toFixed(2);
              var tva=parseFloat(Ttva).toFixed(2);
              var url=$(this).attr('action');
              var mode_paiement=$('#payment').val();
              var factId=jsonData.articlesJ[0].facture_id;
              $.ajax({
                type:'PUT',
                url : '/facture/'+ factId,
                data : {Produits : Produits,ref:numFact,client:client,type:typeF,ex:example,tht:th,ttva:tva,ttc : ttc,mode_paiement:mode_paiement},
                dataType:'json',
                success:function(res){
                  alert('submited successfully');
                  window.history.back();
                //   console.log(Produits);
                  document.getElementById('imprime').setAttribute('href','/facture/'+ res.fact);
                  // console.log(res.request)
                  // console.log(res.facture)
                  // console.log(res.fid);
                },
                error: function (xhr, status, error) {
                console.log(error);
                }
              })
        ValiderVar=true
        }else
        alert("selectionner une Produit")
    }else
    alert("La commande d'eja Valide svp vider commande")
      
   })

   

   //vider
   $('#vider').on('click',function(){
    location.reload();
   }) 