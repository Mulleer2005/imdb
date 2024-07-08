<?php

class Movie {
    private $title;
    private $cover;
    private int $assessment;
    private array $tags;
    private $description;
    private $director;

    public function __construct($title, $cover, $assessment, $tags, $description, $director) {
        $this->setTitle($title);
        $this->setCover($cover);
        $this->setAssessment($assessment);
        $this->setTags($tags);
        $this->setDescription($description);
        $this->setDirector($director);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getCover() {
        return $this->cover;
    }

    public function getAssessment() {
        return $this->assessment;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDirector() {
        return $this->director;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function setCover($cover) {
        $this->cover = $cover;
    }
    
    public function setAssessment(int $assessment) {
        $this->assessment = $assessment;
    }
    
    public function setTags(array $tags) {
        $this->tags = $tags;
 
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDirector($director) {
        $this->director = $director;
    }
    
    public function addTag($tag) {
        $this->tags[] = $tag;
    }

}
?>