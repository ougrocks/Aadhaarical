<?php
$result = array();
if (($handle = fopen("RTO.csv", "r")) !== FALSE) {
    $column_headers = fgetcsv($handle); // read the row.
    foreach($column_headers as $header) {
        $result[$header] = array();
    }

    while (($data = fgetcsv($handle)) !== FALSE) {
        $i = 0;
        foreach($result as &$column) {

            $column[] = $data[$i++];
        }

    }
    fclose($handle);
}
$json = json_encode($result);
echo $json;