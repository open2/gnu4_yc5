<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// common.php에 있는 것처럼, $yc5_path 변수를 unset 한다.
if ($_GET['yc5_path'] || $_POST['yc5_path'] || $_COOKIE['yc5_path']) {
    unset($_GET['yc5_path']);
    unset($_POST['yc5_path']);
    unset($_COOKIE['yc5_path']);
    unset($yc5_path);
}

// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
define("_YC5_", TRUE);

// 디렉토리
$yc5['shop']          = "shop";
$yc5['shop_path']     = $g4['path'] . "/" . $yc5['shop'];

$yc5['admin']         = "shop_adm";
$yc5['admin_path']    = $g4['path'] . "/" . $g4['admin'] . "/" . $yc5['admin'];

$yc5['data']          = "yc5";
$yc5['data_path']     = $g4['data_path'] . "/" . $yc5['data'];

$yc5['lib']           = "lib";
$yc5['lib_path']      = $yc5['shop_path'] . "/" . $yc5['lib'];

$yc5['skin']          = "skin";
$yc5['skin_path']     = $yc5['shop_path'] . "/" . $yc5['skin'];

//
// 테이블 명
// (상수로 선언한것은 함수에서 global 선언을 하지 않아도 바로 사용할 수 있기 때문)
//
$yc5['table_prefix']         = "yc5_"; // 테이블명 접두사

$yc5['default_table']        = $yc5['table_prefix'] . "default";            // 쇼핑몰설정 테이블
$yc5['cart_table']           = $yc5['table_prefix'] . "cart";               // 장바구니 테이블
$yc5['category_table']       = $yc5['table_prefix'] . "category";           // 상품분류 테이블
$yc5['event_table']          = $yc5['table_prefix'] . "event";              // 장바구니 테이블
$yc5['event_item_table']     = $yc5['table_prefix'] . "event_item";         // 상품, 이벤트 연결 테이블
$yc5['item_table']           = $yc5['table_prefix'] . "item";               // 상품 테이블
$yc5['item_option_table']    = $yc5['table_prefix'] . "item_option";        // 상품옵션 테이블
$yc5['item_use_table']       = $yc5['table_prefix'] . "item_use";           // 상품 사용후기 테이블
$yc5['item_qa_table']        = $yc5['table_prefix'] . "item_qa";            // 상품 질문답변 테이블
$yc5['item_relation_table']  = $yc5['table_prefix'] . "item_relation";      // 관련 상품 테이블
$yc5['order_table']          = $yc5['table_prefix'] . "order";              // 주문서 테이블
$yc5['order_delete_table']   = $yc5['table_prefix'] . "order_delete";       // 주문서 삭제 테이블
$yc5['shop_wish_table']      = $yc5['table_prefix'] . "wish";               // 보관함(위시리스트) 테이블
$yc5['coupon_table']         = $yc5['table_prefix'] . "coupon";             // 쿠폰정보 테이블
$yc5['shop_coupon_log_table']= $yc5['table_prefix'] . "coupon_log";         // 쿠폰사용정보 테이블
$yc5['sendcost_table']       = $yc5['table_prefix'] . "sendcost";           // 추가배송비 테이블
$yc5['personalpay_table']    = $yc5['table_prefix'] . "personalpay";        // 쿠폰정보 테이블
$yc5['order_address_table']  = $yc5['table_prefix'] . "order_address";      // 쿠폰사용정보 테이블

//==============================================================================
// 쇼핑몰 필수 실행코드 모음 시작
//==============================================================================

// 쇼핑몰 설정값 배열변수
$default = sql_fetch(" select * from $yc5['default_table'] ");

// 쇼핑몰 라이브러리
include_once("$yc5[lib_path]/shop.lib.php");
?>