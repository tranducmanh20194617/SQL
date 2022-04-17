<?php
$con = pg_connect("host= localhost  dbname= my_project_3 user= postgres password= postgres");
if (!$con) {
    echo "An error occurred.\n";
    exit;
}
?>