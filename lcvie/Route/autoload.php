<?php
spl_autoload_register(function($class){

$tabFiles = ["./Models/$class.php", "./Models/Admin/$class.php", "./Controllers/Admin/$class.php","./Models/Public/$class.php","./Controllers/public/$class.php"];

foreach($tabFiles as $file){
    if(file_exists($file)){
        require_once $file;
    }
}
});

?>