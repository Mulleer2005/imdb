<?php

class Director {
    private array $name;
    private array $birthdate;

    public function __construct(array $name) {
        $this->setName($name);
    }

    public function getName() {
        return $this->name;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setName(array $name) {
        $this->name = $name;
    }
    
    public function setBirthdate(array $birthdate) {
        $this->birthdate = $birthdate;
    }

}