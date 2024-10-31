<?php

class MovieLibrary {
    private $movies = [];

    public function addMovie(Movie $movie) {
        $this->movies[] = $movie;
        echo "Фильм '{$movie->getTitle()}' добавлен в коллекцию.<br>";
    }

    public function removeMovie($title) {
        foreach ($this->movies as $key => $movie) {
            if ($movie->getTitle() === $title) {
                unset($this->movies[$key]);
                echo "Фильм '{$title}' удалён из коллекции.<br>";
                return;
            }
        }
        echo "Фильм '{$title}' не найден в коллекции.<br>";
    }

    public function searchByDirector($director) {
        $foundMovies = [];
        foreach ($this->movies as $movie) {
            if ($movie->getDirector() === $director) {
                $foundMovies[] = $movie->getTitle(); // Возвращает только названия найденных фильмов
            }
        }
        return $foundMovies; // Возвращает массив найденных фильмов
    }

    public function listAvailableMovies() {
        $availableMovies = [];
        foreach ($this->movies as $movie) {
            if ($movie->isAvailable()) {
                $availableMovies[] = $movie->getTitle(); // Добавляет название доступного фильма
            }
        }
        return $availableMovies; // Возвращает массив доступных фильмов
    }

    public function getAllMovies() {
        return $this->movies; // Возвращает все фильмы в библиотеке
    }

    public function countMovies() {
        return count($this->movies); // Возвращает количество фильмов в библиотеке
    }
}
