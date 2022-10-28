<?php

namespace Data;

class User {

    private int $userId;
    private string $eMail;
    private string $passwordHash;
    private bool $isVolunteer;

	public function __construct(int $id, string $userName, string $passwordHash, bool $isVolunteer) {
		$this->userId= $id;
		$this->eMail = $userName;
		$this->passwordHash = $passwordHash;
		$this->isVolunteer = $isVolunteer;
	}

	public function getUserId() : int{
	    return $this->userId;
    }

	public function getUserName() : string {
		return $this->eMail;
	}

	public function getPasswordHash() : string {
		return $this->passwordHash;
	}

	public function getIsVolunteer() : bool {
	    return $this->isVolunteer;
    }
}