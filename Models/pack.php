<?php
function selectPack() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT PackID, PName, PReleaseDate FROM `Pack`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertPack($pid,$pname,$rdate) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Pack` (`PackID`, `PName`, `PReleaseDate`) VALUES ( ?, ?, ?)");
         $stmt->bind_param("sss",$pid,$pname,$rdate);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deletePack($pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Delete from `Pack` where PackID=?");
         $stmt->bind_param("s", $pid);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editPack($pname,$rdate,$pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Pack` SET `PName`=?, `PReleaseDate`=? WHERE `PackID`=?");
         $stmt->bind_param("sss",$pname,$rdate,$pid);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
