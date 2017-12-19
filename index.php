<?php
	session_start();
	
	include_once './include/config.php';
	include_once './include/functions.php';
	include_once './include/string.php';
	
	if (isset($_GET['lang'])) {
		if (preg_match("/^[0-9]+$/", $_GET['lang'])) {
			@$lang = $_GET['lang'];
			$_SESSION['lang'] = $lang;
			if ($lang < '1' || $lang > $lang_count) { $lang = '1'; $_SESSION['lang'] = '1';} 
		} else { $lang = '1'; $_SESSION['lang'] = '1';}
	}
	
	if (isset($_SESSION['lang'])) {
		if (preg_match("/^[0-9]+$/", $_SESSION['lang'])) {
			@$lang = $_SESSION['lang'];
			if ($lang < '1' || $lang > $lang_count) { $lang = '1'; $_SESSION['lang'] = '1';} 
		} else { $lang = '1'; $_SESSION['lang'] = '1';}
	} else { $lang = '1'; $_SESSION['lang'] = '1';}
	
	if (isset($_GET['page'])) {
		if (preg_match("/^[a-zA-Z0-9_]+$/", $_GET['page'])) {
			@$page = strtolower($_GET['page']);
		} else { $page = 'main'; }
	} else { $page = 'main'; }
	
	if (isset($_GET['do'])) {
		if (preg_match("/^[a-zA-Z0-9_]+$/", $_GET['do'])) {
			@$do = strtolower($_GET['do']);
		} else { $do = ''; }
	} else { $do = ''; }
	
	if (isset($_GET['realm'])) {
		if (preg_match("/^[0-9]+$/", $_GET['realm'])) {
			@$realm_num = $_GET['realm'];
			if ($realm_num < '1' || $realm_num > $realm_count) { $realm_num = '1';} 
		} else { $realm_num = '1'; }
	} else { $realm_num = '1'; }
	
	if (isset($_GET['guid'])) {
		if (preg_match("/^[0-9]+$/", $_GET['guid'])) {
			@$guid = $_GET['guid'];
		} else { $guid = '1'; }
	} else { $guid = '1'; }
	
	if (isset($_GET['vote'])) {
		if (preg_match("/^[0-9]+$/", $_GET['vote'])) {
			@$vote = $_GET['vote'];
			if ($vote < '1' || $vote > $vote_count) { $vote = '';} 
		} else { $vote = ''; }
	} else { $vote = ''; }
	
	if (isset($_SESSION['logined'][$realm_num])) { 
		@$user_logined[$realm_num] = $_SESSION['logined'][$realm_num];
		@$user_guid[$realm_num] = $_SESSION['acc_id'][$realm_num];
	} else { $user_logined[$realm_num] = '0'; }
	
	if ($page == "main"){
		$page_mtitle = @$str[$lang]['0'];
		$page_path = "./modules/main/main_page_$lang.php";
	} elseif($page == "rules"){
		$page_mtitle = @$str[$lang]['1'];
		$page_path = "./modules/rules/rules_page_$lang.php";
	} elseif($page == "about"){
		$page_mtitle = @$str[$lang]['2'];
		$page_path = "./modules/about/about_page_$lang.php";
	} elseif($page == "transfer"){
		$page_mtitle = @$str[$lang]['3'];
		$page_path = "./modules/transfer/transfer_page_$lang.php";
	} elseif($page == "license"){
		$page_mtitle = @$str[$lang]['4'];
		$page_path = "./modules/license/license_page_$lang.php";
	} elseif($page == "online"){
		$page_mtitle = @$str[$lang]['5'];
		$page_path = "./modules/online_page.php";
	} elseif($page == "connect"){
		$page_mtitle = @$str[$lang]['6'];
		$page_path = "./modules/connect/connect_page_$lang.php";
	} elseif($page=="ban"){
		$page_mtitle = @$str[$lang]['7'];
		$page_path = "./modules/ban_page.php";
	} elseif($page=="reg"){
		$page_mtitle = @$str[$lang]['8'];
		$page_path = "./modules/reg_page.php";
	} elseif($page=="statistics"){
		$page_mtitle = @$str[$lang]['9'];
		$page_path = "./modules/statistics_page.php";
	} elseif($page=="tkills"){
		$page_mtitle = @$str[$lang]['10'];
		$page_path = "./modules/tkills_page.php";
	} elseif($page=="tgold"){
		$page_mtitle = @$str[$lang]['11'];
		$page_path = "./modules/tgold_page.php";
	} elseif($page=="tonline"){
		$page_mtitle = @$str[$lang]['12'];
		$page_path = "./modules/tonline_page.php";
	} elseif($page=="armory" && $do == "viewchar"){
		$page_mtitle = @$str[$lang]['13'];
		$page_path = "./modules/armory/view_character.php";
	} elseif($page=="armory" && $do == "search"){
		$page_mtitle = @$str[$lang]['13'];
		$page_path = "./modules/armory/search_character.php";
	} elseif($page=="armory"){
		$page_mtitle = @$str[$lang]['13'];
		$page_path = "./modules/armory/search_character.php";
	} elseif($page=="lk" && $do=="main"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/main_page.php";
	} elseif($page=="lk" && $do=="setpassword"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/set_password.php";
	} elseif($page=="lk" && $do=="setmail"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/set_mail.php";
	} elseif($page=="lk" && $do=="vote"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/vote_page.php";
	} elseif($page=="lk" && $do=="buy"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/buy_page.php";
	} elseif($page=="lk" && $do=="getbonuses"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/donate_page.php";
	} elseif($page=="lk" && $do=="buyitem"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/buy_item_page.php";
	}  elseif($page=="lk" && $do=="buylvl"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/buy_lvl_page.php";
	} elseif($page=="lk" && $do=="buygold"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/buy_gold_page.php";
	} elseif($page=="lk"){
		$page_mtitle = @$str[$lang]['14'];
		$page_path = "./modules/lk/main.php";
	} else {
		$page_mtitle = @$str[$lang]['0'];
		$page_path = "./modules/main/main_page_$lang.php";
	}
	for ($i = 1; $i <= $realm_count; $i++) {
		$ConnectDB[$i] = @mysql_connect($mysql_path[$i], $mysql_login[$i], $mysql_password[$i]);
		$fp[$i] = @fsockopen ($server_path[$i], $server_port[$i], $errno, $errstr, 0.5);
		@mysql_query("SET NAMES '$mysql_cod'", $ConnectDB[$i]);
	}
	$ConnectDB['cms'] = @mysql_connect($mysql_path['cms'], $mysql_login['cms'], $mysql_password['cms']);
	@mysql_query("SET NAMES '$mysql_cod'", $ConnectDB['cms']);
