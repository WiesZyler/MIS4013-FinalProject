<?php
function selectStoreWithPack() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select PS.PSID, S.StoreID, P.PackID, S.SName, PS.PSPrice, P.PName, P.PReleaseDate from Store S JOIN PackStore PS on S.StoreID = PS.PSStoreID JOIN Pack P on PS.PSPackID = P.PackID");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertPack($psid, $sid, $pid, $price) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `PackStore` (`PSID`, `PSStoreID`, `PSPackID`, `PSPrice`) VALUES (?, ?, ?, ?)");
         $stmt->bind_param("iiis", $psid, $sid, $pid, $price);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteCard($psid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Delete from `PackStore` where PSID=?");
         $stmt->bind_param("i", $psid);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editCard($sid, $pid, $price, $psid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `PackStore` SET  `PSStoreID`=?, `PSPackID`=?, `PSPrice`=? WHERE `PSID`=?");
        $stmt->bind_param("iiii", $sid, $pid, $price, $psid);  
        $success = $stmt->execute();  
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
