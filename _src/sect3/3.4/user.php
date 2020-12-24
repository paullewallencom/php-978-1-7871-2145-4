<?php
/**
 * Volume 1 - Fundamental of FP - Video 3.4
 * Author: @luijar
 * User model
 */
declare(strict_types=1);

namespace Vol1\Sect3\Video4;

class User {
	private $id;
	private $firstname;
    private $lastname;
    private $email;

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
    	$this->id = $id;
    	return $this;
    }

   	public function getFirstname(): string {
        return $this->firstname;
    }

    public function setFirstname(string $name): self {
    	$this->firstname = $name;
    	return $this;
    }
    
    public function getLastname(): string {
        return $this->lastname;
    }

    public function setLastname(string $name): self {
    	$this->lastname = $name;
    	return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
    	$this->email = $email;
    	return $this;
    }

    public static function hydrate($record): self {
    	$user = new static();
    	$attrs = get_object_vars($record);
    	array_walk($attrs, function ($val, $key) use ($user) {
    			$user->$key = $val;
    		}
    	);    	
    	return $user;
    }
}

