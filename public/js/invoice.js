// $(document).ready(function(){
function Client() {
    $(".client").css("display", "block");
    $(".societe").css("display", "none");
    $("#client").css("background", "#335ADB");
    $("#societe").css("background", "#f60");
    $("#client").css("transform", "scale(1.4)");
    $("#societe").css("transform", "scale(1)");
}

    function Societe() {
    $(".client").css("display", "none");
    $(".societe").css("display", "block");
    $("#client").css("background", "#f60");
    $("#societe").css("background", "#335ADB");
    $("#client").css("transform", "scale(1)");
    $("#societe").css("transform", "scale(1.4)");
}

let Products=[];
let client={};

function supprimer(p){
    Products = Products.filter(function(product) {
        return product.des !== p;
      });
}

$('#product-form').on('submit',ajouter);

function ajouter(e){
    e.preventDefault();
    var des=$('#des').val();
    var tva=parseFloat($('#tva').val());
    var unite=$('#unite').val();
    var qte=parseFloat($('#qte').val());
    var prix=parseFloat($('#prix').val());
    var ttva=parseFloat((tva*((prix)/100))*qte);
    var ht=parseFloat(qte*prix);
    var totalp=parseFloat((qte*prix)+ttva);
    let societe=$('#societe').val();
    let adresse=$('#adresse').val();
    let telephone=$('#telephone').val();
    let email=$('#email').val();
    let idf=$('#idf').val();
    let ice=$('#ice').val();
    let ville=$('#ville').val();
    let rc=$('#rc').val();
    let fj=$('#fj').val();
    let numf=$('#numf').val();
    let date=$('#date').val();
    if (fj==='' && rc==='') {
        societe=$('.societe').val();
        adresse=$('.adresse').val();
        telephone=$('.telephone').val();
        email=$('.email').val();
        idf=$('.idf').val();
        ice=$('.ice').val();
        ville=$('.ville').val();
        client={societe,adresse,telephone,email,idf,ice,ville,numf,date};
    }else{
        client={societe,adresse,telephone,email,idf,ice,ville,rc,fj,numf,date};

    }

    console.log(client);

    if (des !=='' && tva !== '' && qte!=='' && prix!=='') {
        let product={
            des,tva,qte,prix,ttva,totalp,unite,ht
        }
        
        Products.push(product);
        console.log(Products);
        // console.log(product);
        

        $('#invoice-table tbody').append(
           `<tr><td> ${product.des}</td>
            <td> ${product.unite}</td>
            <td> ${product.prix}</td>
            <td> ${product.qte}</td>
            <td> ${product.tva}</td>
            <td> ${product.totalp}</td>
            <td><button onclick="supprimer('${product.des}')" style='background-color:transparent;border:0;'><i style='color:red;background-color:transparent;' class="h3 fas fa-trash-alt btnt"></i></button></td></tr>
            `);
            updateTotalPrice();
            $('#des').val("");
            $('#qte').val("");
            $('#prix').val("");
            $('#tva').val("");
            

    // alert('produit ajouter')
    }
}

    $('#fresh').on('click',function(){
        location.reload();
    });

    $('#invoice-table').on('click','.btnt',removeProduit);
    function removeProduit(){
        var index=$(this).closest('tr').index();
        // Products.splice(index,1);
        console.log(Products)
        // console.log(index);
        $(this).closest('tr').remove(); 
        updateTotalPrice();
    }

    function updateTotalPrice(){
        var TotalTva=0;
        var TotalHt=0;
        var TotalTtc=0;
        Products.forEach(function(item){
            TotalTva+=item.ttva;
            TotalHt+=item.ht;
            TotalTtc+=item.totalp;
            $('#ttva').text(TotalTva+'DH');
            $('#tht').text(TotalHt+'DH');
            $('#ttc').text(TotalTtc+'DH');
        })
    }

    $('#imprimer').on('click',generateInvoice);
    function generateInvoice(){
        var TotalTva=0;
        var TotalHt=0;
        var TotalTtc=0;
        var invoice=`<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Facture Gratuit</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <style>
            body{margin-top:20px;
        background-color:#eee;
        }
        
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }
        </style>
        </head>
        <body>
        
        <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                
                                <div class="mb-4">
                                   <h2 class="mb-1 text-muted">Worfac.com</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> contact@worfac.com</p>
                                    <p><i class="uil uil-phone me-1"></i> +212 642439557</p>
                                </div>
                            </div>
        
                            <hr class="my-4">
        
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Facturé à:</h5>
                                        <h5 class="font-size-15 mb-2">${client['societe']}</h5>
                                        <p class="mb-1">${client['adresse']}</p>
                                        <p class="mb-1">${client['email']}</p>
                                        <p>${client['telephone']}</p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">No Facture:</h5>
                                            <p>${client['numf']}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Date Facture:</h5>
                                            <p>${client['date']}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            
                            <div class="py-2">
                                <h5 class="font-size-15">Récapitulatif de la commande</h5>
        
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="">Produit</th>
                                                <th>Prix unitaire</th>
                                                <th>Qte</th>
                                                <th>Tva</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead><!-- end thead -->
                                        <tbody>`;
                Products.forEach(function(el){

                    invoice+=`<tr>
                    <th scope="row">${el.des}</th>
                    <td>
                        <div>
                            <h5 class="text-truncate font-size-14 mb-1">${el.prix} DH</h5>
                        </div>
                    </td>
                    <td>${el.qte}</td>
                    <td>${el.tva}</td>
                    <td class="text-end">${el.totalp} DH</td>
                </tr>`;
                    TotalTva+=el.ttva;
                    TotalHt+=el.ht;
                    TotalTtc+=el.totalp;
                });
                // updateTotalPrice();
                invoice+=`<tr>
                <th scope="row" colspan="4" class="text-end">Total HT</th>
                <td class="text-end">${TotalHt} DH</td>
            </tr>
            <!-- end tr -->
            
            <tr>
                <th scope="row" colspan="4" class="border-0 text-end">
                   Total TVA</th>
                <td class="border-0 text-end">${TotalTva} DH</td>
            </tr>
            <!-- end tr -->
            <tr>
                <th scope="row" colspan="4" class="border-0 text-end">Total TTC</th>
                <td class="border-0 text-end"><h5 class="m-0 fw-semibold">${TotalTtc} DH</h5></td>
            </tr>
            <!-- end tr -->
        </tbody><!-- end tbody -->
    </table>
</div>
        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                <!-- <a href="#" class="btn btn-primary w-md">Send</a> -->
                            </div>
                        </div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>`;
                         
var popup = window.open("", "_blank");
  popup.document.open();
  popup.document.write(invoice);
  popup.document.close();                                      
    }
    

// })