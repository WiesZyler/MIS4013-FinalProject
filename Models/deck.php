
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
function insertDeck($dName,$dFormat,$dPlayerName) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Deck` (`dName`, `dFormat`,`dPlayerName`) VALUES (?, ?,?)");
         $stmt->bind_param("sss",$dName,$dFormat,$dplayerName);
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
         $stmt->bind_param("i", $did);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editDeck($deckName,$dFormat,$dPlayerName,$dID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Deck` SET `dName`=?, `dFormat`=?,`dPlayerName`=?  WHERE `DeckID`=?");
        $stmt->bind_param("sssi",$dName,$dFormat,dPlayerName,$did);  
        $success = $stmt->execute();  
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}



?>
