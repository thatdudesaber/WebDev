<?php

class Book{

    // Datafields
    private int $id;
    private string $title;
    private float $price;
    private int $stock;

    // Constructor
    public function __construct(int $id, string $title, float $price, int $stock){
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->stock = $stock;
    }

    // Functions
    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getStock(){
        return $this->stock;
    }

}





?>