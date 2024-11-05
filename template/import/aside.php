<?php
  function active_nav_link($nav_link)
  {
      if( !empty($_REQUEST['action']))
          if($_REQUEST['action'] == $nav_link)
              return 'active';
  }

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <div class="pb-2 w-100 text-center text-white">
    <a href="" class="w-100">
      <img src="template\dist\img\logosisas.jpg" alt="Logo" class="brand-image elevation-3" style="width: 100%; opacity: .8">
      <span class="brand-text font-weight-bold invisible" style="font-size: 20px; opacity: .8">ASSESSOR</span>
    </a>
    <span class="brand-text display-4"> KTT </span>
  </div>
  <div class="divider"></div>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="?action=dashboard" class="nav-link btn_nav_link <?= active_nav_link("dashboard") ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              DASHBOARD
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?action=magasin" class="nav-link btn_nav_link <?= active_nav_link("magasin") ?> <?= ShowIFPermit("KONTRITOK_MAG") ?>">
            <i class="nav-icon fas fa-university"></i>
            <p>
              MAGASIN
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?action=venteft" class="nav-link btn_nav_link <?= active_nav_link("venteft") ?> <?= ShowIFPermit("KONTRITOK_VMD") ?>">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              VENTE MD
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?action=ventepv" class="nav-link btn_nav_link <?= active_nav_link("ventepv") ?> <?= ShowIFPermit("KONTRITOK_VPV") ?>">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              VENTE P V
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?action=grh" class="nav-link btn_nav_link <?= active_nav_link("grh") ?> <?= ShowIFPermit("KONTRITOK_GRH") ?>">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              GRH
            </p>
          </a>
        </li>
        
      </ul>
    </nav>
  </div>
</aside>