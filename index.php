<?php
    session_start();
    
    require_once('src/lib/outils.php');
    require_once('src/lib/database.php');

    require_once('src/controller/dashboard.php');
    require_once('src/controller/prospection.php');
    require_once('src/controller/activation.php');
    require_once('src/controller/magasin.php');
    require_once('src/controller/venteft.php');
    require_once('src/controller/ventepv.php');
    require_once('src/controller/grh.php');

    if(isset($_SESSION['BTL']))
    {

        if(isset($_REQUEST['action'])){

            switch ($_REQUEST['action']) {

                case 'dashboard':
                    $dashboardcontroller = new DashboardController();
                    $dashboardcontroller->show();
                    break;

                case 'prospection':
                    $controller = new ProspectionController();
                    $controller->show();
                    break;
                case 'activationpv':
                    $controller = new ActivationController();
                    $controller->show();
                    break;

                case 'magasin':
                    $controller = new MagasinController();
                    $controller->show();
                    break;
                case 'venteft':
                    $controller = new VenteFTController();
                    $controller->show();
                    break;
                case 'ventepv':
                    $controller = new VentePVController();
                    $controller->show();
                    break;
                case 'grh':
                    $controller = new GRHController();
                    $controller->show();
                    break;
                case 'logout':
                    header('location:'.$SERVERPATH.'sisas_portal');
                    break;

                default:
                    $dashboardcontroller = new DashboardController();
                    $dashboardcontroller->show();
                    break;
            }
        }
        else
        {
            if(isset($_SESSION['matricule']))
            {
                $dashboardcontroller = new DashboardController();
                $dashboardcontroller->show();
            }
            else
            {
                header('location:'.$SERVERPATH.'sisas_portal');
            }
        }
    }
    else
    {
        $ERROR = "Vous ne pouvez acceder a cette application";
        require('template/error.php');
    }