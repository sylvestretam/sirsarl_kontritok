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
            <h1 class="m-0">Gestion Des Presences</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb -float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content sect_list_presence">

      <div class="container-fluid">
       
        <div class="card">
          
            <div class="card-header">

                <div class="row">
                <div class="col-md-3 animation__transright">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> EFFECTIFS </span>
                            <span class="info-box-number"> <?= sizeof($food_truckers) ?> </span>

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
                            <span class="info-box-text"> TAUX DE PRESENCE </span>
                            <span class="info-box-number"> <?= $TauxPresence." %" ?> </span>

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
                            <span class="info-box-text"> TAUX D'ABSENCE </span>
                            <span class="info-box-number"> <?= $TauxAbsence." %" ?> </span>

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
                        <span class="info-box-text"> LAST DATE </span>
                        <span class="info-box-number"> <?= $LastDate->date_jour."" ?> </span>

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

                <div class="row p-2 <?= ShowIFPermit("KONTRITOK_GRH_ADD") ?>">
                    <button class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_presence','.sect_add_presence')"> <i class="fas fa-plus"></i> NOUVEAU </button>
                </div>

              <table class="table table-bordered tableordered table-stripper">

                  <thead>
                      <tr>
                          <th> Date </th>
                          <th> Effectifs </th>
                          <th> Présent </th>
                          <th> Absent </th>
                          <th> Observation </th>
                          <th> ... </th>
                      </tr>
                  </thead>

                  <tbody class='fts'>
                    <?php
                        foreach ($presences_fts as $presence) {
                    ?>
                        <tr>
                            <td> <?= $presence->date_jour ?> </td>
                            <td> <?= sizeof($presence->lignes) ?> </td>
                            <td> <?= sizeof($presence->presents) ?> </td>
                            <td> <?= sizeof($presence->absents) ?> </td>
                            <td> <?= $presence->observation ?> </td>
                            <td> <button class="btn btn-sm btn-default" onclick="showPresence('<?= $presence->date_jour ?>')"> <i class="fas fa-search"></i></button> </td>
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

    <section class="content sect_list_ligne_presence invisible">

      <div class="container-fluid">
        <div class="row p-2">
            <button class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_list_ligne_presence','.sect_list_presence')"> <i class="fas fa-arrow-left"></i> RETOUR </button>
        </div>

        <div class="card">
          
            <div class="card-header">

                <h3 class="card-title"> Fiche de Présence </h3>

                <div class="card-tools <?= ShowIFPermit("KONTRITOK_GRH_SUP") ?>">
                    <form action="./?action=grh&subaction=deleteFiche" method="post">
                        <input type="hidden" class="date_jour" name="date_jour">
                        <button type="submit" class="btn btn-sm btn-dark font-weight-bold"> <i class="fas fa-trash"></i> SUPPRIMER </button>
                    </form>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="form-group col-3">
                        <label for="codeprojet"> Date </label>
                        <input type="date" class="form-control date_jour" disabled>
                    </div>
                    <div class="form-group col-3">
                        <label for="codeprojet"> Effectif </label>
                        <input type="number" class="form-control effectif" disabled>
                    </div>
                    <div class="form-group col-3">
                        <label for="codeprojet"> Présent </label>
                        <input type="number" class="form-control presents" disabled>
                    </div>
                    <div class="form-group col-3">
                        <label for="codeprojet"> Absent </label>
                        <input type="number" class="form-control absents" disabled>
                    </div>
                </div>

                <table class="table table-bordered tableordered table-stripper">

                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> MD </th>
                            <th> STATUS </th>
                        </tr>
                    </thead>

                    <tbody class='fts lignepresence'>
                    </tbody>

                </table>

            </div>

        </div>

      </div>

    </section>

    <section class="content sect_add_presence invisible">
        
      <div class="container-fluid">

        <div class="row p-2">
            <button class="btn btn-sm btn-dark font-weight-bold" onclick="back('.sect_add_presence','.sect_list_presence')"> <i class="fas fa-arrow-left"></i> RETOUR </button>
        </div>

        <form action="./?action=grh&subaction=addFiche" method="post">
            <div class="card">
            
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for=""> Date </label>
                            <input type="date" class="form-control" name="date_jour">
                        </div>

                        <div class="form-group col-6">
                            <label for=""> Observation </label>
                            <input type="text" class="form-control" name="observation">
                        </div>
                        <div class="form-group col-12">
                            <input type="text" class="form-control ligne_presence" disabled>
                            <input type="hidden" class="form-control ligne_presence" name="ligne_presence">
                        </div>      
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-stripper">

                        <thead>
                            <tr>
                                <th rowspan="2"> MD </th>
                                <th colspan="2" class="text-center"> STATUS </th>
                            </tr>
                            <tr>
                                <th class="text-center"> PRESENT </th>
                                <th class="text-center"> ABSENT </th>
                            </tr>
                        </thead>

                        <tbody class='fts'>
                            <?php
                                foreach ($food_truckers as $food_trucker) {
                            ?>
                                <tr>
                                    <td> <?= $food_trucker->noms ?> </td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input rad_status" name="<?= $food_trucker->employee ?>" id="<?= $food_trucker->employee."P" ?>" value="PRESENT" required>
                                            <label for="<?= $food_trucker->employee."P" ?>" class="custom-control-label"> PRESENT </label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input rad_status" name="<?= $food_trucker->employee ?>" id="<?= $food_trucker->employee."A" ?>" value="ABSENT" required>
                                            <label for="<?= $food_trucker->employee."A" ?>" class="custom-control-label"> ABSENT </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>

                    </table>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-md btn-dark font-weight-bold"> <i class="fas fa-save"></i> ENREGISTRER </button>
                </div>
            </div>
        </form>

      </div>

    </section>
    
  </div>
  
</div>

<script>
    const presences_fts = <?= json_encode($presences_fts) ?>;
    const food_truckers = <?= json_encode($food_truckers) ?>;
</script>
<?php require('template/import/foot.php'); ?>
