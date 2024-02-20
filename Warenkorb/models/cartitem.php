<?php

require "models/book.php";

class CartItem{

    // Datafields
    private Book $book;
    private int $count;

    // Constructor
    public function __construct(Book $book, int $count){
        $this->book = $book;
        $this->count = $count;
    }

    // Getters
    public function getBook(): Book{
        return $this->book;
    }

    public function getCount(): int{
        return $this->count;
    }

    public function getBookID(): int{
        return $this->book->getID();
    }

    public function getBookPrice(): float{
        return $this->book->getPrice();
    }

    // Setters 
    public function setCount(int $count): void{
        $this->count = $count;
    }

    // Functions
    public function addCount(int $count): void{
        $this->count+=$count;
    }
}

?>