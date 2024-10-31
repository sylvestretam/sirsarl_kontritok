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
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb -float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">

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
            
          </div>
      </div>

    </section>
    
  </div>
  
</div>

<?php require('template/import/foot.php'); ?>
