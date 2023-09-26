<?php

// 자동차 클래스
class Car {
	protected $name = "";
	protected $comp = "";
	
	protected function move() {
		echo "전진!\n";		
	}
	protected function stop() {
		echo "정지!\n";		
	}
	public function auto() {// 외부에서 볼수있는 public 하나만 설정해줌
		echo $this->comp." ".$this->name." "; // this는 클래스 내에 있는 변수 불러올때 사용
		$this->move(); 
		$this->stop();
	}
}

class Kia extends Car {
	public function __construct($name) {
		$this->name = $name;
		$this->comp = "기아";
	}
}
class Toyota extends Car {
	public function __construct($name) {
		$this->name = $name;
		$this->comp = "토요타";
	}
}

$obj = new Kia("레이");
$obj->auto(); // private으로 설정되어있어서 에러뜸

$obj2 = new Toyota("크라운");
$obj2->auto(); // private으로 설정되어있어서 에러뜸

// 클래스 종류(여러개 존재)
// new PDO;
// new Exception("asdfsa");
// new DateTime;


?>