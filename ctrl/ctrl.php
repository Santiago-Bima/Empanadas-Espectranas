<?php
    class ctrlPlantilla{
        public function ctrlTraerPlantilla(){
            include "vistas/plantilla.php";
        }

        public function enlacesCtrl(){
            if(isset($_GET["activo"])){
                $enlacesCtrl=$_GET["activo"];
            }else{
                $enlacesCtrl="registro";
            }
            $rta=enlacesPag::enlacesPagNavMdl($enlacesCtrl);
            include $rta;
        }
        public function enlacesCtrlCss(){
            if(isset($_GET["activo"])){
                $enlacesCtrlCss=$_GET["activo"];
            }else{
                $enlacesCtrlCss="registro";
            }
            $rtaCss=enlacesPag::enlacesMdlCss($enlacesCtrlCss);
            return $rtaCss;
        }
        public function enlacesCtrlScripts(){
            if(isset($_GET["activo"])){
                $enlacesCtrlJs=$_GET["activo"];
            }else{
                $enlacesCtrlJs="registro";
            }

            $rtaJs=enlacesPag::enlacesMdlScripts($enlacesCtrlJs);
            return $rtaJs;
        }
    }