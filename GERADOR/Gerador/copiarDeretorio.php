<?php


if(!is_dir("CopiarDiretorio")){
    mkdir("CopiarDiretorio", 0755);
}
// copiaDir("Componetes", "CopiarDiretorio");
listarArqDir("Componetes");

echo "<br><br>";

$dir    = 'Componetes';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

// print_r($files1);
// print_r($files2);

for ($i=0; $i < count($files1); $i++) { 
    echo "\$files1[\$i]".$files1[$i]."<br>";
}

?>