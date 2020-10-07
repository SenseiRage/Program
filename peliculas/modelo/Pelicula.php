<?php


class Pelicula {
    public $id;
    public $title;
    public $year;
    public $director;
    public $poster;



    public function __construct($id, $title, $year, $director, $poster) {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->director = $director;
        $this->poster = $poster;
    }


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getDirector() {
        return $this->director;
    }

    public function setDirector($director) {
        $this->director = $director;
    }

    public function getPoster() {
        return $this->poster;
    }

    public function setPoster($poster) {
        $this->poster = $poster;
    }


}