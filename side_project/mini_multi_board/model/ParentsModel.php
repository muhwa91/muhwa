<?php

// <고유 식별자 제공>
namespace model;
// namespace : 클래스 간 이름 충돌 방지

// <사용할 클래스 지정>
use PDO;
// use : namespace에 속하는 클래스 참조가능
// PDO 클래스 use : DB연결 
use Exception;
// Exception 클래스 use : 예외처리 

class ParentsModel {
	protected $conn;
	
	public function __construct() { // 생성자
		$db_dns	= "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
	
		try {
			$db_options	= [
				PDO::ATTR_EMULATE_PREPARES		=> false // DB의 Prepared Statement 기능을 사용하도록 설정
				,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION // PDO Exception을 Throws하도록 설정
				,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC // 연상배열로 Fetch를 하도록 설정
			];
			// PDO Class로 DB 연동
			$this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);
			// PDO 클래스 인스턴스 생성하여 ($db_dns, _DB_USER, _DB_PW, $db_options) 값
			// $conn에 할당

		} catch (Exception $e) {
			echo "DB Connect Error : ".$e->getMessage();
			exit();
		}
	}
	
	public function destroy() {
		$this->conn = null;
	}
	// DB 파기
	
	public function beginTransaction() {
		$this->conn->beginTransaction();
	}
	// 트랜잭션 시작
	
	public function commit() {
		$this->conn->commit();
	}
	// commit
	
	public function rollBack() {
		$this->conn->rollBack();
	}
	// rollBack
}
