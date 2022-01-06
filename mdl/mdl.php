<?php
    class enlacesPag{
        public static function enlacesPagNavMdl($enlacesMdl){
            if($enlacesMdl=="inicio"||$enlacesMdl=="info"||$enlacesMdl=="descuentos"||$enlacesMdl=="config"||$enlacesMdl=="productos"||$enlacesMdl=="editarprod"){
                 $pag="vistas/paginas/".$enlacesMdl.".php";
            }else if($enlacesMdl=="registro"||$enlacesMdl=="ingreso"||$enlacesMdl=="editar"||$enlacesMdl=="salir"){
                $pag="vistas/paginas/cuenta/".$enlacesMdl.".php";
            }else{
                $pag="vistas/paginas/404.php";
            }
            return $pag;
        }
        public static function enlacesMdlCss($enlacesMdlCss){
            if($enlacesMdlCss=="inicio"||$enlacesMdlCss=="info"||$enlacesMdlCss=="descuentos"||$enlacesMdlCss=="config"||$enlacesMdlCss=="productos"||$enlacesMdlCss=="editarprod"){
                $pagCss="html/css/".$enlacesMdlCss.".css";
            }else if($enlacesMdlCss=="registro"||$enlacesMdlCss=="ingreso"||$enlacesMdlCss=="editar"||$enlacesMdlCss=="salir"){
                $pagCss="html/Css/cuenta.css";
            }
            return $pagCss;
        }
        public static function enlacesMdlScripts($enlacesMdlJs){
            if($enlacesMdlJs=="inicio"||$enlacesMdlJs=="info"||$enlacesMdlJs=="descuentos"||$enlacesMdlJs=="config"||$enlacesMdlJs=="productos"||$enlacesMdlJs=="editarprod"){
                $pagJs="html/js/".$enlacesMdlJs.".js";
            }else if($enlacesMdlJs=="registro"||$enlacesMdlJs=="ingreso"||$enlacesMdlJs=="editar"||$enlacesMdlJs=="salir"){
                $pagJs="html/js/cuenta.js";
            }
            return $pagJs;
        }
    }   