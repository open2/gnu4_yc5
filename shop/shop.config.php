<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
define("_G5_SHOP_", TRUE);

// 디렉토리
$yc5['shop']          = "shop";
$yc5['shop_path']     = $g4['path'] . "/" . $yc5['shop'];

$yc5['admin']         = "shop_adm";
$yc5['admin_path']    = $g4['path'] . "/" . $g4['admin'] . "/" . $yc5['admin'];

$g4['data']          = "data";
$g4['data_path']     = $g4['path'] . "/" . $g4['data'];

//
// 테이블 명
// (상수로 선언한것은 함수에서 global 선언을 하지 않아도 바로 사용할 수 있기 때문)
//
$g5['table_prefix']         = "g5_"; // 테이블명 접두사

$g5['default_table']        = $s4['table_prefix'] . "default";            // 쇼핑몰설정 테이블
$g5['cart_table']           = $s4['table_prefix'] . "cart";               // 장바구니 테이블
$g5['category_table']       = $s4['table_prefix'] . "category";           // 상품분류 테이블
$g5['event_table']          = $s4['table_prefix'] . "event";              // 장바구니 테이블
$g5['event_item_table']     = $s4['table_prefix'] . "event_item";         // 상품, 이벤트 연결 테이블
$g5['item_table']           = $s4['table_prefix'] . "item";               // 상품 테이블
$g5['item_option_table']    = $s4['table_prefix'] . "item_option";        // 상품옵션 테이블
$g5['item_use_table']       = $s4['table_prefix'] . "item_use";           // 상품 사용후기 테이블
$g5['item_qa_table']        = $s4['table_prefix'] . "item_qa";            // 상품 질문답변 테이블
$g5['item_relation_table']  = $s4['table_prefix'] . "item_relation";      // 관련 상품 테이블
$g5['order_table']          = $s4['table_prefix'] . "order";              // 주문서 테이블
$g5['order_delete_table']   = $s4['table_prefix'] . "order_delete";       // 주문서 삭제 테이블
$g5['shop_wish_table']      = $s4['table_prefix'] . "wish";               // 보관함(위시리스트) 테이블
$g5['coupon_table']         = $s4['table_prefix'] . "coupon";             // 쿠폰정보 테이블
$g5['shop_coupon_log_table']= $s4['table_prefix'] . "coupon_log";         // 쿠폰사용정보 테이블
$g5['sendcost_table']       = $s4['table_prefix'] . "sendcost";           // 추가배송비 테이블
$g5['personalpay_table']    = $s4['table_prefix'] . "personalpay";        // 쿠폰정보 테이블
$g5['order_address_table']  = $s4['table_prefix'] . "order_address";      // 쿠폰사용정보 테이블
$g5['item_stocksms_table']  = $s4['table_prefix'] . "item_stocksms";      // 추가배송비 테이블

//------------------------------------------------------------------------------
// 쇼핑몰 상수 모음 시작
//------------------------------------------------------------------------------

define('G5_SHOP_DIR', 'shop');

define('G5_SHOP_PATH',  G5_PATH.'/'.G5_SHOP_DIR);
define('G5_SHOP_URL',   G5_URL.'/'.G5_SHOP_DIR);
define('G5_MSHOP_PATH', G5_MOBILE_PATH.'/'.G5_SHOP_DIR);
define('G5_MSHOP_URL',  G5_MOBILE_URL.'/'.G5_SHOP_DIR);

// 보안서버주소 설정
if (G5_HTTPS_DOMAIN) {
    define('G5_HTTPS_SHOP_URL', G5_HTTPS_DOMAIN.'/'.G5_SHOP_DIR);
    define('G5_HTTPS_MSHOP_URL', G5_HTTPS_DOMAIN.'/'.G5_MOBILE_DIR.'/'.G5_SHOP_DIR);
} else {
    define('G5_HTTPS_SHOP_URL', G5_SHOP_URL);
    define('G5_HTTPS_MSHOP_URL', G5_MSHOP_URL);
}

/*
배송업체에 데이터를 추가하는 경우 아래 형식으로 추가하세요.
.'(배송업체명^택배조회URL^연락처)'
*/
define('G5_DELIVERY_COMPANY',
     '(경동택배^http://www.kdexp.com/sub3_shipping.asp?stype=1&p_item=^080-873-2178)'
    .'(대신택배^http://home.daesinlogistics.co.kr/daesin/jsp/d_freight_chase/d_general_process2.jsp?billno1=^043-222-4582)'
    .'(동부택배^http://www.dongbups.com/delivery/delivery_search_view.jsp?item_no=^1588-8848)'
    .'(로젠택배^http://www.ilogen.com/iLOGEN.Web.New/TRACE/TraceNoView.aspx?gubun=slipno&slipno=^1588-9988)'
    .'(우체국^http://service.epost.go.kr/trace.RetrieveRegiPrclDeliv.postal?sid1=^1588-1300)'
    .'(이노지스택배^http://www.innogis.co.kr/tracking_view.asp?invoice=^1566-4082)'
    .'(한진택배^http://www.hanjin.co.kr/Delivery_html/inquiry/result_waybill.jsp?wbl_num=^1588-0011)'
    .'(현대택배^http://www.hlc.co.kr/personalService/tracking/06/tracking_goods_result.jsp?InvNo=^1588-2121)'
    .'(CJ대한통운^https://www.doortodoor.co.kr/parcel/doortodoor.do?fsp_action=PARC_ACT_002&fsp_cmd=retrieveInvNoACT&invc_no=^1588-1255)'
    .'(CVSnet편의점택배^http://was.cvsnet.co.kr/_ver2/board/ctod_status.jsp?invoice_no=^1577-1287)'
    .'(KG옐로우캡택배^http://www.yellowcap.co.kr/custom/inquiry_result.asp?invoice_no=^1588-0123)'
    .'(KGB택배^http://www.kgbls.co.kr/sub5/trace.asp?f_slipno=^1577-4577)'
);
//------------------------------------------------------------------------------
// 쇼핑몰 상수 모음 끝
//------------------------------------------------------------------------------


