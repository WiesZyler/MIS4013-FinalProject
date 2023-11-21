<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('159.89.47.44', 'zylerwie_projectuser', 'p+;2L=F&zSPx', 'zylerwie_project');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
