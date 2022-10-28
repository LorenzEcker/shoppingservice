<?php


namespace Data;


class Shoppinglist
{
    private int $sListId;
    private int $creator;
    private string $completeUntil;
    private int $done;
    private float $totalCost;
    private int $volunteer;

    public function __construct(int $sListId, int $creator, string $completeUntil, int $done = 0, float $totalCost = 0, int $volunteer = 0)
    {
        $this->sListId = $sListId;
        $this->creator = $creator;
        $this->completeUntil = $completeUntil;
        $this->done = $done;
        $this->totalCost = $totalCost;
        $this->volunteer = $volunteer;
    }

    public function getListId() : int{
        return $this->sListId;
    }

    public function getCreator() : int{
        return $this->creator;
    }

    public function getCompleteUntil() : string {
        return $this->completeUntil;
    }

    public function getDone() : bool{
        return $this->done;
    }

    public function getTotalCost() : float{
        return $this->totalCost;
    }

    public function getVolunteer() : int{
        return $this->volunteer;
    }
}