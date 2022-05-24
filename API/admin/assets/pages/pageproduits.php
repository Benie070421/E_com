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
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">   
    <title>Admin template</title>
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
            color: rgb(5, 71, 3);
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
        .card1{
          background-color: rgb(3, 8, 71);
        }

    </style>
</head>
<body>
    <div class="row no-getters">
        <?php include "sidebar.php" ?>
        <!--content-->
        <div class="col-xl-10 col-md-9 col-sm-12" id="content">
            <nav class="navbar  navbar-light bg:#" id="navbar">
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
                    <div class="card1 shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="../../index.php" class="nav-link">Accueil</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm p-3 text-indigo text-center border-0 cursor">
                    <h5><a href="pageproduits.php" class="nav-link">Produits en stock</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card1 shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="pagecommandes.php" class="nav-link">Commandes</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card1 shadow-sm p-3 text-indigo text-center border-0 cursor">
                        <h5><a href="pageparametre.php" class="nav-link">Paramètres</a></h5>
                    </div>
                </div>
            </div>
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
            <?php
            $prod = "SELECT* FROM produit RIGHT JOIN user
                ON produit.vendeur = user.id ";
            $resultat = mysqli_query($conn, $prod);
        
              if (mysqli_num_rows($resultat) > 0) {
                // output data of each row
                
        
      ?>
            <!--table-->
            
            <div class="row bg-transparent">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body p-0">
                  <center><h4 class="card-title text-black">LISTE DES PRODUITS </h4></center>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr class="border-0 text-white">
                        <th>#</th>
                          <th>IMAGE</th>
                          <th>NOM DU PRODUIT</th>
                          <th>QUANTITE</th>
                          <th>PRIX</th>
                          <th>NOM DU VENDEUR</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                           $i = 1;
                          while ($ro = mysqli_fetch_assoc($resultat)) { // boucle
                         
                $ty = $ro['intitule'];
                $prix = $ro['prix'];
                $stock = $ro['quantite'];
                $img = $ro['image'];
                $vendeur = $ro['vendeur'];
                $nom =$ro['nom'];
                $pre = $ro['prenom'];
                $email = $ro['email'];
                
                ?>
                        <tr>
                            <td>
                              
                              <?php echo $i ; ?>
                            </td>
                          <td class="py-1">
                            <img src="<?php echo "../../../../../".$img ; ?>" alt="image" style="width: 55%; max-height:70px;"/>
                            
                          </td>
                          <td>
                              
                            <?php echo ucfirst($ty) ; ?>
                          </td>
                          
                          <td>
                            <?php echo $stock." Kg"; ?>
                          </td>
                          <td>
                            <?php echo $prix."FCFA/kg" ; ?>
                          </td>
                          <td>
                              
                            <?php echo $pre." ".$nom." ".$email ; ?>
                          </td>
                          <td><a href="pagesdetails.php?ide=<?php echo $ro['idp'];?>" class="nav-link"><span class=""></span> Details</a>
                                                                
                            </td>
                        </tr>
                        <?php
                        $i++;
                        } //fin de la boucle
                         
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
          </div>






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