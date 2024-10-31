<?php

error_reporting(-1);
require 'classes/Movie.php';
require 'classes/MovieLibrary.php';

// Создание экземпляров фильмов
$movie1 = new Movie("Inception", "Christopher Nolan", 2010, "Science Fiction");
$movie2 = new Movie("The Matrix", "Lana Wachowski, Lilly Wachowski", 1999, "Action");
$movie3 = new Movie("Interstellar", "Christopher Nolan", 2014, "Science Fiction");

// Создание кинотеатра и добавление фильмов
$movieLibrary = new MovieLibrary($movie1, $movie2, $movie3);
$movieLibrary->addMovie($movie1);
$movieLibrary->addMovie($movie2);
$movieLibrary->addMovie($movie3);

echo "<br>";

// Вывод доступных фильмов
echo "Доступные фильмы: " . "<br>";
$availableMovies = $movieLibrary->listAvailableMovies();
if (empty($availableMovies)) {
    echo "Нет доступных фильмов.";
} else {
    foreach ($availableMovies as $title) {
        echo "- $title<br>";
    }
}

echo "<br>";

// Поиск фильмов по режиссеру
$directorSearch = "Christopher Nolan";
$foundMovies = $movieLibrary->searchByDirector($directorSearch);
echo "<br>Фильмы режиссёра '{$directorSearch}': " . "<br>";
if (empty($foundMovies)) {
    echo "Фильмы не найдены.<br>";
} else {
    foreach ($foundMovies as $title) {
        echo "- $title<br>"; // Выводим названия найденных фильмов
    }
}

echo "<br>";

// Удаление фильма
$movieLibrary->removeMovie("The Matrix"); // Удаляет фильм из библиотеки

echo "<br>";

// Вывод количества фильмов в библиотеке
echo "<br>Общее количество фильмов в библиотеке: " . $movieLibrary->countMovies() . "<br>";

// Пример аренды одного фильма
$movie2->rent(); // Делает "Inception" недоступным
echo "Фильм '{$movie2->getTitle()}' арендован и теперь недоступен.<br>";
