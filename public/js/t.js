let selectProduit=document.querySelector(".produit")
let selectClient=document.querySelector(".client")
let selectFacture=document.querySelector(".facture")
let ValiderVar=false
let IdClientSelect;
let Typee=selectFacture[0].innerHTML
let Produits=[]
document.querySelector(".Ajoute").addEventListener("click",()=>{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==selectProduit.value)
        {return}
    }
    let xhr=new XMLHttpRequest();
    xhr.onreadystatechange= function(){
        if(xhr.readyState==4&& xhr.status==200){
          let converVar=JSON.parse( xhr.responseText);
          if(Typee=='BON')
          converVar[0].TVA=0
          let  Produit={
            "Id": converVar[0].id,
            "Qtee":1,
            "Libelle":converVar[0].libelle,
            "PUHT":converVar[0].PUHT,
            "Tva":converVar[0].TVA,
            "MontantTva":0,
            "TTc":0,
            "unite":"",
            "remise":"0",

              }
              Produits.push(Produit);
              chargerProduits() 
           } 
         }
      xhr.open("GET","OneArticle.php?id="+selectProduit.value,true);
      xhr.send(null);
})
chargerProduits=()=>{
    let display
    let MotTTC="Total TTC"	
    if(Typee=='BON'){
     display="none"
     MotTTC="Total HT"	
    }
    document.querySelector(".table").innerHTML=`
    <thead class='table-dark'>
    <td >Libelle</td>
    <td>Unité</td>
    <td>Qte</td>
    <td>PU HT</td>
    <td>Taux remise</td>
    <td style="display:${display};">TVA (%)</td>
    <td style="display:${display};">Montant Tva</td>
    <td>${MotTTC}</td>
    <td>Sel</td>
    </thead>
    `;
    for (let index = 0; index < Produits.length; index++) {
    Produits[index].MontantTva=parseFloat(parseFloat(Produits[index].Tva/100) *parseFloat(Produits[index].PUHT)) *Produits[index].Qtee
    Produits[index].TTc=Produits[index].PUHT*Produits[index].Qtee+Produits[index].MontantTva-(Produits[index].PUHT*Produits[index].Qtee*(Produits[index].remise/100))
    document.querySelector(".table").innerHTML+=`
     <tbody class='table-light' value=''>
      <td class=''>${Produits[index].Libelle}</td>
      <td>
      <select id='unite' onblur="uniteModif(${Produits[index].Id})" name='SaleDelivery[lines][0][product][unit]' class='form-control valid' style='width:100px;' data-validation='required' data-validation-error-msg='Ce champ est obligatoire.' original=''>
      <optgroup label='UnitÃ©'><option value='Douzaine'>Douzaine(s)</option><option value=''>UnitÃ©(s)</option></optgroup>
      <optgroup label='Poids'><option value='t'>t</option><option value='kg'>kg</option><option value='g'>g</option></optgroup>
      <optgroup label='Temps de travail'><option value='Jour'>Jour(s)</option><option value='Heure'>Heure(s)</option></optgroup>
      <optgroup label='PÃ©riode'><option value='mois'>mois</option><option value='ans'>ans</option></optgroup>

      <optgroup label='Longueur/distance'><option value='km'>km</option><option value='m'>m</option><option value='cm'>cm</option></optgroup>
      <optgroup label='Volume'><option value='Litre'>Litre(s)</option></optgroup>
      </select>
      <td>
      <div class='row'>
      <button style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;' class='col-12 col-md-2  mt-1' onfocus='EventQte("+",${Produits[index].Qtee},${Produits[index].Id})' onclick='EventQte("+",${Produits[index].Qtee},${Produits[index].Id})'><i style="color:green" class="fa-xs fas fa-arrow-circle-up"></i></button> 
      <input  class="col-12 col-md-8 form-control Qte EQTE" onblur='ModifierQte(this.value,${Produits[index].Id})' style='width:50px;height:relative;' type="number" max="100" min="1" class="" text="${Produits[index].Id}" value=${Produits[index].Qtee}>
      <button style='font-size: 20px;padding:0;border:0;background: none;margin: 0;' class='col-12 col-md-2  mt-1' onclick='EventQte("-",${Produits[index].Qtee},${Produits[index].Id})'><i style="color:red" class="fa-xs fas fa-arrow-circle-down"></i></button> 
      </div>
      </td>
      <td>
      <div class='row'>
      <button class='col-12 col-md-2   mt-1' onfocus='EventPrix("+",${Produits[index].PUHT},${Produits[index].Id})' onclick='EventPrix("+",${Produits[index].PUHT},${Produits[index].Id})' style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;'><i style="color:green" class="fa-xs fas fa-arrow-circle-up"></i></button> 
      <input  class="col-12 col-md-8 form-control Qte EPRIX" onblur='ModifierPrix(this.value,${Produits[index].Id})' style='width:60px' type="number"  min="1" class="" text="${Produits[index].Id}" value=${Produits[index].PUHT}>
      <button class='col-12 col-md-2   mt-1' onclick='EventPrix("-",${Produits[index].PUHT},${Produits[index].Id})' style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;'><i style="color:red" class="fa-xs fas fa-arrow-circle-down"></i></button> 

      </td>
      <td>   
         <input  class="col-12 col-md-8 form-control Qte EQTE" onblur='ModifierRemise(this.value,${Produits[index].Id})' style='width:50px;height:relative;' type="number" max="100" min="1" class="" text="${Produits[index].Id}" value=${Produits[index].remise}>      </td>

      <td style="display:${display};">
      <div class='row' style="">
      <button class='col-12 col-md-2   mt-1' onclick='EventTva("+",${Produits[index].Tva},${Produits[index].Id})' style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;'><i style="color:green" class="fa-xs fas fa-arrow-circle-up"></i></button> 
      <input class="col-12 col-md-8 form-control Qte ETVA" onblur='ModifierTva(this.value,${Produits[index].Id})' style='width:60px' type="number" max="40" min="1" class="" text="${Produits[index].Id}" value=${Produits[index].Tva}>
      <button class='col-12 col-md-2   mt-1' onclick='EventTva("-",${Produits[index].Tva},${Produits[index].Id})' style='font-size: 20px;padding:2px;border:0;background: none; margin-right:2px;'><i style="color:red" class="fa-xs fas fa-arrow-circle-down"></i></button> 

      </td>
      <td class='pt-3' style="display:${display};">${parseFloat(Produits[index].MontantTva).toFixed(2) }DH</td>
      <td class='pt-3'>${parseFloat(Produits[index].TTc).toFixed(2) }DH</td>
      <td class='pt-3'><button onclick=suprimer(${Produits[index].Id}) style='background-color:transparent;border:0;'><i style='color:red;background-color:transparent;' class="h3 fas fa-trash-alt"></i></button></td>
    </tbody>`
    let select=document.querySelectorAll(".valid");
    for (let i = 0; i < select.length; i++) {
        for (let zndex = 0; zndex < select[i].options.length; zndex++) {
            if(select[i].options[zndex].value==Produits[i].unite)
                select[i].options[zndex].setAttribute("selected","true")
        }
    }
    }
    Calculer()
    
}
//Event modifier
function uniteModif(id){
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id)
            Produits[index].unite=document.querySelectorAll(".valid")[index].value
    }
}
//Event Remise
function ModifierRemise(Remise,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id){
            Produits[index].remise=Remise
            Calculer()
        }
            
    }
    chargerProduits()
}

