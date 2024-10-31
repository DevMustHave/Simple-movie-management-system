<?php

class Movie {
    private $title;
    private $director;
    private $year;
    private $genre;
    private $available;

    public function __construct($title, $director, $year, $genre) {
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->genre = $genre;
        $this->available = true;
    }

    public function rent() {
        $this->available = false; // Делает фильм недоступным
    }

    public function returnMovie() {
        $this->available = true; // Делает фильм доступным
    }

    public function isAvailable() {
        return $this->available; // Возвращает статус доступности фильма
    }

    public function getTitle() {
        return $this->title; // Возвращает название фильма
    }

    public function getDirector() {
        return $this->director; // Возвращает имя режиссёра
    }

    public function getYear() {
        return $this->year; // Возвращает год выпуска
    }

    public function getGenre() {
        return $this->genre; // Возвращает жанр фильма
    }
}
