<?php
include_once('./_common.php');

$def_locale = setlocale(LC_CTYPE, 0);
$locale_change = false;
if(preg_match("/utf[\-]?8/i", $def_locale)) {
    setlocale(LC_CTYPE, 'ko_KR.euc-kr');
    $locale_change = true;
}

if ($default['de_card_test']) {
    if ($default['de_escrow_use'] == 1) {
        // 에스크로결제 테스트
        $default['de_kcp_mid'] = "T0007";
        $default['de_kcp_site_key'] = '4Ho4YsuOZlLXUZUdOxM1Q7X__';
    }
    else {
        // 일반결제 테스트
        $default['de_kcp_mid'] = "T0000";
        $default['de_kcp_site_key'] = '3grptw1.zW0GSo4PQdaGvsF__';
    }
}
else {
    $default['de_kcp_mid'] = "SR".$default['de_kcp_mid'];
}

$g_conf_site_cd = $default['de_kcp_mid'];
$g_conf_site_key = $default['de_kcp_site_key'];
$g_conf_home_dir  = G5_SHOP_PATH.'/kcp';
$g_conf_key_dir   = '';
$g_conf_log_dir   = '';
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
{
    $g_conf_key_dir   = G5_SHOP_PATH.'/kcp/bin/pub.key';
    $g_conf_log_dir   = G5_SHOP_PATH.'/kcp/log';
}

if (preg_match("/^T000/", $g_conf_site_cd) || $default['de_card_test']) {
    $g_conf_gw_url  = "testpaygw.kcp.co.kr";
}
else {
    $g_conf_gw_url  = "paygw.kcp.co.kr";
    if (!preg_match("/^SR/", $g_conf_site_cd)) {
        alert("SR 로 시작하지 않는 KCP SITE CODE 는 지원하지 않습니다.");
    }
}

$g_conf_log_level = "3";
$g_conf_gw_port   = "8090";

include_once(G5_SHOP_PATH.'/kcp/pp_ax_hub_lib.php');

$req_tx         = 'mod_escrow';
$mod_type       = 'STE1';
$mod_desc       = '에스크로 배송시작 등록';
$cust_ip        = getenv('REMOTE_ADDR');

$c_PayPlus = new C_PP_CLI;
$c_PayPlus->mf_clear();

$tran_cd = "00200000";

// 에스크로 상태변경
$tno_count = count($escrow_tno);
for($i=0; $i<$tno_count; $i++) {
    if(!$escrow_tno[$i] || !$escrow_corp[$i] || !$escrow_numb[$i])
        continue;

    $c_PayPlus->mf_set_modx_data( "tno",        $escrow_tno[$i]  );
    $c_PayPlus->mf_set_modx_data( "mod_type",   $mod_type        );
    $c_PayPlus->mf_set_modx_data( "mod_ip",     $cust_ip         );
    $c_PayPlus->mf_set_modx_data( "mod_desc",   $mod_desc        );

    $c_PayPlus->mf_set_modx_data( "deli_numb",  $escrow_numb[$i] );
    $c_PayPlus->mf_set_modx_data( "deli_corp",  $escrow_corp[$i] );

    $c_PayPlus->mf_do_tx( $trace_no, $g_conf_home_dir, $g_conf_site_cd, $g_conf_site_key, $tran_cd, "",
                          $g_conf_gw_url, $g_conf_gw_port, "payplus_cli_slib", $ordr_idxx,
                          $cust_ip, "3" , 0, 0, $g_conf_key_dir, $g_conf_log_dir); // 응답 전문 처리

    $res_cd  = $c_PayPlus->m_res_cd;  // 결과 코드
    $res_msg = $c_PayPlus->m_res_msg; // 결과 메시지
}

if($locale_change)
    setlocale(LC_CTYPE, $def_locale);
?>