?>

<html>
	<head>
		<link rel="shortcut icon" href="./favicon.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
		<title><?php echo $site_title;?></title>
		<link type="text/css" href="./style/main.css" rel="stylesheet" />
				<style type="text/css">
*{margin:0;padding:0}
body{font-family:verdana}
#menu{position:relative;width:100%;height:30px;z-index:100;border-bottom:solid 3px #141414;background:#141414;margin-bottom:10px}
	#menu ul{list-style:none;font-size:0.85em;position:absolute;left:0;top:0}
		#menu li{float:left}
			#menu li a{display:block;text-decoration:none;float:left;height:30px;line-height:30px;padding:0 20px;background:#141414;color:#cdcdcd}
#content{clear:both;margin:0 10px;background:#141414;height:100px;text-align:center;line-height:90px;font-weight:bold}
 </style>

		<script type="text/javascript" src="./style/main.js"></script>
		<script type="text/javascript" src="./style/utils.js"></script>
		<script type="text/javascript" src="./style/my_tooltip.js"></script>
    <script type="text/javascript" src="/style/mootools.js"></script>
		 		<script type="text/javascript">
window.addEvent('domready', function(){
	$$('#menu a').each(function(el) {    
		var fx = new Fx.Morph(el,{duration:700,transition:Fx.Transitions.Bounce.easeOut,link:'cancel'});  
		el.addEvents({  
			'mouseenter': function() {fx.start({'padding-top':30, 'background-color':'#903779'});},
			'mouseleave': function() {fx.start({'padding-top':0, 'background-color':'#141414'});}
		});  
	});   
});
</script>
    
		
	</head>
	<body>
	<div id="menu">
		<ul>
			<li><a href="/" title="">Главная</a></li>
			<li><a href="/cp/" title="">Личный кабинет</a></li>
			<li><a href="/?page=reg" title="">Регистрация</a></li>
			<li><a href="/?page=connect" title="">Как начать?</a></li>
			<li><a href="/forum/" title="">Форум</a></li>
		</ul>
	</div>

		<div class="header"></div>
		<div class="main_contaner">
			<div class="sb_contaner">
				<div style="height: 20;"></div>
				<?php include './include/sitemenu_page.php';?>
				<div style="height: 10;"></div>
				<?php include './modules/s_status/s_status_block.php';?>
				<div style="height: 10;"></div>
				<?php include './modules/wm_page.php';?>
				<div style="height: 10;"></div>
				<?php include './modules/lang_page.php';?>
			</div>
			<div class="block_sep"></div>
			<div class="mb_contaner">
				<?php include $page_path;?>
				<div class="footer"><?php include './modules/footer.php';?></div>
			</div>
		</div>
	</body>
</html>

<?php 
	for ($i = 1; $i <= $realm_count; $i++) {
		@mysql_close($ConnectDB[$i]);
		@fclose($fp[$i]);
	}
?>