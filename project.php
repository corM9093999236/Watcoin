<?php

// Файл для обработки всех PHP-запросов

// Обработка сохранения результатов основной игры
if (isset($_POST["count"]) && isset($_POST["limit"])) {
    $count = (int)$_POST["count"];
    $limit = (int)$_POST["limit"];

    // Сохраняем счетчик и лимит в базе данных
    $mysqli = new mysqli("localhost", "username", "password", "database_name");
    $stmt = $mysqli->prepare("INSERT INTO results (count, limit) VALUES (?, ?)");
    $stmt->bind_param("ii", $count, $limit);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}

// Обработка сохранения улучшений
elseif (isset($_POST["multitap"]) && isset($_POST["energy"])) {
    $multitap = (int)$_POST["multitap"];
    $energy = (int)$_POST["energy"];

    // Сохраняем мультитап и энергию в базе данных
    $mysqli = new mysqli("localhost", "username", "password", "database_name");
    $stmt = $mysqli->prepare("UPDATE results SET multitap = ?, energy = ? WHERE id = 1");
    $stmt->bind_param("ii", $multitap, $energy);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    // Перенаправляем пользователя на главную страницу
    header("Location: index.html");
}
