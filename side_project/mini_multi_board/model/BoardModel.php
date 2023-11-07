<?php

// <고유 식별자 제공>
namespace model;
// namespace : 클래스 간 이름 충돌 방지

class BoardModel extends ParentsModel { // 부모모델 클래스에게 상속받는 보드모델 클래스
	// 테이블명으로 모델명 작성(보드테이블)
	public function getBoardList($arrBoardInfo) { 
		$sql =
			" SELECT "
			." id "
			." ,u_pk "
			." ,b_title "
			." ,b_content "
			." ,b_img "
			." ,create_at "
			." ,updated_at "
			." FROM board "
			." WHERE "
			." b_type = :b_type "
			." AND deleted_at IS NULL "
			;
		// 배열로 데이터를 받는 이유 : 수정사항이 있다면 수정해야할 사항이 많아지는 불편함을 최소화 시키기 위해
		$prepare = [
			":b_type" => $arrBoardInfo["b_type"]
		];
		
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
			echo "BoardModel->getBoardList Error : ".$e->getMessage();
			exit();
		}
	}

	// 작성글 insert
	public function addBoard($arrAddBoardInfo) {
		$sql =
			" INSERT INTO board ( "
			." u_pk "
			." ,b_type "
			." ,b_title "
			." ,b_content "
			." ,b_img "
			." ) "
			." VALUES ( "
			." :u_pk "
			." ,:b_type "
			." ,:b_title "
			." ,:b_content "
			." ,:b_img "
			." ) "			
			;

		$prepare = [
			":u_pk" => $arrAddBoardInfo["u_pk"]
			,":b_type" => $arrAddBoardInfo["b_type"]
			,":b_title" => $arrAddBoardInfo["b_title"]
			,":b_content" => $arrAddBoardInfo["b_content"]
			,":b_img" => $arrAddBoardInfo["b_img"]
		];

		try {
			$stmt = $this->conn->prepare($sql);
			// sql 쿼리 준비문 생성하여 $stmt에 저장
			$result = $stmt->execute($prepare);
			// sql 쿼리 준비문 실행			
			return $result; 
			// 리턴 $result;
		} catch(Exception $e) {
			echo "BoardModel->addBoard Error : ".$e->getMessage();
			exit();
		}
	}

	// 디테일 조회
	public function getBoardDetail($arrBoardDetailInfo) { 
		$sql =
			" SELECT "
			." id "
			." ,u_pk "
			." ,b_title "
			." ,b_content "
			." ,b_img "
			." ,DATE_FORMAT(create_at, '%Y년 %m월 %d일 %h시 %i분 %s초') AS create_at "
			." ,DATE_FORMAT(updated_at, '%Y년 %m월 %d일 %h시 %i분 %s초') AS updated_at "
			." FROM board "
			." WHERE "
			." id = :id "
			;
		// 배열로 데이터를 받는 이유 : 수정사항이 있다면 수정해야할 사항이 많아지는 불편함을 최소화 시키기 위해
		$prepare = [
			":id" => $arrBoardDetailInfo["id"]
		];
		
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
			echo "BoardModel->getBoardDetail Error : ".$e->getMessage();
			exit();
		}
	}
}