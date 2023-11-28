
<?php
function selectCard() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT CardID, CName, CColorID, CCardType, CRarity FROM `Card`");
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
