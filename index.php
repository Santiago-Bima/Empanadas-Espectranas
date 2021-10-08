<?php
    require_once "ctrl/ctrl.php";
    require_once 'ctrl/form-ctrl.php';
    require_once 'ctrl/form-prod-ctrl.php';
    require_once "mdl/mdl.php";
    require_once 'mdl/form-mdl.php';
    require_once 'mdl/form-prod-mdl.php';

    $plantilla= new ctrlPlantilla();
    $plantilla->ctrlTraerPlantilla();