<?php


namespace Data;


class Article
{
    private int $articleId;
    private int $shoppinglistId;
    private string $name;
    private float $maxPrice;
    private int $ammount;
    private int $creator;


    public function __construct(int $articleId, int $shoppinglistId,
                                string $name, float $maxPrice,
                                int $ammount, int $creator){
        $this->articleId = $articleId;
        $this->shoppinglistId = $shoppinglistId;
        $this->name = $name;
        $this->maxPrice = $maxPrice;
        $this->ammount = $ammount;
        $this->creator = $creator;
    }

    public function getArticleId() : int{
        return $this->articleId;
    }

    public function getShoppinglistId() : int{
        return $this->shoppinglistId;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getMaxPrice() : float{
        return $this->maxPrice;
    }

    public function getAmmount() : int{
        return $this->ammount;
    }

    public function getCreator() : int{
        return $this->creator;
    }
}