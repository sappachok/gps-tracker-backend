<?php
header("Content-type: application/json; charset=utf-8");

// http://localhost/get_location.php?user_id=3

//$user_id = $_GET["user_id"];
//echo $user_id;

//if(!$user_id) exit();

//$file_path = "../locations/".$user_id."/location.csv";
$file_path = 'C:\xampp\htdocs\testing\lacation.csv';
//echo $file_path;
//print_r(fgetcsv($file));

//$locat = csvToJson($file_path);
$locat = csvToJson($file_path);
echo $locat;
//echo $locat;
//var_dump($locat);

//var_dump($locat);
//echo $locat;
//var_dump(fgetcsv($file));


function csvToJson($fname) {
    // open csv file
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }
    
    //read csv headers
    $key = fgetcsv($fp,"1024",",");
    
    // parse csv rows into array
    $json = array();
    while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }
    
    // release file handle
    fclose($fp);
    
    // encode array to json
    return json_encode($json);
}

function csvToArray($fname) {
    // open csv file
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }
    
    //read csv headers
    $key = fgetcsv($fp,"1024",",");
    
    // parse csv rows into array
    $json = array();
    while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }
    
    // release file handle
    fclose($fp);
    
    // encode array to json
    return $json;
}


?>