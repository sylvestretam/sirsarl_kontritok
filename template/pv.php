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
            <h1 class="m-0">ACTIVATION</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb -float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content sect_list_pv">

      <div class="container-fluid">

        <div class="card">
          
            <div class="card-header">

                <div class="row">
                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> TOTAL </span>
                            <span class="info-box-number"> <?= $TotalActivation ?> </span>

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
                            <span class="info-box-text"> PVs </span>
                            <span class="info-box-number"> <?= $NbreActivation ?> </span>

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
                            <span class="info-box-text"> Moyenne </span>
                            <span class="info-box-number"> <?= $moyenne ?> </span>

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
                        <span class="info-box-text"> LAST ACTIVATION </span>
                        <span class="info-box-number"> <?= $lastActivation->date_activation ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                          <?= $lastActivation->total ?>
                        </span>
                        </div>
                    </div>
                </div>
                </div>

            </div>

            <div class="card-body">

              <div div="row text-right p-2">
                <button class="btn btn-dark btn-md font-weight-bold" onclick="back('.sect_list_pv','.sect_prospect')"> <i class="fas fa-plus"></i> ACTIVATION </button>
              </div>

              <table class="table table-bordered tableordered table-stripper">

                  <thead>
                      <tr>
                          <th> Type </th>
                          <th> Point de Vente </th>
                          <th> Commande </th>
                          <th> Activation </th>
                          <th> ... </th>
                      </tr>
                  </thead>

                  <tbody class='fts'>
                  <?php
                      foreach ($pvs as $pv) {
                    ?>

                      <tr>
                          <td> 
                            <?= $pv->type ?> 
                          </td>
                          <td> 
                            <?= $pv->nom ?> 
                          </td>
                          <td> 
                            <?= $pv->Prospect->Commande->total ?> 
                          </td>
                          <td> 
                            <?= $pv->activation->total ?> 
                          </td>
                          <td>
                            <button class="btn btn-sm btn-default" onclick="showPV('<?=$pv->code_pv?>')">
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

    <section class="content sect_prospect invisible">

      <div class="container-fluid">

        <div class="card">
          
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_prospect','.sect_list_pv');">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">

              <table class="table table-bordered tableordered table-stripper">

                  <thead>
                      <tr>
                          <th> Date de Prospection </th>
                          <th> Prospect </th>
                          <th> contact </th>
                          <th> adresse </th>
                          <th> ... </th>
                      </tr>
                  </thead>

                  <tbody class='fts'>
                  <?php
                      foreach ($prospects as $p) {
                        if( $p->status != "ACTIVE" ){
                    ?>

                      <tr>
                          <td> 
                            <?= $p->date_prospection ?> 
                          </td>
                          <td> 
                            <?= $p->noms ?> 
                          </td>
                          <td> 
                            <?= $p->contact ?> 
                          </td>
                          <td> 
                            <?= $p->adresse ?> 
                          </td>
                          <td>
                            <button class="btn btn-sm btn-default" onclick="showProspectActivation('<?=$p->prospection_id?>')">
                              <i class="fas fa-search"></i>
                            </button>  
                          </td>
                      </tr>

                    <?php
                        }
                      }
                    ?>
                  </tbody>

              </table>

            </div>
        </div>

      </div>

    </section>

    <section class="content sect_activation invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_activation','.sect_prospect');">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">
              
              <div class="row">
                
                <div class="col-6  mx-auto">

                  <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Prospect</h3>
                    </div>

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

                          </tbody>
                        </table>

                      </div>

                    </div>
                  </div>

                </div>

                <div class="col-6  mx-auto">

                  <form action="./?action=activationpv&subaction=save" method="post">
                    <input type="hidden" class="form-control prospect_id" name="prospection_id">
                    <div class="card card-dark">
                      <div class="card-header">
                          <h3 class="card-title">ACTIVATION</h3>
                      </div>

                      <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Nom : </label>
                                <input type="text" class="form-control nom" name="nom_pv" required>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Type : </label>
                                <input type="text" class="form-control type" name="type_pv" required>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Date Activation : </label>
                                <input type="date" class="form-control" name="date_activation" required>
                            </div>
                        </div>

                        <div class="row border p-1 mb-1">
                            <div class="form-group col-3">
                                <label for="codeprojet"> Article : </label>
                                <select class="form-control" id="article">
                                  <?php
                                    foreach ($articles as $article) {
                                  ?>
                                      <option value='<?= $article->code?>'> <?= $article->designation?> </option>
                                  <?php
                                    }
                                  ?>
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <label for=""> Quantite : </label>
                                <input type="number" min="1" step="1" class="form-control type" id="quantite">
                            </div>

                            <div class="form-group col-3">
                                <label for=""> Unite : </label>
                                <select class="form-control" id="unite">
                                <?php
                                  foreach ($unites_stocks as $unite) {
                                ?>
                                  <option value='<?= $unite->code_unite?>'> <?= $unite->designation?> </option>
                                <?php
                                  }
                                ?>
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <label for="valeur"> Valeur : </label>
                                <input type="number" min="1" step="1" class="form-control" id="valeur">
                            </div>

                            <div class="form-group col-12 text-center">
                                <button type="button" class="btn btn-dark btn-sm font-weight-bold" onclick="addLigneActivation()"> AJOUTER <i class="fas fa-arrow-down"></i></button>
                            </div>

                            <div class="form-group col-12">
                                <input type="text"  class="form-control activation" disabled>
                                <input type="hidden"  class="form-control activation" name="ligne_activation">
                            </div>
                        </div>

                        <div class="row border p-1">

                          <div class="col-12 text-center">
                            <span class=""> ACTIVATION </span>
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

                            <tbody class='fts ligne_activation'>

                            </tbody>
                          </table>

                        </div>

                      </div>

                      <div class="card-footer text-center">
                          <button type="submit" class="btn btn-md btn-dark font-weight-bold"> <i class="fas fa-save"></i> ENREGISTRER </button>
                      </div>
                    
                    </div>
                  </form>

                </div>

              </div>

            </div>
          </div>

        </div>
        
    </section>

    <section class="content sect_mod_pv invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_mod_pv','.sect_list_pv');">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">
              
              <div class="row">
                
                <div class="col-6  mx-auto">

                  <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Prospect</h3>
                    </div>

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
                  </div>

                </div>

                <div class="col-6  mx-auto">

                  <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ACTIVATION</h3>

                        <div class="card-tools">
                          <form action='./?action=activationpv&subaction=delete' method='POST'>
                            <input type="hidden" class="form-control code_pv" name="code_pv">
                            <input type="hidden" class="form-control prospect" name="prospection_id">
                            <button type="submit" class="btn btn-sm btn-secondary font-weight-bold">
                                <i class="fas fa-trash"></i> SUPPRIMER
                            </button>
                          </form>
                        </div>

                    </div>

                    <div class="card-body">

                      <div class="row">
                          <div class="form-group col-6">
                              <label for="codeprojet"> Nom : </label>
                              <input type="text" class="form-control nom" disabled>
                          </div>

                          <div class="form-group col-6">
                              <label for=""> Contact </label>
                              <input type="text" class="form-control type" disabled>
                          </div>

                          <div class="form-group col-6">
                              <label for=""> Date Activation </label>
                              <input type="date" class="form-control date_activation" disabled>
                          </div>
                      </div>

                      <div class="row border m-1 p-1">

                        <div class="col-12 text-center">
                          <span class=""> ACTIVATION : </span>
                          <span class="font-weight-bold total_activation"> 00 </span>
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

                          <tbody class='fts tablistligneactivation'>

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
        
    </section>
  
  </div>

<script>
  const pvs = <?= json_encode($pvs) ?>;
  const prospects = <?= json_encode($prospects) ?>;
  // alert(pvs);
</script>

<?php require('template/import/foot.php'); ?>

