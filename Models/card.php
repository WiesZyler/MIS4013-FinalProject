
<?php
function selectCard() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT CardID, CName, CColorID, CCardType, CRarity, PackID FROM `Card`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}


function insertCard($cname,$ccolorid,$ccardtype,$crarity,$pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Card` (`CName`, `CColorID`, `CCardType`, `CRarity`, `PackID`) VALUES (?, ?,?,?)");
         $stmt->bind_param("sissi",$cname,$ccolorid,$ccardtype,$crarity,$pid);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteCard($cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Delete from `Card` where CardID=?");
         $stmt->bind_param("s", $cid);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editCard($cname,$ccolorid,$ccardtype,$crarity,$cid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Card` SET `CName`=?, `CColorID`=?, `CCardType`=?, `CRarity`=?, `PackID`=? WHERE `CardID`=?");
         $stmt->bind_param("sisssi",$cname,$ccolorid,$ccardtype,$crarity,$cid,$pid);
      $success =  $stmt->execute();

        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>







