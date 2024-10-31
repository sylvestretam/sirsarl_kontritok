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
            <h1 class="m-0">MAGASIN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content sect_list_magasin">

      <div class="container-fluid">

        <div class="card">
          
            <div class="card-header">

                <div class="row">
                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> RECEPTION </span>
                            <span class="info-box-number"> <?= $TotalReception ?> </span>

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
                            <span class="info-box-text"> SORTIE </span>
                            <span class="info-box-number"> <?= $TotalSortie = $TotalSortieFT + $TotalSortiePV ?> </span>

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
                            <span class="info-box-text"> RETOUR </span>
                            <span class="info-box-number"> <?= $TotalRetour = $TotalRetourFT + $TotalRetourPV ?> </span>

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
                        <span class="info-box-text"> STOCK </span>
                        <span class="info-box-number"> <?= $TotalReception - $TotalSortie + $TotalRetour ?> </span>

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
                
                <!-- <table class="table table-bordered tableordered table-stripper">

                    <thead>
                        <tr>
                            <th> Code </th>
                            <th> designation </th>
                            <th> Reception </th>
                            <th> Sortie </th>
                            <th> Retour </th>
                            <th> Stock </th>
                        </tr>
                    </thead>

                    <tbody class='fts tablistprospect'>
                        <?php
                            foreach ($magasins as $magasin) {
                        ?>
                            <tr>
                                <td> <?= $magasin->code ?> </td>
                                <td> <?= $magasin->designation ?> </td>
                                <td> 
                                    <?= $r = $magasin->TotalReception() ?>
                                    <button class="btn btn-sm btn-default" onclick="showReceptions('<?= $magasin->code ?>')">
                                    <i class="fas fa-search"></i>
                                    </button> 
                                </td>
                                <td> 
                                    <?= $s = $magasin->TotalSortiesFT() + $magasin->TotalSortiesPV() ?>
                                    <button class="btn btn-sm btn-default" onclick="showSorties('<?= $magasin->code ?>')">
                                    <i class="fas fa-search"></i>
                                    </button> 
                                </td>
                                <td> 
                                    <?= $re = $magasin->TotalRetourFT() + $magasin->TotalRetourPV() ?>
                                    <button class="btn btn-sm btn-default" onclick="showRetours('<?= $magasin->code ?>')">
                                    <i class="fas fa-search"></i>
                                    </button> 
                                </td>
                                <td> 
                                    <?= $r - $s + $re ?>
                                    <button class="btn btn-sm btn-default" onclick="showStock('<?= $magasin->code ?>')">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>

                </table> -->

                <table class="table table-bordered tableordered table-stripper">

                    <thead>
                        <tr>
                            <th> Article </th>
                            <th> Unite </th>
                            <th> 
                                Reception
                                <button class="btn btn-sm btn-default" onclick="showReceptions('')">
                                    <i class="fas fa-search"></i>
                                </button> 
                            </th>
                            <th> 
                                Sortie 
                                <button class="btn btn-sm btn-default" onclick="showSorties('')">
                                    <i class="fas fa-search"></i>
                                </button>
                            </th>
                            <th> 
                                Retour 
                                <button class="btn btn-sm btn-default" onclick="showRetours('')">
                                    <i class="fas fa-search"></i>
                                </button>
                            </th>
                            <th> 
                                Stock 
                                <button class="btn btn-sm btn-default" onclick="showStock('')">
                                    <i class="fas fa-search"></i>
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <tbody class='fts tablistprospect'>
                        <?php
                            foreach ($unites_articles as $unite_article) {
                        ?>
                            <tr>
                                <td> <?= $unite_article->article ?> </td>
                                <td> <?= $unite_article->unite ?> </td>
                                <td> <?= $unite_article->qte_reception ?> </td>
                                <td> <?= $unite_article->qte_sortie ?> </td>
                                <td> <?= $unite_article->qte_retour ?> </td>
                                <td> <?= $unite_article->qte_stock ?> </td>
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

    <section class="content sect_list_stock invisible">

        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <button class="btn btn-dark btn-sm font-weight-bold" onclick="back('.sect_list_stock','.sect_list_magasin')"> <i class="fas fa-arrow-left"></i> RETOUR </button>
                <span class="display-5 font-weight-bold center"> STOCK MAGASIN DISTRIBUTION </span>
            </div>

            <div class="card-body">
                
                <table class="table table-bordered tableordered table-stripper">

                    <thead>
                        <tr>
                            <th> Magasin </th>
                            <th> Article </th>
                            <th> Quantite </th>
                            <th> Unite </th>
                            <th> Valeur </th>
                        </tr>
                    </thead>

                    <tbody class='fts'>
                        <?php
                            foreach ($stock as $st) {
                        ?>
                            <tr>
                                <td> <?= $st->magasin ?> </td>
                                <td> <?= $st->article ?> </td>
                                <td> <?= $st->quantite ?> </td>
                                <td> <?= $st->unite ?> </td>
                                <td> <?= $st->valeur ?> </td>
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

    <section class="content sect_list_reception invisible">

      <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <button class="btn btn-dark btn-sm font-weight-bold" onclick="back('.sect_list_reception','.sect_list_magasin')"> <i class="fas fa-arrow-left"></i> RETOUR </button>
            
                <div class="card-tools">
                    <button class="btn btn-dark btn-sm font-weight-bold" onclick="back('.sect_list_reception','.sect_add_reception')"> <i class="fas fa-plus"></i> NOUVEAU </button>
                </div>
            </div>

            <div class="card-body">
                
                <table class="table table-bordered tableordered table-stripper">

                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Magasin </th>
                            <th> Quantite </th>
                            <th> ... </th>
                        </tr>
                    </thead>

                    <tbody class='fts tablistprospect'>
                        <?php
                            foreach ($receptions as $reception) {
                        ?>
                            <tr>
                                <td> <?= $reception->date_reception ?> </td>
                                <td> <?= $reception->magasin ?> </td>
                                <td> 
                                    <?= $reception->quantite ?>
                                </td>
                                <td> 
                                    <button class="btn btn-sm btn-default" onclick="showReception('<?= $reception->reception_id ?>')">
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

    <section class="content sect_add_reception invisible">

        <div class="container-fluid">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_add_reception','.sect_list_reception')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">
              
              <div class="row">
                
                <div class="col-md-8  mx-auto">

                  <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">RECEPTION</h3>
                        
                    </div>

                    <form action='./?action=magasin&subaction=saveReception' method='POST'>
                      <!-- <input type="hidden" class="form-control magasin" name="magasin"> -->
                      <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Date de Reception </label>
                                <input type="date" class="form-control" name="date_reception" required>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Magasin </label>
                                <!-- <input type="text" class="form-control magasin" disabled> -->
                                <select class="form-control" name="magasin">
                                <!-- <option disabled selected> Article </option> -->
                                <?php
                                  foreach ($magasins as $magasin) {
                                ?>
                                <option value='<?= $magasin->code?>'> <?= $magasin->designation?> </option>
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
                              <label for="interet"> Quantite </label>
                              <input type="number" min="1" class="form-control" id="quantite">
                            </div>

                            <div class="form-group col-3">
                              <label for="interet"> Unité </label>
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
                              <label for="interet"> Valeur </label>
                              <input type="number" min="1" step="1" class="form-control" id="valeur">
                            </div>

                            <div class="form-group col-4 mx-auto">
                              <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneReception()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                            </div>

                            <div class="form-group col-12">
                                <input type="text" class="form-control reception" disabled>
                                <input type="hidden" class="form-control reception" name="ligne_reception">
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

                                <tbody class='fts lignereception'>

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

    <section class="content sect_mod_reception invisible">

        <div class="container-fluid">

          <div class="card card-tools">
            <div class="card-header">
              <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_mod_reception','.sect_list_reception')">
                <i class="fas fa-arrow-left"></i> RETOUR
              </button>
            </div>

            <div class="card-body">
              
              <div class="row">
                
                <div class="col-md-8  mx-auto">

                  <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">RECEPTION</h3>
                        <div class="card-tools">
                            <form action='./?action=magasin&subaction=deleteReception' method='POST'>
                                <input type="hidden" class="form-control reception_id" name="reception_id">
                                <button class="btn btn-dark btn-sm font-weight-bold"> <i class="fas fa-minus"></i> SUPPRIMER </button>
                            </form>
                        </div>
                    </div>

                    
                    <div class="card-body">

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="codeprojet"> Date de Reception </label>
                            <input type="date" class="form-control date_recpetion" name="date" disabled>
                        </div>

                        <div class="form-group col-6">
                            <label for=""> Magasin </label>
                            <input type="text" class="form-control magasin" disabled>
                        </div>

                    </div>

                    <div class="row border m-1 p-1">

                        <div class="col-12 text-center p-1">
                            <span class="font-weight-bold display-5"> ARTICLES </span>
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

                            <tbody class='fts lignereception'>

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

                    </div>

                  </div>

                </div>

              </div>

            </div>
          </div>

        </div>
        
    </section>

    <section class="content sect_list_sortie invisible">

      <div class="container-fluid">
        <div class="row py-4">
            <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_sortie','.sect_list_magasin')">
                <i class="fas fa-arrow-left"></i> RETOUR
            </button>
        </div>

        <div class="row">

            <div class="col-6 p-1 mx-auto sect_list_sortie_ft">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">MAGASIN <i class="fas fa-arrow-right"></i> SUPERVISEUR </h3>
                        <div class="card-tools">
                            <button class="btn btn-secondary btn-sm font-weight-bold" onclick="back('.sect_list_sortie_ft','.sect_add_sortie_ft')"> 
                                <i class="fas fa-plus"></i> AJOUTER 
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered tableordered table-stripper">

                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Magasin </th>
                                    <th> SUPERVISEUR </th>
                                    <th> Quantite </th>
                                    <th> ... </th>
                                </tr>
                            </thead>

                            <tbody class='fts tablistprospect'>
                                <?php
                                    foreach ($sortiesft as $sortie) {
                                ?>
                                    <tr>
                                        <td> <?= $sortie->date_sortie ?> </td>
                                        <td> <?= $sortie->magasin ?> </td>
                                        <td> <?= $sortie->food_trucker ?> </td>
                                        <td> 
                                            <?= $sortie->quantite ?>
                                        </td>
                                        <td> 
                                            <button class="btn btn-sm btn-default" onclick="showSortieFT('<?= $sortie->sortie_id ?>')">
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

            <!-- <div class="col-6 p-1 mx-auto animation__transtop invisible sect_add_sortie_ft">
                <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-secondary font-weight-bold" onclick="back('.sect_add_sortie_ft','.sect_list_sortie_ft')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>
                        <div class="card-tools">
                            <h3 class="card-title"> MAGASIN <i class="fas fa-arrow-right"></i> SUPERVIEUR </h3>
                        </div>
                    </div>

                        
                    <form action='./?action=magasin&subaction=saveSortieFT' method='POST'>
                        <input type="hidden" class="form-control magasin" name="magasin">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="codeprojet"> Date de Sortie </label>
                                    <input type="date" class="form-control" name="date_sortie" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for=""> Magasin </label>
                                    <select class="form-control" name="magasin">
                                        <?php
                                            foreach ($magasins as $magasin) {
                                        ?>
                                            <option value='<?= $magasin->code?>'> <?= $magasin->designation?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-8 mx-auto">
                                    <label for=""> Superviseur </label>
                                    <select class="form-control select2" name="food_trucker">
                                    <option disabled selected> Choississez Un Superviseur </option>
                                    <?php
                                    foreach ($superviseurs as $superviseur) {
                                    ?>
                                    <option value='<?= $superviseur->employee?>'> <?= $superviseur->noms ?> </option>
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
                                <select class="form-control" id="articlesft">
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
                                <label for="quantitesft"> Quantite </label>
                                <input type="number" min="1" class="form-control" id="quantitesft">
                                </div>

                                <div class="form-group col-3">
                                <label for="interet"> Unité </label>
                                <select class="form-control" id="unitesft">
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
                                    <label for="valeursft"> Valeur </label>
                                    <input type="number" min="1" step="1" class="form-control" id="valeursft">
                                </div>

                                <div class="form-group col-4 mx-auto">
                                    <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneSortieFT()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                                </div>

                                <div class="form-group col-12">
                                    <input type="text" class="form-control sortieft" disabled>
                                    <input type="hidden" class="form-control sortieft" name="ligne_sortieft">
                                </div>

                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th> Article </th>
                                            <th> Quantite </th>
                                            <th> Unité </th>
                                            <th> Valeur </th>
                                            <th> ... </th>
                                        </tr>
                                    </thead>

                                    <tbody class='fts lignesortieft'>

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
            </div> -->

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_add_sortie_ft">
                <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-secondary font-weight-bold" onclick="back('.sect_add_sortie_ft','.sect_list_sortie_ft')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>
                        <div class="card-tools">
                            <h3 class="card-title"> MAGASIN <i class="fas fa-arrow-right"></i> SUPERVIEUR </h3>
                        </div>
                    </div>
                        
                    <form action='./?action=magasin&subaction=saveSortieFT' method='POST'>
                        <input type="hidden" class="form-control magasin" name="magasin">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="codeprojet"> Date de Sortie </label>
                                    <input type="date" class="form-control" name="date_sortie" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for=""> Magasin </label>
                                    <select class="form-control" name="magasin">
                                        <?php
                                            foreach ($magasins as $magasin) {
                                        ?>
                                            <option value='<?= $magasin->code?>'> <?= $magasin->designation?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-8 mx-auto">
                                    <label for=""> Superviseur </label>
                                    <select class="form-control select2" name="food_trucker">
                                        <option disabled selected> Choississez Un Superviseur </option>
                                        <?php
                                        foreach ($superviseurs as $superviseur) {
                                        ?>
                                        <option value='<?= $superviseur->employee?>'> <?= $superviseur->noms ?> </option>
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
                                <select class="form-control" id="articlesft">
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
                                <label for="quantitesft"> Quantite </label>
                                <input type="number" min="1" class="form-control" id="quantitesft">
                                </div>

                                <div class="form-group col-3">
                                <label for="interet"> Unité </label>
                                <select class="form-control" id="unitesft">
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
                                    <label for="valeursft"> Valeur </label>
                                    <input type="number" min="1" step="1" class="form-control" id="valeursft">
                                </div>

                                <div class="form-group col-4 mx-auto">
                                    <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneSortieFT()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                                </div>

                                <div class="form-group col-12">
                                    <input type="text" class="form-control sortieft" disabled>
                                    <input type="hidden" class="form-control sortieft" name="ligne_sortieft">
                                </div>

                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th> Article </th>
                                            <th> Quantite </th>
                                            <th> Unité </th>
                                            <th> Valeur </th>
                                            <th> ... </th>
                                        </tr>
                                    </thead>

                                    <tbody class='fts lignesortieft'>

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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_mod_sortie_ft">
                <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-secondary font-weight-bold" onclick="back('.sect_mod_sortie_ft','.sect_list_sortie_ft')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>

                        <span class="lead font-weight-bold center"> MAGASIN <i class="fas fa-arrow-right"></i> SUPERVIEUR </span>

                        <div class="card-tools">
                            <form action='./?action=magasin&subaction=deleteSortieFT' method='POST'>
                                <input type="hidden" class="form-control sortie_id" name="sortie_id">
                                <button class="btn btn-secondary btn-sm font-weight-bold"> <i class="fas fa-minus"></i> SUPPRIMER </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Date de Sortie </label>
                                <input type="date" class="form-control date_sortie" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Magasin </label>
                                <input type="text" class="form-control magasin" disabled>
                            </div>

                            <div class="form-group col-8 mx-auto">
                                <label for=""> SUPERVISEUR </label>
                                <input type="text" class="form-control food_trucker" disabled>
                            </div>

                        </div>

                        <div class="row border m-1 p-1">

                            <div class="col-12 text-center p-1">
                                <span class="font-weight-bold display-5"> ARTICLES </span>
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

                                <tbody class='fts lignesortieft'>

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>  
            </div>

            <div class="col-6 p-1 mx-auto sect_list_sortie_pv">
                <div class="card card-secondary">
                
                    <div class="card-header">
                        <h3 class="card-title">MAGASIN <i class="fas fa-arrow-right"></i> POINTS DE VENTE</h3>
                        <div class="card-tools">
                            <button class="btn btn-dark btn-sm font-weight-bold" onclick="back('.sect_list_sortie_pv','.sect_add_sortie_pv')"> 
                                <i class="fas fa-plus"></i> AJOUTER 
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered tableordered table-stripper">

                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> magasin </th>
                                    <th> Point de Vente </th>
                                    <th> Valeur </th>
                                    <th> ... </th>
                                </tr>
                            </thead>

                            <tbody class='fts tablistprospect'>
                                <?php
                                    foreach ($sortiespv as $sortie) {
                                ?>
                                    <tr>
                                        <td> <?= $sortie->date_sortie ?> </td>
                                        <td> <?= $sortie->magasin ?> </td>
                                        <td> <?= $sortie->point_de_vente ?> </td>
                                        <td> 
                                            <?= $sortie->Total() ?>
                                        </td>
                                        <td> 
                                            <button class="btn btn-sm btn-default" onclick="showSortiePV('<?= $sortie->sortie_id ?>')">
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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_add_sortie_pv">
                <div class="card card-secondary">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_add_sortie_pv','.sect_list_sortie_pv')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>
                        <div class="card-tools">
                            <h3 class="card-title"> MAGASIN <i class="fas fa-arrow-right"></i> POINT DE VENTE</h3>
                        </div>
                    </div>

                        
                    <form action='./?action=magasin&subaction=saveSortiePV' method='POST'>
                        <!-- <input type="hidden" class="form-control magasin" name="magasin"> -->
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="codeprojet"> Date de Sortie </label>
                                    <input type="date" class="form-control" name="date_sortie" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for=""> Magasin </label>
                                    <!-- <input type="text" class="form-control magasin" disabled> -->
                                    <select class="form-control" name="magasin">
                                    <!-- <option disabled selected> Article </option> -->
                                    <?php
                                        foreach ($magasins as $magasin) {
                                    ?>
                                        <option value='<?= $magasin->code?>'> <?= $magasin->designation?> </option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group col-8 mx-auto">
                                    <label for=""> Point de Vente </label>
                                    <select class="form-control" name="point_de_vente">
                                    <?php
                                    foreach ($pvs as $pv) {
                                    ?>
                                    <option value='<?= $pv->code_pv ?>'> <?= $pv->nom ?> </option>
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
                                <label for="articlepv"> Article </label>
                                <select class="form-control" id="articlepv">
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
                                <label for="quantitepv"> Quantite </label>
                                <input type="number" min="1" class="form-control" id="quantitepv">
                                </div>

                                <div class="form-group col-3">
                                <label for="unitespv"> Unité </label>
                                <select class="form-control" id="unitepv">
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
                                    <label for="valeurspv"> Valeur </label>
                                    <input type="number" min="1" step="1" class="form-control" id="valeurpv">
                                </div>

                                <div class="form-group col-4 mx-auto">
                                    <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneSortiePV()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                                </div>

                                <div class="form-group col-12">
                                    <input type="text" class="form-control sortiepv" disabled>
                                    <input type="hidden" class="form-control sortiepv" name="ligne_sortiepv">
                                </div>

                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th> Article </th>
                                            <th> Quantite </th>
                                            <th> Unité </th>
                                            <th> Valeur </th>
                                            <th> ... </th>
                                        </tr>
                                    </thead>

                                    <tbody class='fts lignesortiepv'>

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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_mod_sortie_pv">
                <div class="card card-secondary">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_mod_sortie_pv','.sect_list_sortie_pv')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>

                        <span class="lead font-weight-bold center"> MAGASIN <i class="fas fa-arrow-right"></i> POINT DE VENTE</span>

                        <div class="card-tools">
                            <form action='./?action=magasin&subaction=deleteSortiePV' method='POST'>
                                <input type="hidden" class="form-control sortiepv_id" name="sortiepv_id">
                                <button class="btn btn-dark btn-sm font-weight-bold"> <i class="fas fa-minus"></i> SUPPRIMER </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Date de Sortie </label>
                                <input type="date" class="form-control date_sortiepv" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Magasin </label>
                                <input type="text" class="form-control magasin" disabled>
                            </div>

                            <div class="form-group col-8 mx-auto">
                                <label for=""> Point de Vente </label>
                                <input type="text" class="form-control pv" disabled>
                            </div>

                        </div>

                        <div class="row border m-1 p-1">

                            <div class="col-12 text-center p-1">
                                <span class="font-weight-bold display-5"> ARTICLES </span>
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

                                <tbody class='fts lignesortiepv'>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>  
            </div>

        </div>

      </div>

    </section>

    <section class="content sect_list_retour invisible">

      <div class="container-fluid">
        <div class="row py-4">
            <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_retour','.sect_list_magasin')">
                <i class="fas fa-arrow-left"></i> RETOUR
            </button>
        </div>
        <div class="row">

            <div class="col-6 p-1 sect_list_retour_ft">
                <div class="card card-dark">
                
                    <div class="card-header">
                        <h3 class="card-title">MAGASIN <i class="fas fa-arrow-left"></i> SUPERVISEUR </h3>
                        <div class="card-tools">
                            <button class="btn btn-secondary btn-sm font-weight-bold" onclick="back('.sect_list_retour_ft','.sect_add_retour_ft')"> 
                                <i class="fas fa-plus"></i> AJOUTER 
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered tableordered table-stripper">

                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Magasin </th>
                                    <th> SUPPERVISEUR </th>
                                    <th> Quantite </th>
                                    <th> ... </th>
                                </tr>
                            </thead>

                            <tbody class='fts tablistprospect'>
                                <?php
                                    foreach ($retoursft as $retour) {
                                ?>
                                    <tr>
                                        <td> <?= $retour->date_retour ?> </td>
                                        <td> <?= $retour->magasin ?> </td>
                                        <td> <?= $retour->food_trucker ?> </td>
                                        <td> 
                                            <?= $retour->quantite ?>
                                        </td>
                                        <td> 
                                            <button class="btn btn-sm btn-default" onclick="showRetourFT('<?= $retour->retour_id ?>')">
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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_add_retour_ft">
                <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-secondary font-weight-bold" onclick="back('.sect_add_retour_ft','.sect_list_retour_ft')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>
                        <div class="card-tools">
                            <h3 class="card-title"> MAGASIN <i class="fas fa-arrow-right"></i> SUPERVISEUR </h3>
                        </div>
                    </div>

                        
                    <form action='./?action=magasin&subaction=saveRetourFT' method='POST'>
                        <!-- <input type="hidden" class="form-control magasin" name="magasin"> -->
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="date_retour"> Date de Retour </label>
                                    <input type="date" class="form-control" name="date_retour" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for=""> Magasin </label>
                                    <select class="form-control" name="magasin">
                                        <?php
                                            foreach ($magasins as $magasin) {
                                        ?>
                                            <option value='<?= $magasin->code?>'> <?= $magasin->designation?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-8 mx-auto">
                                    <label for=""> SUPERVISEUR </label>
                                    <select class="form-control select2" name="food_trucker">
                                        <option disabled selected> Choississez Un Superviseur </option>
                                        <?php
                                        foreach ($superviseurs as $superviseur) {
                                        ?>
                                        <option value='<?= $superviseur->employee?>'> <?= $superviseur->noms ?> </option>
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
                                <label for="articlespv"> Article </label>
                                <select class="form-control" id="articlerft">
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
                                <label for="quantiterft"> Quantite </label>
                                <input type="number" min="1" class="form-control" id="quantiterft">
                                </div>

                                <div class="form-group col-3">
                                <label for="uniterft"> Unité </label>
                                <select class="form-control" id="uniterft">
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
                                    <label for="valeurrft"> Valeur </label>
                                    <input type="number" min="1" step="1" class="form-control" id="valeurrft">
                                </div>

                                <div class="form-group col-4 mx-auto">
                                    <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneRetourFT()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                                </div>

                                <div class="form-group col-12">
                                    <input type="text" class="form-control retourft" disabled>
                                    <input type="hidden" class="form-control retourft" name="ligne_retourft">
                                </div>

                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th> Article </th>
                                            <th> Quantite </th>
                                            <th> Unité </th>
                                            <th> Valeur </th>
                                            <th> ... </th>
                                        </tr>
                                    </thead>

                                    <tbody class='fts ligneretourft'>

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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_mod_retour_ft">
                <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-secondary font-weight-bold" onclick="back('.sect_mod_retour_ft','.sect_list_retour_ft')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>

                        <span class="lead font-weight-bold center"> MAGASIN <i class="fas fa-arrow-right"></i> SUPERVISEUR </span>

                        <div class="card-tools">
                            <form action='./?action=magasin&subaction=deleteRetourFT' method='POST'>
                                <input type="hidden" class="form-control retour_idrft" name="retour_id">
                                <button class="btn btn-secondary btn-sm font-weight-bold"> <i class="fas fa-minus"></i> SUPPRIMER </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Date de Sortie </label>
                                <input type="date" class="form-control date_retourrft" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Magasin </label>
                                <input type="text" class="form-control magasinrft" disabled>
                            </div>

                            <div class="form-group col-8 mx-auto">
                                <label for=""> SUPERVISEUR </label>
                                <input type="text" class="form-control food_truckerrft" disabled>
                            </div>

                        </div>

                        <div class="row border m-1 p-1">

                            <div class="col-12 text-center p-1">
                                <span class="font-weight-bold display-5"> ARTICLES </span>
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

                                <tbody class='fts ligneretourrft'>

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>  
            </div>

            <div class="col-6 p-1 sect_list_retour_pv">
                <div class="card card-secondary">
                
                    <div class="card-header">
                        <h3 class="card-title">MAGASIN <i class="fas fa-arrow-left"></i> Point de Vente</h3>
                        <div class="card-tools">
                            <button class="btn btn-dark btn-sm font-weight-bold" onclick="back('.sect_list_retour_pv','.sect_add_retour_pv')"> 
                                <i class="fas fa-plus"></i> AJOUTER 
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered tableordered table-stripper">

                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Magasin </th>
                                    <th> Point de Vente </th>
                                    <th> valeur </th>
                                    <th> ... </th>
                                </tr>
                            </thead>

                            <tbody class='fts tablistprospect'>
                            <?php
                                    foreach ($retourspv as $retour) {
                                ?>
                                    <tr>
                                        <td> <?= $retour->date_retour ?> </td>
                                        <td> <?= $retour->magasin ?> </td>
                                        <td> <?= $retour->point_de_vente ?> </td>
                                        <td> 
                                            <?= $retour->Total() ?>
                                        </td>
                                        <td> 
                                            <button class="btn btn-sm btn-default" onclick="showRetourPV('<?= $retour->retour_id ?>')">
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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_add_retour_pv">
                <div class="card card-secondary">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_add_retour_pv','.sect_list_retour_pv')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>
                        <div class="card-tools">
                            <h3 class="card-title"> MAGASIN <i class="fas fa-arrow-right"></i> POINT DE VENTE</h3>
                        </div>
                    </div>

                        
                    <form action='./?action=magasin&subaction=saveRetourPV' method='POST'>
                        <!-- <input type="hidden" class="form-control magasin" name="magasin"> -->
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="codeprojet"> Date de Sortie </label>
                                    <input type="date" class="form-control" name="date_retour" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for=""> Magasin </label>
                                    <select class="form-control" name="magasin">
                                        <?php
                                            foreach ($magasins as $magasin) {
                                        ?>
                                            <option value='<?= $magasin->code?>'> <?= $magasin->designation?> </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-8 mx-auto">
                                    <label for=""> Point de Vente </label>
                                    <select class="form-control" name="point_de_vente">
                                    <?php
                                    foreach ($pvs as $pv) {
                                    ?>
                                    <option value='<?= $pv->code_pv ?>'> <?= $pv->nom ?> </option>
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
                                <label for="articlepv"> Article </label>
                                <select class="form-control" id="articlerpv">
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
                                    <label for="quantitepv"> Quantite </label>
                                    <input type="number" min="1" class="form-control" id="quantiterpv">
                                </div>

                                <div class="form-group col-3">
                                    <label for="unitespv"> Unité </label>
                                    <select class="form-control" id="uniterpv">
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
                                    <label for="valeurspv"> Valeur </label>
                                    <input type="number" min="1" step="1" class="form-control" id="valeurrpv">
                                </div>

                                <div class="form-group col-4 mx-auto">
                                    <span class="btn btn-dark btn-block font-weight-bold" onclick="addLigneRetourPV()"> AJOUTER <i class="fas fa-arrow-down"></i> </span>
                                </div>

                                <div class="form-group col-12">
                                    <input type="text" class="form-control retourpv" disabled>
                                    <input type="hidden" class="form-control retourpv" name="ligne_retourpv">
                                </div>

                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th> Article </th>
                                            <th> Quantite </th>
                                            <th> Unité </th>
                                            <th> Valeur </th>
                                            <th> ... </th>
                                        </tr>
                                    </thead>

                                    <tbody class='fts ligneretourpv'>

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

            <div class="col-6 p-1 mx-auto animation__transtop invisible sect_mod_retour_pv">
                <div class="card card-secondary">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_mod_retour_pv','.sect_list_retour_pv')">
                            <i class="fas fa-arrow-left"></i> RETOUR
                        </button>

                        <span class="lead font-weight-bold center"> MAGASIN <i class="fas fa-arrow-right"></i> POINT DE VENTE</span>

                        <div class="card-tools">
                            <form action='./?action=magasin&subaction=deleteRetourPV' method='POST'>
                                <input type="hidden" class="form-control retour_idrpv" name="retour_id">
                                <button class="btn btn-dark btn-sm font-weight-bold"> <i class="fas fa-minus"></i> SUPPRIMER </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="codeprojet"> Date de Sortie </label>
                                <input type="date" class="form-control date_retourpv" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Magasin </label>
                                <input type="text" class="form-control magasinrpv" disabled>
                            </div>

                            <div class="form-group col-8 mx-auto">
                                <label for=""> Point de Vente </label>
                                <input type="text" class="form-control pvrpv" disabled>
                            </div>

                        </div>

                        <div class="row border m-1 p-1">

                            <div class="col-12 text-center p-1">
                                <span class="font-weight-bold display-5"> ARTICLES </span>
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

                                <tbody class='fts ligneretourpv'>

                                </tbody>
                            </table>

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
    const receptions = <?= json_encode($receptions) ?>;
    const sortiesFT = <?= json_encode($sortiesft) ?>;
    const retoursFT = <?= json_encode($retoursft) ?>;
    const sortiesPV = <?= json_encode($sortiespv) ?>;
    const retoursPV = <?= json_encode($retourspv) ?>;
</script>
<?php require('template/import/foot.php'); ?>
