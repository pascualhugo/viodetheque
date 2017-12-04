<?php
class Movie
{
    private $id;
    private $title;
    private $releaseDate;
    private $synopsis;
    private $rating;
    private $actors;
    private $director;
    private $gallery;

    /**
     * Movie constructor.
     * @param $id
     * @param $title
     * @param $releaseDate
     * @param $synopsis
     * @param $rating
     * @param $actors
     * @param $director
     */
    public function __construct($id, $title, $releaseDate, $synopsis, $rating, $actors, $director, $gallery)
    {
        $this->id = $id;
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->synopsis = $synopsis;
        $this->rating = $rating;
        $this->actors = $actors;
        $this->director = $director;
        $this->gallery = $gallery;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @return mixed
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return mixed
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @return mixed
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}