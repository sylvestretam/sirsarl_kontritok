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
            <h1 class="m-0">VENTE POINT DE VENTE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb -float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content sect_list_ft invisible">

        <div class="container-fluid">

          <div class="card">

            <div class="card-header">

              <div class="row">
                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> TOTAL </span>
                            <span class="info-box-number"> <?= $TotalVente ?> </span>

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
                            <span class="info-box-text"> Nbre de Vente </span>
                            <span class="info-box-number"> <?= $NbreVente ?> </span>

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
                          <span class="info-box-text"> MOYENNE VENTE </span>
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
                        <span class="info-box-text"> LAST VENTE </span>
                        <span class="info-box-number"> <?= $lastVente->date_vente ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                          <?= $lastVente->valeur_total ?> 
                        </span>
                        </div>
                    </div>
                </div>

              </div>

            </div>

            <div class="card-body">

              <div class="row">
                <button type="button" class="btn btn-md btn-dark btn-flat font-weight-bold" onclick="back('.sect_list_ft','.sect_add')">
                  <i class="fas fa-plus"></i> AJOUTER
                </button>
              </div>

              <table class="table table-bordered tableordered">

                  <thead>
                      <tr>
                          <th> POINT DE VENTE </th>
                          <th> Réalisation(Qte) </th>
                          <th> Réalisation(Valeur) </th>
                          <th> ... </th>
                      </tr>
                  </thead>

                  <tbody class='fts'>
                      <?php
                          foreach ($pvs as $pv) {
                      ?>

                      <tr>
                          <td> 
                            <?= $pv->nom ?> 
                          </td>

                          <td>
                            <?= $pv->qte_ventes ?>
                          </td>

                          <td>
                            <?= $pv->valeur_ventes ?>
                          </td>

                          <td>
                              <a class="btn btn-sm btn-default" href="./?action=ventepv&pv=<?=$pv->code_pv?>">
                              <i class="fas fa-search"></i>
                              </a>  
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

    <section class="content sect_list_vente invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">

              <div class="row">
                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> TOTAL </span>
                            <span class="info-box-number"> <?= $TotalVente ?> </span>

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
                            <span class="info-box-text"> Nbre de Date </span>
                            <span class="info-box-number"> <?= $NbreVente ?> </span>

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
                            <span class="info-box-text"> MOYENNE VENTE </span>
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
                        <span class="info-box-text"> LAST VENTE </span>
                        <span class="info-box-number"> <?= $lastVente->date_vente ?> </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 00%"></div>
                        </div>
                        <span class="progress-description">
                          <?= $lastVente->valeur_total ?> 
                        </span>
                        </div>
                    </div>
                </div>

              </div>

            </div>

            <div class="card-body">

              <div class="row">
                <p class="h3"> <?= $sel_pv->nom ?> </p>
              </div>

              <table class="table table-bordered tableordered">
                <thead>
                    <tr>
                        <th> Date </th>
                        <th> Volume </th>
                        <th> Valeur </th>
                        <th> ... </th>
                    </tr>
                </thead>

                <tbody class='fts'>
                  <?php
                        foreach ($ventespv as $vente) {
                    ?>

                    <tr>
                        <td> 
                          <?= $vente->date_vente ?> 
                        </td>

                        <td>
                          <?= $vente->quantite ?>
                        </td>

                        <td>
                          <?= $vente->valeur_total ?>
                        </td>


                        <td>
                          <button class="btn btn-sm btn-default" onclick="showVentePV('<?= $vente->vente_id ?>')">
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

    <section class="content sect_det_vente invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_det_vente','.sect_list_vente')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>

              <div class="card-tools">
                <form action="./?action=ventepv&subaction=deleteVente" method="POST">
                  <input type="hidden" class="form-control vente_id" name="vente_id">
                  <button type="submit" class="btn btn-sm btn-dark font-weight-bold">
                    <i class="fas fa-trash"></i> SUPPRIMMER
                  </button>
                </form>
              </div>
            </div>

            <div class="card-body">
              
              <div class="row">
                  <div class="form-group col-6">
                      <label for="codeprojet"> Date </label>
                      <input type="text" class="form-control date_vente" disabled>
                  </div>

                  <div class="form-group col-6">
                      <label for=""> Valeur Total</label>
                      <input type="text" class="form-control valeur_total" disabled>
                  </div>
              </div>

              <div class="row border m-1 p-1">
                <div class="col-12 text-center">
                  <span class="font-weight-bold display-5"> ARTICLE </span>
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

                  <tbody class='fts tablistlignevente'>

                  </tbody>

                </table>
              </div>

            </div>
          </div>

        </div>
        
    </section>

    <section class="content sect_add invisible">

        <div class="container-fluid">

          <div class="card">

            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_add','.sect_list_ft')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">
              
              <div class="row">
                
                <div class="col-md-10  mx-auto">

                  <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">VENTE POINT DE VENTE</h3>
                    </div>

                    <form action='./?action=ventepv&subaction=save' method='POST'>
                      <div class="card-body">

                        <div class="row">
                          <div class="form-group col-6">
                              <label for="codeprojet"> Date de Vente </label>
                              <input type="date" class="form-control" name="date_vente" required>
                          </div>

                          <div class="form-group col-6">
                            <label for=""> POINT DE VENTE </label>
                            <select class="form-control select2" style="width: 100%;" name="point_vente" required>
                              <option disabled selected> Choississez Un Point de Vente </option>
                              <?php
                                foreach ($pvs as $pv) {
                              ?>
                                <option value='<?= $pv->code_pv?>'> <?= $pv->nom ?> </option>
                              <?php
                                }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="row border m-1 p-1">

                            <div class="col-12 text-center p-1">
                                <span class="font-weight-bold display-5"> ARTICLES </span>
                            </div>

                            <div class="form-group col-3">
                              <label for="interet"> Article </label>
                              <select class="form-control" id="article">
                                <!-- <option disabled selected> Article </option> -->
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
                              <label for="quantite"> Quantite </label>
                              <input type="number" min="1" class="form-control" id="quantite">
                            </div>

                            <div class="form-group col-3">
                              <label for="unite"> Unité </label>
                              <select class="form-control" id="unite">
                          
                                <!-- <option disabled selected> Unité </option> -->
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
                              <label for="valeur"> Valeur </label>
                              <input type="number" min="1" step="1" class="form-control" id="valeur">
                            </div>

                            <div class="form-group col-4 mx-auto">
                              <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneVenteFT()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                            </div>

                            <div class="form-group col-12">
                                <input type="text" class="form-control ligne_vente" disabled>
                                <input type="hidden" class="form-control ligne_vente" name="ligne_vente">
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

                                <tbody class='fts lignevente'>

                                </tbody>
                            </table>

                        </div>

                      </div>

                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-dark font-weight-bold"> 
                          <i class="fas fa-save"></i> ENREGISTRER
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
  const ventespv = <?= json_encode($ventespv) ?>
</script>

<?php require('template/import/foot.php'); ?>

<script>
  <?php
    if(!empty($_REQUEST['pv'])){
  ?>
    $('.sect_list_vente').removeClass('invisible');
  <?php
    }else{
  ?>
    $('.sect_list_ft').removeClass('invisible');
  <?php
    }
  ?>
</script>
