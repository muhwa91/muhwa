<?php

// <고유 식별자 제공>
namespace model;
// namespace : 클래스 간 이름 충돌 방지

class UserModel extends ParentsModel { // 부모모델 클래스에게 상속받는 유저모델 클래스
	// 특정 유저 조회하는 메소드
	public function getUserInfo($arrUserInfo, $pwFlg = false) { // pw를 안받으면 false로 세팅
		$sql =
			" SELECT "
			."		* "
			." FROM user "
			." WHERE "
			." u_id = :u_id ";

		$prepare = [
			":u_id" => $arrUserInfo["u_id"]
		];
		// 유저가 POST로 제출한 값이 $arrUserInfo["u_id"]
		// $prepare 저장

		// PW 추가처리
		if($pwFlg) { // $pwFlg = true일 때 실행
			$sql .= " AND u_pw = :u_pw ";
			// $sql에 " AND u_pw = :u_pw " 쿼리문 추가
			$prepare[":u_pw"] = $arrUserInfo["u_pw"];
			// $prepare 배열에 $arrUserInfo["u_pw"]에서 가져온 PW 값 할당
		}		
		// 즉, $pwFlg가 false일 때는 if문 실행되지 않아서 비밀번호 검색 비활성화처리 되어 로그인불가
		// $pwFlg가 true일 때는 if문 실행되어 쿼리문 추가&PW 값 할당

		try {
			$stmt = $this->conn->prepare($sql);
			// sql 쿼리 준비문 생성하여 $stmt에 저장
			$stmt->execute($prepare);
			// sql 쿼리 준비문 실행
			$result = $stmt->fetchAll();
			// sql 쿼리 결과 데이터를 fetchAll 함수이용하여 배열로 반환하여
			// $result에 저장
			return $result;
			// 리턴 $result;
		} catch(Exception $e) {
			echo "UserModel->getUserInfo Error : ".$e->getMessage();
			exit();
		}
	}

	// 유저 정보 insert
	// 파라미터 앞에 타입힌트 적어놓을시 타 데이터 타입 적용시 에러 / ex)(Array $arrUserInfo)
	// 파라미터 뒤 : int 리턴 값으로 데이터 타입 적용 가능 / ex) (Array $arrUserInfo) : int
	public function addUserInfo(Array $arrAddUserInfo) { 
		$sql = 
			" INSERT INTO user ( "
			." u_id "
			." ,u_pw "
			." ,u_name "
			." ) "			
			." VALUES ( "
			." :u_id "
			." ,:u_pw "
			." ,:u_name "
			." ) "
			;
		// 유저컨트롤러에서 파라미터로 전달받은 값을 insert 처리

		$prepare = [
			":u_id" => $arrAddUserInfo["u_id"]
			,":u_pw" => $arrAddUserInfo["u_pw"]
			,":u_name" => $arrAddUserInfo["u_name"]
		];
		// 유저가 POST로 제출한 값이 $arrAddUserInfo["u_id"]["u_pw"]["u_name"]
		// $prepare 저장

		try {
			$stmt = $this->conn->prepare($sql);
			// sql 쿼리 준비문 생성하여 $stmt에 저장
			$result = $stmt->execute($prepare);
			// sql 쿼리 준비문 실행
			return $result;
			// 리턴 $result;
		} catch(Exception $e) {
			echo "UserModel->addUserInfo Error : ".$e->getMessage();
			exit();
		}
	}
	
	public function getChkUserInfo($arrChkUserInfo) { // pw를 안받으면 false로 세팅
		$sql =
			" SELECT "
			." count(u_id) as cnt "
			." FROM user "
			." WHERE "
			." u_id = :u_id ";

		$prepare = [
			":u_id" => $arrChkUserInfo["u_id"]
		];
		// 유저가 GET로 제출한 값이 $arrChkUserInfo["u_id"]
		// $prepare 저장

		try {
			$stmt = $this->conn->prepare($sql);
			// sql 쿼리 준비문 생성하여 $stmt에 저장
			$stmt->execute($prepare);
			// sql 쿼리 준비문 실행
			$result = $stmt->fetchAll();
			// sql 쿼리 결과 데이터를 fetchAll 함수이용하여 배열로 반환하여
			// $result에 저장
			return $result;
			// 리턴 $result;
		} catch(Exception $e) {
			echo "UserModel->getChkUserInfo Error : ".$e->getMessage();
			exit();
		}
	}


}