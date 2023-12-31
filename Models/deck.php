
<?php
function selectDeck() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT DeckID, DName, DFormat, DPlayerName FROM `Deck`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>


 <?php
function insertDeck($dname,$dformat,$dplayername) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Deck` (`DName`, `DFormat`,`DPlayerName`) VALUES (?, ?,?)");
         $stmt->bind_param("sss",$dname,$dformat,$dplayername);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteDeck($did) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Delete from `Deck` where DeckID=?");
         $stmt->bind_param("s", $did);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editDeck($dname,$dformat,$dplayername,$did) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Deck` SET `DName`=?, `DFormat`=?,`DPlayerName`=?  WHERE `DeckID`=?");
        $stmt->bind_param("ssss",$dname,$dformat,$dplayername,$did);  
        $success = $stmt->execute();  
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}



?>
