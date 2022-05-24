<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">   
    <title>Admin template</title>
    <style>
        .bg-indigo{
            background-color: indigo;
        }
        .text-indigo{
            color: #4b0082;
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
            color: indigo;
        }
        .card-header{
            background-color: indigo;
        }
        .row1{
            background-color: indigo;  
        }
        .card-title1{
            background-color: indigo;
        }
        .border-0{
            background-color: blue;
        }
    </style>
</head>
<body>
    
    



        <div class="row1">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body p-0">
                  <h4 class="card-title1 text-white">LISTE DES PRODUITS </h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr class="border-0">

                        <th class="border-0 text-white">Identifiant du produit</th>
                        <th class="border-0 text-white">Image</th>
                        <th class="border-0 text-white">Nom du produit</th>
                        <th class="border-0 text-white">Quantité</th>
                        <th class="border-0 text-white">Prix</th>
                        <th class="border-0 text-white">Temps de commande</th>
                        <th class="border-0 text-white">Contact Client</th>
                        <th class="border-0 text-white">Statut</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                         
                                                        <td>id000001 </td>
                                                        <td class="py-1">
                                                        <img src="../images/img1.jpeg" alt="image" style="height: 50px;"/></td>
                                                        <td> tomates</td>
                                                        <td>5kg</td>
                                                        <td> 7500fr</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>patricia@gmail.com</td>
                                                        
                                                        <td><span class="badge-dot badge-brand mr-1"></span>En Transit </td>
                                                    </tr>
                                                    <tr>
                                                        <td>id000002 </td>
                                                        <td class="py-1">
                                                        <img src="../images/img1.jpeg" alt="image" style="height: 50px;"/></td>
                                                        <td> tomates</td>
                                                        <td>5kg</td>
                                                        <td> 7500fr</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>patricia@gmail.com</td>
                                                        
                                                        <td><span class="badge-dot badge-brand mr-1"></span>Livrée </td>
                                                    </tr>
                                                    <tr>
                                                    <td>id000003 </td>
                                                        <td class="py-1">
                                                        <img src="../images/img1.jpeg" alt="image" style="height: 50px;"/></td>
                                                        <td> tomates</td>
                                                        <td>5kg</td>
                                                        <td> 7500fr</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>patricia@gmail.com</td>
                                                        
                                                        <td><span class="badge-dot badge-brand mr-1"></span>En Transit </td>
                                                    </tr>
                                                    <tr>
                                                    <td>id000004 </td>
                                                        <td class="py-1">
                                                        <img src="../images/img1.jpeg" alt="image" style="height: 50px;"/></td>
                                                        <td> tomates</td>
                                                        <td>5kg</td>
                                                        <td> 7500fr</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>patricia@gmail.com</td>
                                                        
                                                        <td><span class="badge-dot badge-brand mr-1"></span>Livrée </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">Voir les détails</a></td>
                                                    </tr>
                      </tbody>
                    </table>
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