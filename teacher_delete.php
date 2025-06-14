<?php
include './Common/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $teacher_id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM teachers WHERE id = ?");
    $stmt->bind_param("i", $teacher_id);

    if ($stmt->execute()) {
        header("Location: teacher.php?deleted=1");
        exit;
    } else {
        echo "Error deleting teacher: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}
?>
