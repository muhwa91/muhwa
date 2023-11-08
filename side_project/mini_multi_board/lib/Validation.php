<?php

namespace lib;

class Validation {
	private static $arrErrorMsg = []; // 발리데이션용 에러메세지 저장 프로퍼티
	public static function getArrErrorMsg() { // getter : 에러메세지 반환용 메소드
		return self::$arrErrorMsg;
	}

	public static function setArrErrorMsg($msg) { // setter : 에러메세지 저장용 메소드
		self::$arrErrorMsg[] = $msg;
	}


	public static function userChk(Array $inputData) : bool { // 파라미터는 array, 리턴은 boolean
		$patternId = "/^[a-zA-Z0-9]{8,20}$/";
		$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName = "/^[a-zA-Z가-힣]{2,50}$/u";

		if(array_key_exists("u_id", $inputData)) { // $inputData에서 u_id 키가 존재하는지를 확인
			if(preg_match($patternId, $inputData["u_id"], $match) === 0) { // ID에러처리 true = 1 false = 0
				$msg = "아이디는 영어대소문자와 숫자로 8~20자로 입력해 주세요.";
				// static 선언 시, 클래스 내에서 사용할 시에는 $this 
				self::$arrErrorMsg[] = $msg;
			}					
		}

		if(array_key_exists("u_pw", $inputData)) { // $inputData에서 u_pw 키가 존재하는지를 확인
			if(preg_match($patternId, $inputData["u_pw"], $match) === 0) { // ID에러처리 true = 1 false = 0
				$msg = "비밀번호는 영어대소문자와 숫자, !, @로 8~20자로 입력해 주세요.";
				// static 선언 시, 클래스 내에서 사용할 시에는 $this 
				self::$arrErrorMsg[] = $msg;
			}			
		}

		if(array_key_exists("u_pw_chk", $inputData)) { // 비밀번호 재확인 체크
			if($inputData["u_pw"] !== $inputData["u_pw_chk"]) { // Name에러처리 true = 1 false = 0
				$msg = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
				self::$arrErrorMsg[] = $msg;
			}
		}

		if(array_key_exists("u_name", $inputData)) { // $inputData에서 u_name 키가 존재하는지를 확인
			if(preg_match($patternName, $inputData["u_name"], $match) === 0) { // Name에러처리 true = 1 false = 0
				$msg = "이름은 영어대소문자와 한글로 2~50자로 입력해 주세요.";
				self::$arrErrorMsg[] = $msg;
			}
		}
		
		// 리턴 처리
		if(count(self::$arrErrorMsg) > 0) {
			return false;
		}
		
		return true;		
	}
}







// Validation 체크
// $arr = [
// 	"u_id" => "admin"
// 	,"u_pw" => "12345678"
// ];

// var_dump(Validation::userChk($arr));

// var_dump(Validation::getArrErrorMsg());