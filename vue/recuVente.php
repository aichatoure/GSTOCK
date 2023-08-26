<?php
include "entete.php";

$vente = null;
if (!empty($_GET['id'])) {
    $vente = getVente($_GET['id']);
    
}
$ventes = getVente();
?>
<div class="home-content">
    <div class="page">
        <div class="cote-a-cote">
            <h2>D-CLIC Stock</h2>
            <div>
                <?php if ($vente!==null){?>
            <p>Recu N° #: <?= $vente['id'] ?></p>
            <p>Date : <?=  date('d/m/Y H:i:s ', strtotime($vente['date_vente'])) ?></p>
            <?php } ?>
            </div>
            </div>
        <div class="cote-a-cote" style= "width: 50%">
        <div>
            <?php if($vente !== null) {?>
           <P>Nom : </P>
           <p><td><?= $vente['nom']." ".$vente['prenom'] ?></td></p>
           <?php }?>
            </div>
        </div>
    </div>
<div class="overview-boxes">

        <table class="mtable">
            <tr>
                <th>Article</th>
                <th>Client</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            $ventes = getVente();

            if (!empty($ventes) && is_array($ventes)) {
                foreach ($ventes as $key => $value) {
                    ?>
                    <tr>
                        <td><?= $value['nom_article'] ?></td>
                        <td><?= $value['nom']." ".$value['prenom'] ?></td>
                        <td><?= $value['quantite'] ?></td>
                        <td><?= $value['prix']?></td>
                        <td><?= date('d/m/Y H:i:s ', strtotime($value['date_vente'])) ?></td>
                        <td><a href="recuVente.php?id=<br?= $value['id'] ?/>"><i class='bx bx-receipt'></i></a></td>
                    </tr>


                    <?php
                }
            }
                ?>
        </table>
    </div>
</div>

      </div>
    </section>
    <?php
    include 'pied.php';
?>
<script>

function setPrix() {
    var article = document.querySelector('#id_article');
    var quantite = document.querySelector('#quantite');
    var prix = document.querySelector('#prix');

    var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');
    
    prix.value = Number(quantite.value)* Number(prixUnitaire);
}

</script>