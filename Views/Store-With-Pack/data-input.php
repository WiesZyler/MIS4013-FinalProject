<?php
$tableData = [];

while ($pack = $storeswithpacks->fetch_assoc()) {
    $tableData[] = [
        $pack['PackID'],
        $pack['StoreID'],
        $pack['SName'],
        $pack['PSPrice']
    ];
}

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($tableData);
?>
