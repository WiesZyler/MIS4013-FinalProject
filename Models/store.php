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
?>
