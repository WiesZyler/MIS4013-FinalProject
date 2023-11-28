
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
