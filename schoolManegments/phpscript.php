<?php
include('../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    $sql = "SELECT * FROM users_table WHERE users_id = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return user data as JSON
    header('Content-Type: application/json');
    echo json_encode($userData);
    exit();
}
?>
