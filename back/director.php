<?php

class Director {
    private array $name;
    private array $birth_date;

    public function __construct(array $name) {
        $this->setName($name);
    }

    public function getName() {
        return $this->name;
    }

    public function getBirth_date() {
        return $this->birth_date;
    }

    public function setName(array $name) {
        $this->name = $name;
    }
    
    public function setBirth_date(array $birth_date) {
        $this->birth_date = $birth_date;
    }

}