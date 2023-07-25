<?php
	$conn =mysqli_connect("localhost", "root","", "zheludov");

    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Подготовка и выполнение запроса на получение комментариев из базы данных
    $sql = "SELECT name, message FROM message";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="comment">';
            echo '<strong>' . htmlspecialchars($row["name"]) . ':</strong>';
            echo '<p>' . htmlspecialchars($row["message"]) . '</p>';
            echo '</div>';
        }
    } else {
        echo "<p>Пока нет комментариев.</p>";
    }

    $conn->close();
?>