<?php

class Dog {
	private $age;

	private $isLost;

	private $name;

	public function __construct(int $newAge, bool $newIsLost, string $newName) {
		try {
			$this->setAge($newAge);
			$this->setIsLost($newIsLost);
			$this->setName($newName);
		} catch (\InvalidArgumentException | \RangeException | \Exception |\TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAge() : int {
		return ($this->age);
	}

	public function setAge(int $newAge) : void {
		if($newAge <= 0){
			throw(new \RangeException('Age cannot be less than or equal to 0'));
		}
		$this->age = $newAge;
	}

	public function getIsLost() : string {
		return ($this->isLost);
	}

	public function setIsLost(bool $newIsLost) : void {
		if($newIsLost === true) {
			$newIsLost = "Missing";
		} else {
			$newIsLost = "Not missing";
		}
		$this->isLost = $newIsLost;
	}

	public function getName() : string {
		return($this->name);
	}

	public function setName(string $newName) : void {
		if(empty($newName) === true) {
			throw (new \InvalidArgumentException('Name cannot be empty'));
		}
		$this->name = $newName;
	}

}

$beagle = new Dog(8, false, 'Shadow');
$husky = new Dog(2, true, "Snow");

function calculateDogAge($dogAge) {
	$peopleAge = $dogAge * 7;

	return($peopleAge);
}
 echo $beagle->getName() . " is " . calculateDogAge($beagle->getAge()) . " years old in human years!";