//==============================================================================
// 쇼핑몰 필수 실행코드 모음 시작
//==============================================================================

// 쇼핑몰 설정값 배열변수
$default = sql_fetch(" select * from {$g5['g5_shop_default_table']} ");

define('G5_SHOP_SKIN_PATH',  G5_PATH.'/'.G5_SKIN_DIR.'/shop/'.$default['de_shop_skin']);
define('G5_SHOP_SKIN_URL',   G5_URL .'/'.G5_SKIN_DIR.'/shop/'.$default['de_shop_skin']);
define('G5_MSHOP_SKIN_PATH', G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/shop/'.$default['de_shop_mobile_skin']);
define('G5_MSHOP_SKIN_URL',  G5_MOBILE_URL .'/'.G5_SKIN_DIR.'/shop/'.$default['de_shop_mobile_skin']);

/*
// 주문상태 상수
define('G5_OD_STATUS_ORDER'     , '입금확인중');
define('G5_OD_STATUS_SETTLE'    , '결제완료');
define('G5_OD_STATUS_READY'     , '배송준비중');
define('G5_OD_STATUS_DELIVERY'  , '배송중');
define('G5_OD_STATUS_FINISH'    , '배송완료');
*/

/*
# 주문상태는 상수로 처리하지 않고 실제 문자열 값을 처리한다.

'쇼핑'          : 고객이 장바구니에 상품을 담고 있는 경우 입니다.
'입금확인중'    : 무통장, 가상계좌의 경우 결제하기 전을 말합니다.
'결제완료'      : 결제가 완료된 상태를 말합니다.
'배송준비중'    : 배송준비중이 되면 취소가 불가합니다.
'배송중'        : 배송중이면 반품이 불가합니다.
'배송완료'      : 배송이 완료된 상태에서만 포인트적립이 가능합니다.
'취소'          : 입금확인중이나 결제완료후 취소가 가능합니다.
'반품'          : 배송완료 후에만 반품처리가 가능합니다.
'품절'          :


# 13.10.04

'쇼핑'  : 고객이 장바구니에 상품을 담고 있는 경우 입니다.
'주문'  : 무통장, 가상계좌의 경우 결제하기 전을 말합니다.
'입금'  : 신용카드, 계좌이체, 휴대폰결제가 된 상태, 무\



'완료'  : 배송이 완료된 상태에서만 포인트적립이 가능합니다.
'취소'  : 입금이후로는 고객의 취소가 불가합니다.
'반품'  : 배송완료 후에만 반품처리가 가능합니다.
'품절'  : 주문이나 입금후 상품의 품절된 상태를 나타냅니다.
*/

//==============================================================================
// 쇼핑몰 필수 실행코드 모음 끝
//==============================================================================


include_once(G5_LIB_PATH.'/shop.lib.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

//==============================================================================
// 쇼핑몰 미수금 등의 주문정보
//==============================================================================
/*
$info = get_order_info($od_id);

$info['od_cart_price']      // 장바구니 주문상품 총금액
$info['od_send_cost']       // 배송비
$info['od_coupon']          // 주문할인 쿠폰금액
$info['od_send_coupon']     // 배송할인 쿠폰금액
$info['od_cart_coupon']     // 상품할인 쿠폰금액
$info['od_tax_mny']         // 과세 공급가액
$info['od_vat_mny']         // 부가세액
$info['od_free_mny']        // 비과세 공급가액
$info['od_cancel_price']    // 주문 취소상품 총금액
$info['od_misu']            // 미수금액
*/
//==============================================================================
// 쇼핑몰 미수금 등의 주문정보
//==============================================================================

// 매출전표 url 설정
if($default['de_card_test']) {
    define('G5_BILL_RECEIPT_URL', 'https://testadmin8.kcp.co.kr/assist/bill.BillAction.do?cmd=');
    define('G5_CASH_RECEIPT_URL', 'https://testadmin8.kcp.co.kr/Modules/Service/Cash/Cash_Bill_Common_View.jsp?term_id=PGNW');
} else {
    define('G5_BILL_RECEIPT_URL', 'https://admin8.kcp.co.kr/assist/bill.BillAction.do?cmd=');
    define('G5_CASH_RECEIPT_URL', 'https://admin8.kcp.co.kr/Modules/Service/Cash/Cash_Bill_Common_View.jsp?term_id=PGNW');
}
?>