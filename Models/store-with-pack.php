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
?>
