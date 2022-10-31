<?php 

$infos = file("cftlog00.txt");
//echo '<pre>';
//print_r($infos);
//echo '</pre>';


$check = array_filter($infos,"check_value");
echo "<pre>";
//print_r($check);
echo "</pre>";


// files name 
$files_name = [];
foreach ($check as $k => $v) 
{
    // check first ligne cause its the started date of administrator
    if ($k == key($check)) continue;
    // explode ligne to get the name of file and its in key 4
    $file_name = [];
    $file_name = explode(" ", $v);
    print_r($file_name[1]);
    echo "<br>";
    // check if file existe in $files_name
    if (!isset($files_name[$file_name[1]])) 
    {
        $files_name[$file_name[1]] = $file_name[1];
    }
    echo '<br>';
     // check first ligne cause its the started date of administrator
    if ($k == key($check)) continue;
    // explode ligne to get the name of file and its in key 4
    $file_name = [];
    $file_name = explode(" ", $v);
    print_r($file_name[4]);
    echo "<br>";
    // check if file existe in $files_name
    if (!isset($files_name[$file_name[4]])) 
    {
        $files_name[$file_name[4]] = $file_name[4];
    }

}
echo "<pre>";
print_r($files_name);
echo "</pre>";
function check_value($v){
    $exist = false;
    if (strpos($v, "started") == true or strpos($v, "ended") == true) {
        $exist = true;
    }

    return $exist;
}



 ?>