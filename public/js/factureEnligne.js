
for (let index = 0; index < document.querySelectorAll("input,select").length; index++) 
   document.querySelectorAll("input,select")[index].style.marginTop="5px"
function Client(){
    document.querySelector(".client").style.display='block'
    document.querySelector(".societe").style.display='none'
    document.querySelector("#client").style.background='#335ADB'
    document.querySelector("#societe").style.background='#f60'
    document.querySelector("#client").style.transform='scale(1.4)'
    document.querySelector("#societe").style.transform='scale(1)'
}
function Societe(){
    document.querySelector(".client").style.display='none'
    document.querySelector(".societe").style.display='block'   
    document.querySelector("#client").style.background='#f60'
    document.querySelector("#societe").style.background='#335ADB'
    document.querySelector("#client").style.transform='scale(1)'
    document.querySelector("#societe").style.transform='scale(1.4)'
}
let Produits=[]
function ajouter(){
    let produit=document.querySelectorAll(".produit input,.produit select")
    let mtva=parseFloat(parseFloat(parseFloat(produit[1].value/100) *parseFloat(produit[3].value))*parseFloat(produit[2].value))
    let ht= parseFloat(parseFloat(produit[2].value)*parseFloat(produit[3].value))
    let tot=parseFloat(parseFloat(ht)+parseFloat(mtva))
    let objProduit={
        disgnation:produit[0].value,
        tva:produit[1].value,
        qte:produit[2].value,
        pu:produit[3].value,
        unite:produit[4].value,
        total:tot,
        ht:ht,
        mtva:mtva,
    }
    if(produit[0].value=""||produit[1].value==""||produit[2].value==""||produit[3].value=="")
    alert("Toute champs obligatoires")
    else{
    Produits.push(objProduit)
    charger()
    produit[0].value=""
    produit[1].value=""
    produit[2].value=""
    produit[3].value=""        
    } 
}
let Ttva=0,Tht=0,TTC=0
function charger(){
    document.querySelector("table").innerHTML=` <tr>
    <td style='padding:5px;background-color:#f60;color:white'>Désignation </td>
    <td style='padding:5px;background-color:#f60;color:white'>Unité</td>
    <td style='padding:5px;background-color:#f60;color:white'>Prix Unitaire</td>
    <td style='padding:5px;background-color:#f60;color:white'>Qte</td>
    <td style='padding:5px;background-color:#f60;color:white'>Tva</td>
    <td style='padding:5px;background-color:#f60;color:white'>Total</td>
    <td style='padding:5px;background-color:#f60;color:white'>supp</td>
    </tr>`
    Ttva=0,Tht=0,TTC=0
    for (let index = 0; index < Produits.length; index++) {
        Ttva+=Produits[index].mtva
        Tht+=Produits[index].ht
        TTC+=Produits[index].total
        document.querySelector("table").innerHTML+=` <tr>
          <td style='background-color:#FFC0AC;'>${Produits[index].disgnation}</td>
          <td style='background-color:#FFC0AC;'>${Produits[index].unite}</td>
          <td style='background-color:#FFC0AC;'>${Produits[index].pu}</td>
          <td style='background-color:#FFC0AC;'>${Produits[index].qte}</td>
          <td style='background-color:#FFC0AC;'>${Produits[index].tva}</td>
          <td style='background-color:#FFC0AC;'>${Produits[index].total}</td>
          <td style='background-color:#FFC0AC;'><button onclick=suprimer(${Produits[index].disgnation}) style='background-color:transparent;border:0;'><i style='color:red;background-color:transparent;' class="h3 fas fa-trash-alt"></i></button></td>
        </tr>`
        
    } document.querySelector("table").innerHTML+=`
    <tr style='background-color:#7c93df;color:white;font-size:20px;'>
         <td style="background:#7c93df;">total tva</td>
         <td style="background:#7c93df;">${Ttva} DH</td>
     </tr>
     <tr style='background-color:#4063d7;color:white;font-size:20px;'>
         <td  style="background:#4063d7;">total HT</td>
         <td  style="background:#4063d7;">${Tht} DH</td>
     </tr>
     <tr style='background-color:#335ADB;color:white;font-size:20px;'>
         <td  style="background:#335ADB;">total TTC</td>
         <td  style="background:#335ADB;">${TTC} DH</td>
     </tr>
    `
    if(produit[0].value="true"){
        produit[0].value=""
    }
   
}
//suprimmmer
function suprimer(des){
    for (let index = 0; index < Produits.length; index++) 
        if(Produits[index].disgnation==des)
         Produits.splice(index, 1);         
          charger()
}
//vider
function vider(){
    for (let index = 0; index < document.querySelectorAll("input,select").length; index++) 
    document.querySelectorAll("input,select")[index].value=""
    Produits=[]
    document.querySelectorAll("input,select")[1].value="FC-897-1"
    charger()
}
//numfacture
let NumFc;
function getNum(){
    let client=document.querySelectorAll(".client input")
    let xhr=new XMLHttpRequest();
        xhr.onreadystatechange= function(){
        if(xhr.readyState==4&& xhr.status==200)
          NumFc= xhr.responseText
        }
        xhr.open("GET","GetNumFc.php?client="+client[0].value,true);
        xhr.send(null);
}
//imprimer
function imprimer(){
    let cmp=0;
    for (let index = 0; index < document.querySelectorAll("input,select").length; index++) 
        if(document.querySelectorAll("input,select")[index].value=="")
        cmp++
    if(Produits.length!=0){
     let societe=document.querySelectorAll(".societe input,.societe select")
    let client=document.querySelectorAll(".client input")
    let xhr=new XMLHttpRequest();
    xhr.open("POST","ajoutefacture.php");
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("societe="+societe[0].value+"&adresse="+societe[1].value+"&email="+societe[2].value+"&telephone="+societe[3].value+"&if="+societe[4].value+"&rc="+societe[5].value+"&ice="+societe[6].value+"&fj="+societe[7].value+"&tva="+Ttva+"&ht="+Tht+"&ttc="+TTC+"&numero="+document.querySelectorAll("input")[1].value+"&date="+document.querySelectorAll("input")[0].value+"&societeC="+client[0].value+"&emailC="+client[2].value+"&adresseC="+client[1].value+"&telephoneC="+client[3].value+"&ifC="+client[4].value+"&iceC="+client[5].value+"&ville="+client[6].value);
    setTimeout(getNum,300)
    setTimeout(AjouteProduit,900)
    function AjouteProduit(){
      for (let index = 0; index < Produits.length; index++) {
        xhr.open("POST","ajouteProduitDansFacture.php");
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("libelle="+Produits[index].disgnation+"&tva="+Produits[index].tva+"&pu="+Produits[index].pu+"&qte="+Produits[index].qte+"&total="+Produits[index].total+"&unite="+Produits[index].unite+"&idf="+NumFc);
      }
      window.open("FactureGratuite.php?NumFc="+NumFc,'popup','width=1000,height=1000')
    }         
    }
     
}