//Event Qte
function EventQte(operation,Qte,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id){
            if(operation=="+")
            Produits[index].Qtee=parseInt(Qte+1)
            else
            if(Qte!=0)
            Produits[index].Qtee=parseInt(Qte-1)
        }
    }
       chargerProduits()
}
function EventPrix(operation,Prix,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id){
            if(operation=="+")
            Produits[index].PUHT=parseFloat(Prix+1)
            else
            if(Prix!=0)
            Produits[index].PUHT=parseFloat(Prix-1)
        }
    }
       chargerProduits()
}
function EventTva(operation,TVA,id)
{
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id){
            if(operation=="+")
            Produits[index].Tva=parseFloat(TVA+1)
            else
            if(TVA!=0)
            Produits[index].Tva=parseFloat(TVA-1)
        }
    }
       chargerProduits()
}
//suprimmer
function suprimer(des){
    for (let index = 0; index < Produits.length; index++) 
        if(Produits[index].Id==des)
         Produits.splice(index, 1);         
          chargerProduits()
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
//modifier Quantite
function ModifierQte(val,id){
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id)
            Produits[index].Qtee=val
        
    }
    chargerProduits()
}
//modifier Prix
function ModifierPrix(val,id){
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id)
        {
            Produits[index].PUHT=val
        } 
    }
    chargerProduits()
}
//modifier Tva
function ModifierTva(val,id){
    for (let index = 0; index < Produits.length; index++) {
        if(Produits[index].Id==id)
            Produits[index].Tva=val
    }
    chargerProduits()
}
let Ttva=0,Tmontan=0,TTC=0,remiseMon=0,brutHT=0;
function Calculer() {
    Ttva=0,Tmontan=0,TTC=0,remiseMon=0;brutHT=0;
    for (let index = 0; index < Produits.length; index++) {
        Ttva+=Produits[index].MontantTva
        let monHT=parseFloat(Produits[index].PUHT*Produits[index].Qtee) 
        let monRemise=parseFloat(monHT*Produits[index].remise/100)
        remiseMon+=monRemise
        brutHT+=monHT
        Tmontan+= parseFloat(monHT-monRemise)
        TTC+=Produits[index].TTc
    }
    document.querySelector(".ht").innerHTML="Montant Brut HT :"+parseFloat(brutHT).toFixed(2)+" DH"
    document.querySelector(".tva").innerHTML="Montant TVA :"+parseFloat(Ttva).toFixed(2)+" DH"
    document.querySelector(".remise").innerHTML="Remise :"+parseFloat(remiseMon).toFixed(2)+" DH"
    document.querySelector(".Netht").innerHTML="Net HT :"+parseFloat(Tmontan).toFixed(2)+" DH"
    document.querySelector(".ttc").innerHTML="Montant TTC :"+parseFloat(TTC).toFixed(2)+" DH"
}
//vider
function Vider(){
if(ValiderVar==true){
let cmd=document.querySelector(".cmd");
let str=cmd.value.split("")
let car=str[str.length-1]
str[str.length-1]=parseInt(car)+1
str=str.join("")
cmd.value=str
}
Produits=[]
chargerProduits()
ValiderVar=false
}

