<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Confirmation d'achat</h2>
    <p>Merci {{ $confirmationAchat['membre']->prenom }} {{ $confirmationAchat['membre']->nom }} pour votre achat a Chimax.store</p>
    <ul>
      <li><strong>Produit</strong> : {{ $confirmationAchat['produitNomRecup'] }}</li>
      <li><strong>Quantité</strong> : {{ $confirmationAchat['quantitee'] }}</li>
      <li><strong>Prix Unitaire</strong> : {{ $confirmationAchat['prixUnitaire'] }}</li>
      <li><strong>Prix Total</strong> : {{ $confirmationAchat['prixTotal'] }}</li>
    </ul>
    <p>Transaction effectué à {{ $confirmationAchat['dateFormater'] }}</p>
  </body>
</html>