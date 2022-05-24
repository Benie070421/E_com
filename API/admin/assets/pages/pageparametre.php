<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/style.css">   
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
                    <div class="card1 shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="../../index.php" class="nav-link">Accueil</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 text-indigo text-center border-0 cursor">
                    <h5><a href="pageproduits.php" class="nav-link">Produits en stock</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card1 shadow-sm p-3 text-white text-center border-0 cursor">
                    <h5><a href="pagecommandes.php" class="nav-link">Commandes</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm p-3 text-indigo text-center border-0 cursor">
                        <h5><a href="assets/pages/pageparametre.php" class="nav-link">Paramètre</a></h5>
                    </div>
                </div>
            </div>
            


            <div class="container-fluid light-style flex-grow-1 container-p-y">

<!-- <h4 class="font-weight-bold py-3 mb-4">
  Account settings
</h4> -->

<div class="card overflow-hidden">
  <div class="row no-gutters row-bordered row-border-light">
    <div class="col-md-3 pt-0">
      <div class="list-group list-group-flush account-settings-links">
        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
        <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a> -->
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane fade active show" id="account-general">

          <div class="card-body media align-items-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" height=100px alt="" class="d-block ui-w-80">
            <div class="media-body ml-4">
              <label class="btn btn-outline-primary">
                Télécharger une nouvelle photo
                <input type="file" class="account-settings-fileinput">
              </label> &nbsp;
              <!-- <button type="button" class="btn btn-default md-btn-flat">Reset</button> -->

              <div class="text-black small mt-1">Recommander JPG, GIF et PNG. Taille maximale 800K</div>
            </div>
          </div>
          <hr class="border-light m-0">

          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Prénom</label>
              <input type="text" class="form-control mb-1" value="nmaxwell">
            </div>
            <div class="form-group">
              <label class="form-label">Nom</label>
              <input type="text" class="form-control" value="Nelle Maxwell">
            </div>
            <div class="form-group">
              <label class="form-label">E-mail</label>
              <input type="text" class="form-control mb-1" value="nmaxwell@mail.com">
              <div class="alert alert-warning mt-3">
               votre email n'est pas confirmé. svp consulter votre boite mail.<br>
                <a href="javascript:void(0)">Renvoyer la confirmation</a>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Ecorecycle+</label>
              <input type="text" class="form-control" value="Dashboard.">
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="account-change-password">
          <div class="card-body pb-2">

            <div class="form-group">
              <label class="form-label">Mot de passe actuel</label>
              <input type="password" class="form-control">
            </div>

            <div class="form-group">
              <label class="form-label">Nouveau mot de passe</label>
              <input type="password" class="form-control">
            </div>

            <div class="form-group">
              <label class="form-label">Confirmer mot de passe</label>
              <input type="password" class="form-control">
            </div>

          </div>
        </div>
        <div class="tab-pane fade" id="account-info">
          <div class="card-body pb-2">

            <div class="form-group">
              <label class="form-label">Bio</label>
              <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
            </div>
            <div class="form-group">
              <label class="form-label">B</label>
              <input type="text" class="form-control" value="May 3, 1995">
            </div>
            <div class="form-group">
              <label class="form-label">Pays</label>
              <select class="custom-select">
                <option>USA</option>
                <option selected="">Côte d'Ivoire</option>
                <option>UK</option>
                <option>Germany</option>
                <option>France</option>
              </select>
            </div>


          </div>
          <hr class="border-light m-0">
          <div class="card-body pb-2">

            <h6 class="mb-4">Contacts</h6>
            <div class="form-group">
              <label class="form-label">Téléphone</label>
              <input type="text" class="form-control" value="+0 (123) 456 7891">
            </div>
            <div class="form-group">
              <label class="form-label">Website</label>
              <input type="text" class="form-control" value="">
            </div>

          </div>
  
        </div>
        <!-- <div class="tab-pane fade" id="account-social-links">
          <div class="card-body pb-2">

            <div class="form-group">
              <label class="form-label">Twitter</label>
              <input type="text" class="form-control" value="https://twitter.com/user">
            </div>
            <div class="form-group">
              <label class="form-label">Facebook</label>
              <input type="text" class="form-control" value="https://www.facebook.com/user">
            </div>
            <div class="form-group">
              <label class="form-label">Google+</label>
              <input type="text" class="form-control" value="">
            </div>
            <div class="form-group">
              <label class="form-label">LinkedIn</label>
              <input type="text" class="form-control" value="">
            </div>
            <div class="form-group">
              <label class="form-label">Instagram</label>
              <input type="text" class="form-control" value="https://www.instagram.com/user">
            </div>

          </div>
        </div> -->
        <!-- <div class="tab-pane fade" id="account-connections">
          <div class="card-body">
            <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
          </div>
          <hr class="border-light m-0">
          <div class="card-body">
            <h5 class="mb-2">
              <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
              <i class="ion ion-logo-google text-google"></i>
              You are connected to Google:
            </h5>
            nmaxwell@mail.com
          </div>
          <hr class="border-light m-0">
          <div class="card-body">
            <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
          </div>
          <hr class="border-light m-0">
          <div class="card-body">
            <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
          </div>
        </div> -->
        <!-- <div class="tab-pane fade" id="account-notifications">
          <div class="card-body pb-2">

            <h6 class="mb-4">Activity</h6>

            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Email me when someone comments on my article</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Email me when someone answers on my forum thread</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Email me when someone follows me</span>
              </label>
            </div>
          </div>
          <hr class="border-light m-0">
          <div class="card-body pb-2">

            <h6 class="mb-4">Application</h6>

            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">News and announcements</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Weekly product updates</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Weekly blog digest</span>
              </label>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="text-right mt-3">
  <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
  <button type="button" class="btn btn-default">Cancel</button>
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