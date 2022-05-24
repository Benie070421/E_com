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
        <!--sidebar-->
        <div class="col-xl-2 col-md-3 col-sm-12" id="side-bar">
            <ul class="list-group list-group-flush fixed shadow-sm bg-indigo" >
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link  text-center">
                    <img src="../images/img5.jpeg" class="shadow" style="height: 100px; width: 100px;border-radius: 50%;">
                    <h5>AXOU</h5>
                    <div class="small"><em>ADMIN</em></div>
                </a></li>
                <li class="nav-item-produit">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                      <i class="mdi mdi-palette menu-icon"></i>
                      <span class="menu-title"><span class="fa fa-tasks"></span> Gestion des produits</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link text-white" href="pageproduits.php">produits en stock </a></li>
                        <li class="nav-item"> <a class="nav-link text-white" href="pagecommandes.php">commandes</a></li>
                      </ul>
                    </div>
                </li>
                <!-- <li class="list-group-item bg-indigo "><a href="#" class="nav-link"><span class="fa fa-home"></span> </a></li> -->
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link"><span class="fa fa-table"></span> Gestion des Administrateur</a></li>
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link"><span class="fa fa-cogs"></span> PARAMETRE</a></li>
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link"><span class="fa fa-users"></span> </a></li>
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link"><span class="fa fa-bars"></span> </a></li>
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link"><span class="fa fa-columns"></span> </a></li>
                <li class="list-group-item bg-indigo "><a href="#" class="nav-link"></span> </a></li>

            </ul>
        </div>
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
                    <h5><a href="../../index.html" class="nav-link">Accueil</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm p-3 text-indigo text-center border-0 cursor">
                    <h5><a href="pageproduits.php" class="nav-link">produits en stock</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card1 shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="pagecommandes.php" class="nav-link">commandes</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm p-3 text-indigo text-center border-0 cursor">
                        <h5><a href="pageparametre.php" class="nav-link">Parametre</a></h5>
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
            <!--table-->
            <?php
            if(isset($_GET['ide'])){ //verification si on a un get
//verification si l'information get egale a l'id dans la session

$id_pro=$_GET['ide'];

$sql = "SELECT * FROM produit LEFT JOIN user
ON produit.vendeur = user.id WHERE idp ='$id_pro' ";
$resulta = dbQuery($sql);
$rowa = dbFetchAssoc($resulta );
$prod = $rowa['type'];
$imag = $rowa['image'];
$des = $rowa['description'];
$qte = $rowa['quantité_stock'];
$prix = $rowa['prix'];
$nom = $rowa['name'];
$pre = $rowa['prenom'];
$id = $rowa['idp'];
?>
            
<div class="row bg-transparent">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center"><?php echo ucfirst($prod); ?></h5>
        <img class="card-img-top" src="<?php echo "../../../".$imag; ?>" alt="Card image cap">
        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Description</h5>
        <p class="card-text"><?php echo ucfirst($des) ; ?></p>
        <!-- <a href="#" class="btn btn-primary">Modifier</a> -->
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
      <th scope="col">Nom du vendeur</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $qte."Kg" ; ?></th>
      <td><?php echo $prix."FCFA/kg"; ?></td>
      <td><?php echo $nom." ".$pre ; ?></td>
    </tr>
  </tbody>
</table>
        <center><a class="btn btn-primary" href="pagemodifier.php?idp=<?php echo $id; ?>" role="button">Modifier</a></center>
    </div>
        
    </div>
  </div>
</div>
<?php
}
?>






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