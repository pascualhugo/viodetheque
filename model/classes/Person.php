<?php
class Person
{
    private $id;
    private $firstName;
    private $lastName;
    private $birthInformations;
    private $nationality;
    private $biography;
    private $image;
    private $moviesAsActor;
    private $moviesAsDirector;

    /**
     * Person constructor.
     * @param $id
     * @param $firstName
     * @param $lastName
     * @param $birthInformations
     * @param $nationality
     * @param $biography
     * @param $image
     * @param $moviesAsActor
     * @param $moviesAsDirector
     */
    public function __construct($id, $firstName, $lastName, $birthInformations, $nationality, $biography, $image,
                                $moviesAsActor, $moviesAsDirector)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthInformations = $birthInformations;
        $this->nationality = $nationality;
        $this->biography = $biography;
        $this->image = $image;
        $this->moviesAsActor = $moviesAsActor;
        $this->moviesAsDirector = $moviesAsDirector;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getBirthInformations()
    {
        return $this->birthInformations;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getMoviesAsActor()
    {
        return $this->moviesAsActor;
    }

    /**
     * @return mixed
     */
    public function getMoviesAsDirector()
    {
        return $this->moviesAsDirector;
    }
}
