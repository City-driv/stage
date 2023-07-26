{{-- ///////////////////////////////////////////////////////////////::::::::::::::::::::::::::::::::: --}}
{{-- 
<!DOCTYPE html>
<html>
<head>
    <title>Liste de produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <select id="produitSelect">
        @foreach ($produits as $produit)
            <option value="{{ $produit }}">{{ $produit->description }}</option>
        @endforeach
    </select>
    <input type="number" min="1" max="" id="quantiteInput" placeholder="Quantité">
    <input type="number" id="tvaInput" value="0" placeholder="TVA">
    <button onclick="ajouterProduit()">Ajouter</button>

    <h2>Produits ajoutés :</h2>
    <table id="tableProduits">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>TVA</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <h2>Total :</h2>
    <p id="total">0</p>

    <script>
        function ajouterProduit() {
            var select = document.getElementById("produitSelect");
            var produit = JSON.parse(select.value);

            var quantite = parseFloat(document.getElementById("quantiteInput").value);
            var tva = parseFloat(document.getElementById("tvaInput").value);

            var prixUnitaire = parseFloat(produit.price);
            var prix = prixUnitaire * quantite * (1 + tva / 100);

            var tableBody = document.getElementById("tableProduits").getElementsByTagName('tbody')[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            var cellNom = newRow.insertCell(0);
            var cellPrixUnitaire = newRow.insertCell(1);
            var cellQuantite = newRow.insertCell(2);
            var cellTVA = newRow.insertCell(3);
            var cellPrix = newRow.insertCell(4);

            cellNom.innerHTML = produit.description;
            cellPrixUnitaire.innerHTML = prixUnitaire;
            cellQuantite.innerHTML = quantite;
            cellTVA.innerHTML = tva + "%";
            cellPrix.innerHTML = prix.toFixed(2);

            recalculerTotal();
        }

        function recalculerTotal() {
            var total = 0;
            var table = document.getElementById("tableProduits");

            for (var i = 1; i < table.rows.length; i++) {
                total += parseFloat(table.rows[i].cells[4].innerHTML);
            }

            document.getElementById("total").innerHTML = total.toFixed(2);
        }
    </script>
</body>
</html> --}}
{{-- :::::::::::::::::::::::::::::::::::::::::: --}}
{{-- use App\Models\Produit;

public function index()
{
    $produits = Produit::all();
    return view('produits.index', compact('produits'));
} --}}
{{-- ::::::::::::::::::::::::::::::::::::::::::: --}}
{{-- public function up()
{
    Schema::table('produits', function (Blueprint $table) {
        $table->decimal('price', 8, 2)->nullable();
        $table->integer('quantite')->default(0);
        $table->decimal('tva', 5, 2)->default(0);
    });
} --}}
{{-- 
<label for="searchInput">Rechercher :</label>
<input type="text" id="searchInput" onkeyup="filtrerSelect()">
<select id="selectList">
  <option value="valeur1">Option 1</option>
  <option value="valeur2">Option 2</option>
  <option value="valeur3">Option 3</option>
  <!-- Ajoutez ici plus d'options au besoin -->
</select>

<script>
    function filtrerSelect() {
      // Récupérer la valeur saisie dans le champ d'entrée
      var recherche = document.getElementById("searchInput").value.toLowerCase();
      
      // Récupérer la liste des options de la balise select
      var options = document.getElementById("selectList").options;
      
      // Parcourir toutes les options pour les cacher ou les afficher en fonction de la recherche
      for (var i = 0; i < options.length; i++) {
        var option = options[i];
        var valeurOption = option.value.toLowerCase();
        var texteOption = option.text.toLowerCase();
        
        // Vérifier si la valeur de l'option ou son texte contient la valeur recherchée
        if (valeurOption.indexOf(recherche) > -1 || texteOption.indexOf(recherche) > -1) {
          option.style.display = ""; // Afficher l'option
        } else {
          option.style.display = "none"; // Cacher l'option
        }
      }
    }
    </script> --}}


{{-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}

<!DOCTYPE html>
<html>
<head>
    <title>Liste de produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <select id="produitSelect">
        @foreach ($produits as $produit)
            <option value="{{ $produit }}">{{ $produit->description }}</option>
        @endforeach
    </select>
    <input type="number" hidden value="1" id="quantiteInput" placeholder="Quantité">
    <button onclick="ajouterProduit()">Ajouter</button>

    <h2>Produits ajoutés :</h2>
    <table class="tableProduits">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>TVA</th>
                <th>Prix</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <h2>Total :</h2>
    <p id="total">0</p>

    <script>
        function ajouterProduit() {
            var select = document.getElementById("produitSelect");
            var produit = JSON.parse(select.value);

            var quantite = parseFloat(document.getElementById("quantiteInput").value);
            var inStock = parseFloat(produit.price);
            var tva = parseFloat(produit.tva);
            var prixUnitaire = parseFloat(produit.price);
            var prix = prixUnitaire * quantite * (1 + tva / 100);

            const tbody = document.querySelector('#tableProduits tbody');
  
  // Créer une nouvelle ligne avec les données du produit
  const newRow = document.createElement('tr');
  newRow.innerHTML = `
    <td>${produit.description}</td>
    <td>unite</td>
    <td>${prixUnitaire}</td>
    <td>${quantite}</td>
    <td>${tva}</td>
    <td>total</td>
    <td><button onclick="supprimerLigne(this)" style="background-color: transparent; border: 0;"><i style="color: red; background-color: transparent;" class="h3 fas fa-trash-alt btnt"></i></button></td>
  `;

  // Ajouter la nouvelle ligne au corps du tableau
  tbody.appendChild(newRow);
}


        //     var tableBody = document.getElementById("tableProduits").getElementsByTagName('tbody')[0];
        //     var newRow = tableBody.insertRow(tableBody.rows.length);

        //     var cellNom = newRow.insertCell(0);
        //     var cellPrixUnitaire = newRow.insertCell(1);
        //     var cellQuantite = newRow.insertCell(2);
        //     var cellTVA = newRow.insertCell(3);
        //     var cellPrix = newRow.insertCell(4);
        //     var cellSupprimer = newRow.insertCell(5);


        //     cellNom.innerHTML = produit.description;
        //     cellPrixUnitaire.innerHTML = prixUnitaire;
        //     cellQuantite.innerHTML = '<input type="number" value="' + quantite + '" onchange="calculerPrix(this, ' + prixUnitaire + ', ' + tva + ', ' + cellPrix + ')">';
        //     cellTVA.innerHTML = tva + "%";
        //     cellPrix.innerHTML = prix.toFixed(2);
        //     cellSupprimer.innerHTML = '<button onclick="supprimerLigne(this)">Supprimer</button>';

        //     recalculerTotal();
        // }

        function recalculerTotal() {
            var total = 0;
            var table = document.getElementById("tableProduits");

            for (var i = 1; i < table.rows.length; i++) {
                var prixCell = table.rows[i].cells[4];
                total += parseFloat(prixCell.innerHTML);
            }

            document.getElementById("total").innerHTML = total.toFixed(2);
        }

        function calculerPrix(inputQuantite, prixUnitaire, tva, cellPrix) {
            var quantite = parseFloat(inputQuantite.value);
            var prix = prixUnitaire * quantite * (1 + tva / 100);
            cellPrix.innerHTML = prix.toFixed(2);

            recalculerTotal();
        }

        function supprimerLigne(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            recalculerTotal();
        }
    </script>
</body>
</html>


{{-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}
<table id="invoice-table">
    <thead>
      <tr>
        <th>Nom du produit</th>
        <th>Unité</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>TVA</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- Les lignes du tableau seront ajoutées ici -->
    </tbody>
  </table>
  
  <button id="add-row-btn">Ajouter une ligne</button>

  <script>
  // Fonction pour ajouter une nouvelle ligne au tableau
  function ajouterLigneAuTableau() {
    const product = {
      des: "Produit ajouté",
      unite: "Unité",
      prix: 12.99,
      qte: 3,
      tva: 0.20,
      totalp: 38.97
    };
  
    const tbody = document.querySelector('#invoice-table tbody');
  
    // Créer une nouvelle ligne avec les données du produit
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>${product.des}</td>
      <td>${product.unite}</td>
      <td>${product.prix}</td>
      <td>${product.qte}</td>
      <td>${product.tva}</td>
      <td>${product.totalp}</td>
      <td><button onclick="supprimerLigne(this)" style="background-color: transparent; border: 0;"><i style="color: red; background-color: transparent;" class="h3 fas fa-trash-alt btnt"></i></button></td>
    `;
  
    // Ajouter la nouvelle ligne au corps du tableau
    tbody.appendChild(newRow);
  }
  
  // Fonction pour supprimer une ligne du tableau
  function supprimerLigne(button) {
    const row = button.closest('tr');
    row.remove();
  }
  
  // Écouteur d'événement pour le bouton d'ajout
  const addRowButton = document.getElementById('add-row-btn');
  addRowButton.addEventListener('click', ajouterLigneAuTableau);
</script>


{{-- :::::::::::::::::::::::::::::::: --}}
<!DOCTYPE html>
<html>
<head>
  <title>Calculateur de prix d'articles</title>
</head>
<body>
  <h1>Calculateur de prix d'articles</h1>
  
  <label for="article-select">Sélectionnez un article :</label>
  <select id="article-select">
    <option value="article1" data-price="10.00">Article 1</option>
    <option value="article2" data-price="15.00">Article 2</option>
    <option value="article3" data-price="20.00">Article 3</option>
    <!-- Ajoutez ici d'autres options pour les différents articles disponibles -->
  </select>

  <label for="quantity-input">Quantité :</label>
  <input type="number" id="quantity-input" min="1" value="1">
  <button onclick="ajouterAuTableau()">Ajouter</button>

  <h2>Articles sélectionnés :</h2>
  <table id="tableau-articles">
    <tr>
      <th>Article</th>
      <th>Prix unitaire</th>
      <th>Quantité</th>
      <th>Prix total</th>
    </tr>
  </table>

  <h2>Total prix des articles :</h2>
  <p id="total-prix"></p>

  <script>
    function ajouterAuTableau() {
      const selectElement = document.getElementById("article-select");
      const selectedArticle = selectElement.options[selectElement.selectedIndex];
      const articleName = selectedArticle.text;
      const articlePrice = parseFloat(selectedArticle.getAttribute("data-price"));
      const quantity = parseInt(document.getElementById("quantity-input").value);
      const prixTotal = (articlePrice * quantity).toFixed(2);

      const tableauArticles = document.getElementById("tableau-articles");

      // Vérifier si l'article est déjà présent dans le tableau
      const rows = tableauArticles.getElementsByTagName("tr");
      for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        if (row.cells[0].innerText === articleName) {
          // L'article existe déjà, mettre à jour la quantité et le prix total
          const quantiteCell = row.cells[2];
          const prixTotalCell = row.cells[3];
          const quantiteExistante = parseInt(quantiteCell.innerText);
          const nouveauTotal = (articlePrice * (quantiteExistante + quantity)).toFixed(2);
          quantiteCell.innerText = quantiteExistante + quantity;
          prixTotalCell.innerText = nouveauTotal;
          calculerTotalPrix();
          return;
        }
      }

      // L'article n'existe pas encore dans le tableau, l'ajouter comme nouvelle ligne
      const newRow = tableauArticles.insertRow(tableauArticles.rows.length);
      const cellArticle = newRow.insertCell(0);
      const cellPrixUnitaire = newRow.insertCell(1);
      const cellQuantite = newRow.insertCell(2);
      const cellPrixTotal = newRow.insertCell(3);

      cellArticle.innerText = articleName;
      cellPrixUnitaire.innerText = articlePrice.toFixed(2);
      cellQuantite.innerText = quantity;
      cellPrixTotal.innerText = prixTotal;

      calculerTotalPrix();
    }

    function calculerTotalPrix() {
      const tableauArticles = document.getElementById("tableau-articles");
      const rows = tableauArticles.getElementsByTagName("tr");
      let total = 0;

      for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const prixTotalCell = row.getElementsByTagName("td")[3];
        total += parseFloat(prixTotalCell.innerText);
      }

      document.getElementById("total-prix").innerText = "Total : " + total.toFixed(2);
    }
  </script>
</body>
</html>
