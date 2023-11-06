<?php

// <고유 식별자 제공>
namespace model;
// namespace : 클래스 간 이름 충돌 방지

class BoardNameModel extends ParentsModel { // 부모모델 클래스에게 상속받는 보드모델 클래스
	public function getBoardNameList() {
		$sql =
			" SELECT " 
			." b_type "
			." ,b_name "
			." FROM boardname "
			." ORDER BY b_type "
			;
		// boardname에서 b_type 순서대로 b_type, b_name 출력  

		try {
			$stmt = $this->conn->query($sql);
			// sql 쿼리 실행하여 $stmt에 저장
			$result = $stmt->fetchAll();
			// sql 쿼리 결과 데이터를 fetchAll 함수이용하여 배열로 반환하여
			// $result에 저장
			return $result;
			// 리턴 $result;
		} catch(Exception $e) {
			echo "BoardNameModel->getBoardNameList Error : ".$e->getMessage();
			exit();
		}
	}
}