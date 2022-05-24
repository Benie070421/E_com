<?=
session_start();
ob_start();
require_once 'API/database/connexion.php';
require_once "session.php";
?>
<main>
        <div class="container">
            <div class="main-body">

                <!-- /Breadcrumb -->
            
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                                    <div class="avatar">
                                        <div class="avatar__letters">
                                            <!-- The letters -->
                                            <?php
                                            echo substr($row['prenom'],0,1)."".substr($row['nom'],0,1);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h4><?php echo $row['prenom']." ".$row['nom']; ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $row['email']; ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $row['localite']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom et prénoms</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $row['prenom']." ".$row['nom']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Genre</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['genre'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $row['contact']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['email']; ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn" style="background-color: #FF220C;" href="editprofil.php">Modifier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- justified tabs  -->
        <!-- ============================================================== -->
        <div class="col pt-4 pb-4 mb-3" style="background-color:#d9ebc4;">
            
            <div class="tab-regular">
            <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                    <li class="nav-item" style="margin-right: 0;">
                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Mes produits achetées</a>
                    </li>
                    <li class="nav-item" style="margin-right: 0;">
                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Mes produits vendus</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent7">
                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                                <!-- Section Clients -->
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                             
                                            <table class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Article</th>
                                                        <th>Montant</th>
                                                        <th>Commandé le</th>
                                                        <th>Livré le</th>
                                                        <th>Statut</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
    	$sql = "SELECT * FROM commande WHERE client ='$id' ";
      $result = dbQuery($sql);
      
while( $row = dbFetchAssoc($result )) {

  //recupere l'id du produit commander
  $id_pro= $row["produit"];
  $da = $row["dateCommande"];
  $dat = $row["dateLivraison"];
//selectionne tout les produit dont l'id est egale a l'id recuperer
  $sql = "SELECT * FROM produit WHERE id ='$id_pro' ";
  $resulta = dbQuery($sql);
  $rowa = dbFetchAssoc($resulta );
  $type = $rowa['intitule'];
  $prix = $rowa['prix'];
  $image= $rowa['image'];
  $qte = $rowa["quantite"];
  $id_co = $rowa["id"];
  $cout = $qte * $prix;
//   $id_etat = $row["etat_commande"];
//   $sql = "SELECT * FROM etat_commande WHERE id ='$id_etat' ";
//   $resulteta = dbQuery($sql);
//   $rowet = dbFetchAssoc($resulteta );
//   $etat= $rowet['intitulé'];

	?> 
                                                    <tr>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>">1</a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>">
                                                            <img src="imageProduits/<?= $image; ?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $type; ?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $prix; ?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $da; ?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $dat; ?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><span class="badge bg-success">Active</span></a></td>
                                                    </tr>
                                                    <?php
}
?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    
                    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                        <!-- Section Clients -->
                        
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                            <table class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Article</th>
                                                        <th>Quantité du stock</th>
                                                        <th>Date de publication</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM produit WHERE vendeur ='$id' ";
                                                    $resultv = dbQuery($sql);
                                                    $rowev = dbFetchAssoc($resultv);
                                                    
                                                ?>
                                                <?php while( $rowev = dbFetchAssoc($resultv )) {
                                                    ?>
                                                    <tr>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>">
                                                            <img src="<?php echo $rowev['image']?>" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $rowev['type']?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $rowev['quantité_stock']?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><?php echo $rowev['created_at']?></a></td>
                                                        <td><a href="facture.php?ide=<?php echo $row['id'];?>"><span class="badge bg-success">Active</span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end justified tabs  -->
        <!-- ============================================================== -->

    </main>