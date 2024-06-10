<?php

// Подключаемся к базе данных
$mysqli = new mysqli("localhost", "root", "password", "watcoin");

// Получаем текущие значения счетчика и лимита из локального хранилища или устанавливаем их в 0
$count = +$_POST["count"] || 0;
$limit = +$_POST["limit"] || 2000;

// Сохраняем счетчик и лимит в базе данных
$stmt = $mysqli->prepare("INSERT INTO results (count, limit) VALUES (?, ?)");
$stmt->bind_param("ii", $count, $limit);
$stmt->execute();

// Закрываем соединение с базой данных
$stmt->close();
$mysqli->close
