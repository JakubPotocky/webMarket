<?php

// trieda filter
class ProductFilter {

    // vsetky premenne triedy, pre nas obsahuje vsetky atributy, ktorymi mozeme filtrovat
    public ?string $nameS;
	public ?string $nameP;
	public ?string $price;
	public ?string $stav;
	public ?string $category;

    // vzdy ked vytvorime filter, nacitajme veci z URL filtra do premennych a s tymi pracujeme vsade v kode $trieda->premenna
    public function __construct() {
        $this->nameS = $_GET["nameS"] ?? null;
        $this->nameP = $_GET["nameP"] ?? null;			
        $this->price = $_GET["price"] ?? null;
        $this->stav = $_GET["stav"] ?? null;
        $this->category = $_GET["category"] ?? null;
    }

}

