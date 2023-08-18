<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->render("propiedades/admin",[
            "propiedades"=>$propiedades,
            "resultado"=>$resultado,
            "vendedores"=>$vendedores,
        ]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $propiedad = new Propiedad($_POST['propiedad']);
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
            if($_FILES["propiedad"]["tmp_name"]["imagen"]){
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            $errores = $propiedad->validar();
            if(empty($errores)){
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);
                $propiedad->guardar();;
            }
        }
        $router->render("propiedades/crear",[
            "propiedad" => $propiedad,
            "vendedores" => $vendedores,
            "errores" => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar("/admin");
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $args = $_POST["propiedad"];
            // $args["vendedores_id"]=$_POST["vendedores_id"]??null;
            $propiedad->sincronizar($args);
            // debuguear($propiedad);
            $errores = $propiedad->validar(); 
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }

            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $imagen->save(CARPETA_IMAGENES.$nombreImagen);
                }
                $propiedad->guardar();;

            }
        }
        $router->render("/propiedades/actualizar",[
            "propiedad" => $propiedad,
            "errores" => $errores,
            "vendedores" => $vendedores
        ]);
    }
    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $id=$_POST['id'];
            $id=filter_var($id,FILTER_VALIDATE_INT);
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar($id);
                }    
            }
        }
    }
}