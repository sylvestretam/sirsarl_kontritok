<?php require('template/import/head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php require('template/import/navbar.php'); ?>
  <?php require('template/import/aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">PROSPECTION</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb -float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content sect_list_food_trucker">

      <div class="container-fluid">

        <div class="card">
          
            <div class="card-header">

                <div class="row">
                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> TARGET </span>
                            <span class="info-box-number"> <?= $t = $TotalTarget ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                            BTL
                        </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-secondary">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> REALISATION </span>
                            <span class="info-box-number"> <?= $r = sizeof($prospects) ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                            BTL
                        </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> ECART </span>
                            <span class="info-box-number"> <?= $r - $t ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                            BTL
                        </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-dark">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text"> COMMANDE </span>
                        <span class="info-box-number"> <?= $TotalCommande ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                            BTL
                        </span>
                        </div>
                    </div>
                </div>
                </div>

            </div>

            <div class="card-body">
              <table class="table table-bordered tableordered table-stripper">

                  <thead>
                      <tr>
                          <th> MD </th>
                          <th> Target </th>
                          <th> Réalisation </th>
                          <th> Ecart </th>
                          <th> Commande </th>
                          <th> ... </th>
                      </tr>
                  </thead>

                  <tbody class='fts'>
                    <?php
                      foreach ($food_truckers as $food_trucker) {
                        $TotalCommande = array_reduce($food_trucker->prospects,function($carry, $object){ return  $carry+($object->Commande->total);},0);
                    ?>

                      <tr>
                          <td> 
                            <?= $food_trucker->noms ?> 
                          </td>
                          <td>
                            <?= $t= $food_trucker->target_prospection * sizeof($presences_fts) ?>
                          </td>
                          <td>
                            <?= $r=sizeof($food_trucker->prospects) ?> 
                          </td>
                          <td>
                            <?= - $t + $r ?> 
                          </td>
                          <td>
                            <?= $TotalCommande ?> 
                          </td>
                          <td>
                            <button class="btn btn-sm btn-default" onclick="showFTProspects('<?=$food_trucker->employee?>')">
                              <i class="fas fa-search"></i>
                            </button>  
                          </td>
                      </tr>

                    <?php
                      }
                    ?>
                  </tbody>

              </table>
            </div>
        </div>

      </div>

    </section>

    <section class="content sect_list_propect invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_propect','.sect_list_food_trucker')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>

              <!-- <div class="card-tools">
                <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_propect','.sect_add_propect')">
                  <i class="fas fa-plus"></i> NOUVEAU
                </button>
              </div> -->

            </div>

            <div class="card-body">

                <div class="row">

                </div>

                <table class="table table-bordered table-stripper">

                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Noms et Prénoms </th>
                            <th> Contact </th>
                            <th> Adresse </th>
                            <th> Nom PV </th>
                            <th> Type PV </th>
                            <th> Commande </th>
                            <th> Status </th>
                            <th> ... </th>
                        </tr>
                    </thead>

                    <tbody class='fts tablistprospect'>

                    </tbody>


                </table>

            </div>
            
          </div>

        </div>
        
    </section>

    <section class="content sect_list_rapport invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">

              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_rapport','.sect_list_food_trucker')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>

            </div>

            <div class="card-body">

                <div class="row">

                </div>

                <table class="table table-bordered table-stripper">

                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> target </th>
                            <th> prospection </th>
                            <th> Observation </th>
                        </tr>
                    </thead>

                    <tbody class='fts tablistrapports'>

                        <tr class="pointer">
                            <td> 10/10/2010 </td>
                            <td> 10 </td>
                            <td> 10 </td>
                            <td> Observation Observation Observation Observation Observation </td>
                        </tr>

                    </tbody>


                </table>

            </div>
            
          </div>

        </div>
        
    </section>

    <section class="content sect_mod_propect invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_mod_propect','.sect_list_propect')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">
              
              <div class="row">
                
                <div class="col-md-8  mx-auto">

                  <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Modifier Contrat</h3>
                        <div class="card-tools">
                          <form action='./?action=prospection&subaction=delete' method='POST'>
                            <input type="hidden" class="form-control prospect_id" name="prospect_id">
                            <button type="submit" class="btn btn-sm btn-dark font-weight-bold">
                                <i class="fas fa-trash"></i> SUPPRIMER
                            </button>
                          </form>
                        </div>
                    </div>

                    <form action='./?action=prospection&subaction=updateStatus' method='POST'>
                      <input type="hidden" class="form-control prospect_id" name="prospect_id">
                      <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Noms </label>
                                <input type="text" class="form-control noms" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Contact </label>
                                <input type="text" class="form-control contact" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Adresse </label>
                                <input type="text"  step="1" class="form-control adresse" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> date de prospection </label>
                                <input type="date" class="form-control date_prospection"  disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Nom du Point de Vente </label>
                                <input type="text"  step="1" class="form-control nom_point_de_vente" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Type du Point de Vente </label>
                                <input type="text"  step="1" class="form-control type_point_de_vente" disabled>
                            </div>
                        </div>

                        <div class="row border m-1 p-1">

                          <div class="col-12 text-center">
                            <span class=""> COMMANDE : </span>
                            <span class="font-weight-bold total_commande"> COMMANDE </span>
                          </div>

                          <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th> Article </th>
                                    <th> Quantite </th>
                                    <th> Unité </th>
                                    <th> Valeur </th>
                                </tr>
                            </thead>

                            <tbody class='fts tablistlignecommande'>

                                <tr>
                                    <td> HEMLE POULET</td>
                                    <td> 10 </td>
                                    <td> paquet </td>
                                    <td> 10 000 </td>
                                </tr>
                                <tr>
                                    <td> HEMLE POULET</td>
                                    <td> 10 </td>
                                    <td> paquet </td>
                                    <td> 10 000 </td>
                                </tr>

                            </tbody>
                          </table>

                        </div>

                        <div class="row border m-1 p-1 invisible">
                          <div class="col-12 text-center display-5">
                            <span> STATUS </span>
                          </div>

                          <div class="form-group col-6 text-center">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input pointer" type="radio" id="customRadio1" name="status" value="PROSPECT">
                              <label for="customRadio1" class="custom-control-label">PROSPECT</label>
                            </div>
                          </div>

                          <div class="form-group col-6 text-center">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input text-success pointer" type="radio" id="customRadio2" name="status" value="CONVERTI">
                              <label for="customRadio2" class="custom-control-label">CONVERTI</label>
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="card-footer text-center invisible">
                        <button type="submit" class="btn btn-dark font-weight-bold"> 
                          <i class="fas fa-pen"></i> MODIFIER
                        </button>
                      </div>
                    </form>

                  </div>

                </div>

              </div>

            </div>
          </div>

        </div>
        
    </section>
    
  </div>
  
</div>

<script>
  const food_truckers = <?= json_encode($food_truckers) ?>;
  const prospects = <?= json_encode($prospects) ?>;
</script>
<?php require('template/import/foot.php'); ?>
