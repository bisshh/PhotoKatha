<?php
$files=["menu/custom"];

foreach($files as $file){
    $file_name=__DIR__."/plugin/".$file.".php";
    if(file_exists($file_name)){
        require $file_name;
    }
}