//valider
function Valider(){
    if(ValiderVar==false){
        if(Produits.length>0){
        IdClientSelect=selectClient.value
        let selectPayment=document.querySelector(".payment").value
        let Ref=document.querySelector("#Ref").value
        let xhr=new XMLHttpRequest();
        xhr.open("POST","AjouteCmd.php");
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        //console.log(document.querySelector("textarea").innerHTML)
        xhr.send("idClient="+selectClient.value+"&TTVa="+Ttva+"&TTCHT="+Tmontan+"&TTC="+TTC+"&Type="+Typee+"&example="+NumExample+"&Ref="+Ref+"&payment="+selectPayment+"&NB="+document.querySelector("textarea").value);
        setTimeout(AjouteDetaile,300)
        function AjouteDetaile(){
           for (let index = 0; index < Produits.length; index++) {
            let xhr2=new XMLHttpRequest();
            xhr2.open("POST","AjouteDetaileCmd.php");
            xhr2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr2.send("idClient="+selectClient.value+"&idProduit="+Produits[index].Id+"&Qte="+Produits[index].Qtee+"&PUHT="+Produits[index].PUHT+"&TVA="+Produits[index].Tva+"&TTVA="+Produits[index].MontantTva+"&Total="+Produits[index].TTc+"&Type="+Typee+"&unite="+Produits[index].unite+"&remise="+Produits[index].remise);
        }  
        }
       
        ValiderVar=true
        }else
        alert("selectionner une Produit")
        
    }else
    alert("La commande d'eja Valide svp vider commande")
   
}
//Imprimer
let NumCmde;
function Imprimer(){ 
    if(!ValiderVar){
      event.preventDefault()  
      alert("Valider Facture SVP")
    }else{
       event.preventDefault() 
       let xhr=new XMLHttpRequest();
        xhr.onreadystatechange= function(){
        if(xhr.readyState==4&& xhr.status==200){
          NumCmde= xhr.responseText
          window.open("Example"+NumExample+".php?Numcmd="+NumCmde,'popup','width=1000,height=1000');
          }
        }
        xhr.open("GET","GetNumCmd.php?idClient="+IdClientSelect,true);
        xhr.send(null);
       //alert(selectFacture[0].innerHTML+selectFacture.value+".php")
        
    }
}
function whtsp(){
    if(!ValiderVar){
        event.preventDefault()  
        alert("Valider Facture SVP")
      }else{
         event.preventDefault() 
         let xhr=new XMLHttpRequest();
          xhr.onreadystatechange= function(){
          if(xhr.readyState==4&& xhr.status==200){
            NumCmde= xhr.responseText
            let str="https://worfac.com/"+"Example"+NumExample+".php?Numcmd="+NumCmde;
            window.open("https://api.whatsapp.com/send?text="+str)
            }
          }
          xhr.open("GET","GetNumCmd.php?idClient="+IdClientSelect,true);
          xhr.send(null);
         //alert(selectFacture[0].innerHTML+selectFacture.value+".php")
          
      }
}
//ajout client 

   //afficher
   function Ajoute(){
    document.querySelector(".AjouteClient").style.transform="scale(1)"
  }
