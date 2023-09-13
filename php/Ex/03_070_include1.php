<?php

include("./02_070_include2.php");
//include 해당파일을 불러오고 오류가 있어도 다음 처리를 진행함
require("./02_070_include2.php");
//require 해당파일을 불러오고 오류가 있으면 다음 처리를 진행하지 않음
include_once("./02_070_include2.php");
// include_once 해당파일을 불러오지만 중복파일은 불러오지 않음
require_once("./02_070_include2.php");
// require_once 해당파일을 불러오지만 중복파일은 불러오지 않음

echo "include 11111\n";

?>