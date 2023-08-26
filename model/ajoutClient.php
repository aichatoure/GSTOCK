<?php
include 'connexion.php';

if (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
   
    ) {
    $sql= "INSERT INTO $nom_base_de_donnee.client(nom, prenom, telephone, adresse)
       VALUES (?, ?, ?, ?)";

       $req = $connexion->prepare($sql);

       $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse']

       ));

       if ($req->rowCount()!=0) {
        $_SESSION['message']['text']= "client ajouté avec succés";
        $_SESSION['message']['type']= "success";
       }else {
        $_SESSION['message']['text']= "une erreur s'est produite lors de l'ajout du client";
        $_SESSION['message']['type']= "danger";
       }

}else {
    $_SESSION['message']['text']=  "une information obligatoire non renseignéé";
    $_SESSION['message']['type']= "danger";
} 

header('Location:../vue/client.php');