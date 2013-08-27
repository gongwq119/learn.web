<?php /* Smarty version Smarty-3.1.13, created on 2013-08-27 05:58:59
         compiled from "smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12080045245215898a308e52-79603114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b06d19c646272078c10cfc04a699bd60ab3df33' => 
    array (
      0 => 'smarty/templates/index.tpl',
      1 => 1377440208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12080045245215898a308e52-79603114',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5215898a372f16_31813467',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5215898a372f16_31813467')) {function content_5215898a372f16_31813467($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>陕西嘉海电梯配件销售有限公司</title>
<link href="css/mainpage.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script language="JavaScript" src="/js/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//Get size of images, how many there are, then determin the size of the image frame.
	var imageWidth = $("#active_window").width();
	var imageSum = $("#active_frame img").size();
	var imageFrameWidth = imageWidth * imageSum;
	var currentPosition = 1;
	var animationLock = false;
	
	//Paging + Slider Function 
	rotate = function(position){
		if (position == currentPosition) {
			return;
		}
		animationLock = true;
		var image_framePosition = (position - 1) * imageWidth; //Determines the distance the image frame needs to slide
		
		//word out 
		$("#words").animate({'left' : '-518px'}, 800, "easeInCirc", function() {
			//chose word 
			switch (position) {
			case 1:
				$("#word_img").attr("src","image/b1.png");
				break;
			case 2:
				$("#word_img").attr("src","image/b2.png");
				break;
			case 3:
				$("#word_img").attr("src","image/b3.png");
				break;
			default:
				break;
			};
		});
		
		//Slider Animation, word run together
		$("#active_frame").delay(600).animate({ 
			left: -image_framePosition
		}, 1200, "easeInOutCirc" );
		$("#words").delay(600).animate({
			left: 0
		}, 800, "easeInOutCirc", function() {
			currentPosition = position;
			animationLock = false;
		});
	}; 

	// button posistion function 
	btnAct = function(btn) {
		$("#active_buttons div").css({'top' : '0px'});
		btn.css({'top' : '-5px'});
	}
	
	//auto silde 
	rotateAuto =function() {
		play = setInterval(function() {
			switch (currentPosition) {
			case 1:
				rotate(2);
				btnAct($("#btn2"));
				break;
			case 2:
				rotate(3);
				btnAct($("#btn3"));
				break;
			case 3:
				rotate(1);
				btnAct($("#btn1"));
				break;
			default:
				break;
			}
		}, 5000);
	}
	
	//initial 
	$("#active_frame").css({'width' : imageFrameWidth});
  	$("#btn1").click(function() {
  		if (animationLock == false) {
  			clearInterval(play);
  			btnAct($(this));
  			rotate(1);
  			rotateAuto();
  		}
	});
  	$("#btn2").click(function() {
  		if (animationLock == false) {
  			clearInterval(play);
  			btnAct($(this));
  			rotate(2);
  			rotateAuto();
  		}
	});
  	$("#btn3").click(function() {
  		if (animationLock == false) {
  			clearInterval(play);
  			btnAct($(this));
  			rotate(3);
  			rotateAuto();
  		}
	});
  	rotateAuto();
});
</script>
</head>
<body>
	<div id="w_all">
	<div id="w1">
		<?php echo $_smarty_tpl->getSubTemplate ("./header.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="w2">
		<?php echo $_smarty_tpl->getSubTemplate ("./navi.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="w3">
		<!-- Begin of the container -->
		<div class="container">
			<div id="active_window">
				<div id="active_frame">
					<a href="#"><img alt="" src="image/1.jpg"></a>
					<a href="#"><img alt="" src="image/2.jpg"></a>
					<a href="#"><img alt="" src="image/3.jpg"></a>
				</div>
				<div id="words">
					<a href="#"><img id="word_img" alt="" src="image/b1.png"></a>
				</div>
				<div id="active_buttons">
					<div id="btn1"></div>
					<div id="btn2"></div>
					<div id="btn3"></div>
				</div>
			</div>
		</div>
		<!-- End of the container -->
	</div>
	<div id="w4">
		<!-- Begin of the links -->
		<div id="links">
			<div id=int_links>
				<div class="link_div" id="cgzn">
					<span>采购指南</span>
					<ul>
						<li><a>购物流程</a></li>
						<li><a>会员介绍</a></li>
						<li><a>配送方式</a></li>
						<li><a>常见问题</a></li>
					</ul>
				</div>
				<div class="link_div" id="shfw">
					<span>售后服务</span>
					<ul>
						<li><a>售后政策</a></li>
						<li><a>取消订单</a></li>
						<li><a>退款说明</a></li>
						<li><a>品质保证</a></li>
					</ul>
				</div>
				<div class="link_div" id="jhpj">
					<span>嘉海配件</span>
					<ul>
						<li><a>关于我们</a></li>
						<li><a>联系方式</a></li>
						<li><a>特别政策</a></li>
					</ul>
				</div>
			</div>
			<div id="logo_links">
			</div>
			<div id="contact">
			</div>
		</div>
		<!-- End of the links -->
	</div>
	<div id="w5">
		<!-- Begin of the footer -->
		<div id="footer">
			<div id="seg_line"></div>
			<div id="ref_links">
				<a href="http://www.sxase.com/" target="_blank">陕西特设协会
				</a>
				|
				<a href="http://www.sh-ea.net.cn" target="_blank">上海电梯行业协会
				</a>
				|
				<a href="http://www.sxltly.com" target="_blank">陕西蓝天楼宇
				</a>
			</div>
			<div id="banquan">Copyright © 2008-2013  陕西嘉海电梯配件销售有限公司 版权所有</div>
			<div id="beian">陕ICP备13006242号</div>
		</div>
		<!-- End of the footer -->
	</div>
	</div>
</body>
</html>
<?php }} ?>