//annuler
  function annuler(){
    
  }
   //ajoute
 document.querySelector(".ajouteClient").addEventListener("click",()=>{
    let inputes=document.querySelectorAll(".AjouteClient input");
    let [nom,adress,telephone,rib]=inputes;
    console.log(inputes)
    let xhr=new XMLHttpRequest();
    xhr.open("POST","AjouteClient.php");
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("Nom="+nom.value+"&Adress="+adress.value+"&Telephone="+telephone.value+"&RIB="+rib.value);
    annuler()
    document.querySelector(".AjouteClient").style.transform="scale(0)"
   // setTimeout(ConvertPHpJson,"300")
   setTimeout(() => {
       location.reload() 
   }, 50);
  
    inputes[0].value=""
    inputes[1].value=""
    inputes[2].value=""
    inputes[3].value=""
  })
  //annuler 2
  document.querySelector("#annuler").addEventListener("click",()=>{
    document.querySelector(".AjouteClient").style.transform="scale(0)"
  })
     // document.querySelector(".AjouteClient").style.transform="scale(0)";
 //RecherchClient
//Recherche Produit
let Products=[]
function Prdouit(){
  for (let index = 0; index < selectProduit.length; index++) {
    let Product=
       {
        "id":selectProduit.options[index].value
        ,"Description":selectProduit.options[index].innerHTML.toUpperCase()
       }
       Products.push(Product) 
      }
 }  
 Prdouit()
 document.querySelector(".rech").addEventListener("keyup",()=>{
     charger()
 })
 function charger(){ 
     selectProduit.innerHTML=""
      for (let index = 0; index < Products.length; index++) {
         if(Products[index].Description.includes(document.querySelector(".rech").value.toUpperCase()))
            selectProduit.innerHTML+="<option value="+Products[index].id+">"+Products[index].Description+"</option>"
         else if(document.querySelector(".rech").value.toUpperCase()=="")
            selectProduit.innerHTML+="<option value="+Products[index].id+">"+Products[index].Description+"</option>"
      }
 }
 //RecherchClient
 let Clients=[]
function clientsss(){
  let selectClient=document.querySelector(".client")
  for (let index = 0; index < selectClient.length; index++) {
    let Product=
       {
        "Id":selectClient.options[index].value
        ,"NomC":selectClient.options[index].innerHTML.toUpperCase()
       }
       Clients.push(Product) 
       
      }
 }  
 clientsss()
 document.querySelector(".rech2").addEventListener("keyup",()=>{
     chargerClient()

 })
 function chargerClient(){ 
    let selectClient=document.querySelector(".client")
     selectClient.innerHTML=""
      for (let index = 0; index < Clients.length; index++) {
         if(Clients[index].NomC.includes(document.querySelector(".rech2").value.toUpperCase()))
            selectClient.innerHTML+="<option value="+Clients[index].Id+">"+Clients[index].NomC+"</option>"
         else if(document.querySelector(".rech2").value.toUpperCase()=="")
            selectClient.innerHTML+="<option value="+Clients[index].Id+">"+Clients[index].NomC+"</option>"
      }
 }