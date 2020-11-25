<?php
include "connect.php";

$item = filter_input(INPUT_GET , "item", FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_GET , "quantity", FILTER_VALIDATE_INT);

$insert = "INSERT into shoppinglist (item, quantity) VALUES(?,?)";
$i_stmt = $dbh->prepare($insert);
$param = ["$item","$quantity"];
$i_success = $i_stmt -> execute($param);
?>
<?php
$command = "SELECT item, quantity FROM shoppinglist ORDER BY item";
$stmt = $dbh -> prepare($command);
$success = $stmt -> execute();

$items = [];

while($row = $stmt->fetch()){
    $item_list = [
        "item" => $row["item"],
        "quantity" => $row["quantity"]
    ];

    array_push($items, $item_list);
}

echo json_encode($items)
?>