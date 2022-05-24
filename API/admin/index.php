<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">   
    <title>Dashboard Eco-Recycle +</title>
    <style>
        .bg-indigo{
            background-color: rgb(3, 8, 71);
        }
        .text-indigo{
            color: rgb(3, 8, 71);
        }
        .search-class{
            display: none;
        }
        .cursor{
            cursor: pointer;
        }
        .btn:focus {
            box-shadow: none;
        }
        .list-group-item a{
            color: white;
        }
        .list-group-item:hover{
            background-color: white;
        }
        .list-group-item:hover .nav-link{
            color: rgb(3, 8, 71);
        }
        .menu-title{
            color: white;
        }
        .row{
          background-color: rgba(117, 224, 135, 0.329);
        }
        .border-0{
            background-color: rgb(5, 71, 3);
        }
        .card2{
          background-color: rgb(3, 8, 71);
        }

    </style>
</head>
<body>
    <div class="row no-getters">
        <?php include "sidebar.php" ; ?>
        <!--content-->
        <div class="col-xl-10 col-md-9 col-sm-12" id="content">
            <nav class="navbar  navbar-light bg-transparent" id="navbar">
                <a class="navbar-brand fixed" id="toggler"><span class="fa fa-bars text-indigo"></span></a>
                <div class="btn-group bg-transparent" id="icons">
                    <button class="btn bg-transparent border-0 search-btn"><span class="fa fa-search text-indigo"></span></button>
                    <button class="btn bg-transparent border-0"><span class="fa fa-user text-indigo"></span></button>
                </div>
                    <!--
                        search 
                    -->
                   <div class="form-group search-class w-100 mt-2" id="search">
                        <div class="input-group shadow-sm">
                            <div class="input-group-prepend">
                                <button class="btn bg-indigo text-white"><span class="fa fa-search"></span></button>
                            </div>
                            <input type="text" placeholder="search" class="form-control">
                            <div class="input-group-append">
                                <button class="btn bg-indigo text-white search-btn"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                   </div>
            </nav>
            <div class="row my-3 mx-3 bg-transparent">
                <div class="col-md-3">
                    <div class="card1 bg-light shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="index.php" class="nav-link">Accueil</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 text-indigo text-center border-0 cursor">
                    <h5><a href="assets/pages/pageproduits.php" class="nav-link">Produits en stock</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card1 shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="assets/pages/pagecommandes.php" class="nav-link">Commandes</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card  shadow-sm p-3 text-indigo text-center border-0 cursor">
                        <h5><a href="assets/pages/pageparametre.php" class="nav-link">Paramètres</a></h5>
                    </div>
                </div>
            </div>
            <!-- <div class="row my-3 mx-3 bg-transparent">
                <div class="col-md-3">
                    <div class="card bg-indigo shadow-sm p-3 text-white text-center border-0 cursor">
                       <h5> <span class="fa fa-home" href="index.html"></span> Accueil</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm p-3 text-indigo text-center border-0 cursor">
                        <h5><span class="fa fa-users"></span> produits en stock</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-indigo shadow-sm p-3 text-white text-center border-0 cursor">
                        <h5><span class="fa fa-columns"></span> commandes</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm p-3 text-indigo text-center border-0 cursor">
                        <h5><span class="fa fa-cogs"></span> PARAMETRE</h5>
                    </div>
                </div>
            </div> -->
            <!--Charts-->
            <!-- <div class="row my-3 mx-3">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm" style="height: 300px;">
                        <div id="xyChart" style="height: 300px;"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm" style="height: 300px;">
                    <div id="pieChart" style="height: 300px;"></div>
                    </div>
                </div>
            </div> -->
            <!--table-->
            
             <?php
            $prod = "SELECT* FROM produit LEFT JOIN user ON produit.vendeur = user.id ";
            $resultat = mysqli_query($conn, $prod);
            
        
              if (mysqli_num_rows($resultat) > 0) {
                // output data of each row
      ?>

            <div class="row1 bg-transparent">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body p-0">
                    <center><h4 class="card-title1 text-black">PRODUITS SOUMIS</h4></center>
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr class="border-0">
    
                            <th class="border-0 text-white">id</th>
                            <th class="border-0 text-white">Image</th>
                            <th class="border-0 text-white">Nom du produit</th>
                            <th class="border-0 text-white">Quantité</th>
                            <th class="border-0 text-white">Nom du Vendeur</th>
                            <th class="border-0 text-white">Contact du Vendeur</th>
                            <th class="border-0 text-white"></th>
                            </tr>
                          </thead>
                          <tbody>
                               <?php
                           $i = 1;
                          while ($ro = mysqli_fetch_assoc($resultat)) { // boucle
                          
                          $idp = $ro['id'];
                          $ty = $ro['intitule'];
                            $qte = $ro['quantite'];
                            $dte = $ro['dateCreated'];
                            $vendeur = $ro['vendeur'];
                            $nom =$ro['nom'];
                            $pre = $ro['prenom'];
                            $email = $ro['email'];
                          
                            $sq = "SELECT * FROM produit WHERE id ='$idp' ";
                            $resulta = dbQuery($sq);
                            while ($rowat = mysqli_fetch_assoc($resulta)) { 
                            // $rowat = dbFetchAssoc($resulta);
                            $img = $rowat['image'];
                          
                            
                            // $img = $ro['image'];
                            
                ?>
                                                    <tr>
                         
                                                        <td><?php echo $i ; ?> </td>
                                                        <td class="py-1">
                                                        <img src="<?php echo "../../".$img ;  ?>" alt="image" style="height: 50px;"/></td>
                                                        <td> <?php echo $ty ; ?></td>
                                                        <td><?php echo $qte." Kg" ; ?></td>
                                                        <td> <?php echo $nom." ".$pre ; ?></td>
                                                        <td><?php echo $email ; ?></td>
                                                        <td><a href="assets/pages/pagemodifier.php?idp=<?php echo $idp;?>" class="nav-link"><span class=""></span> Modifier</a>
                                                            </td>
                                                    </tr>
                                                     <?php
                        $i++;
                        }
                        //fin de la boucle
                          
                          } else {
                            echo "0 results";
                          }
?>
                                                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
 
    <footer class="footer">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
            </div>
          </div>
        </div>
      </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="piechart.js"></script>
<script src="xychart.js"></script>
<script>
    $(document).ready(function(){
        $("#toggler").click(function(){
            $("#side-bar").toggle(500);
            $("#content").toggleClass("col-xl-12");
            $("#navbar").toggleClass("shadow-sm");
        });

        $(".search-btn").click(function(){
            $("#search").toggleClass("search-class");
            $("#icons").toggle();
        });
    })
</script>
</body>
</html>