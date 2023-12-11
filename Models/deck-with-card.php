<?php
function selectDeckWithCard() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select DC.DCID, D.DeckID, C.CardID, D.DName, DC.DCQuantity, C.CName, C.CRarity, C.CCardType, D.DFormat, DPlayerName from Deck D JOIN DeckCard DC on D.DeckID = DC.DCDeckID JOIN Card C on DC.DCCardID = C.CardID");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertDeck($did, $cid, $quantity) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `DeckCard` (`DCCardID`, `DCDeckID`, `DCQuantity`) VALUES (?, ?, ?)");
         $stmt->bind_param("iis", $sid, $pid, $quantity);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteDeck($dcid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Delete from `DeckCard` where DCID=?");
         $stmt->bind_param("i", $dcid);
      $success =  $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function editDeck($did, $cid, $quantity, $dcid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `DeckCard` SET  `DCDeckID`=?, `DCCardID`=?, `DCQuantity`=? WHERE `DCID`=?");
        $stmt->bind_param("iiii", $did, $cid, $quantity, $dcid);  
        $success = $stmt->execute();  
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectDeck() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT DeckID, DName, DFormat,DPlayerName FROM `Deck`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectCard() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT CardID, CName, CColorID, CCardType,CRarity FROM `Card`");
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
