<?php
function selectPack() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT PackID, PName, PReleaseDate FROM `pack`");
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $conn->close();
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            $conn->close();
            header('Content-Type: application/json');
            echo json_encode([]);
        }
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
