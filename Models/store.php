<?php
function selectStore() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT StoreID, SName, SLat, SLon FROM `Store`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertStore($sname,$lon,$slat) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Store` (`SName`, `SLon`, `SLat`) VALUES (?, ?, ?)");
         $stmt->bind_param("sss",$sname,$lon,$slat);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteStore($sid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Delete from `Store` where StoreID=?");
         $stmt->bind_param("i", $sid);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editStore($sname,$lon,$slat) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Store` SET `SName`=?, `SLon`=?, `SLat`=? WHERE `StoreID`=?");
         $stmt->bind_param("sss",$sname,$lon,$slat);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
