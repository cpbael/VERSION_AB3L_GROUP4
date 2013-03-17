<?php
	require_once"sql_connect.php";
	require_once"process_check_if_logged_in.php";
	$edit_url="edit_account.php";
	$edit_url=rawurlencode($edit_url);
	$info=mysql_fetch_assoc(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));
?>
<html>
    <head>
        <title>HOTEL 128</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="MainStyle.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="javascript.js"></script>
		<link rel="stylesheet" href="PopUpStyle.css" />
<script type="text/javascript" src="tinybox.js"></script>
        <style>
			body{
				background:#333 url(temp/7.jpg) repeat left;
				background-size:1400px 900px;
				font-family:Arial;
			}
			span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:12px;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				text-shadow:1px 1px 1px #000;
				margin-right:30px;
			}
			span.reference a:hover{
				color:#ddd;
			}
			ul.sdt_menu{
				margin-top:150px;
			}
			h1.title{
				text-indent:-9000px;
				background:transparent url(title.png) no-repeat top left;
				width:633px;
				height:69px;
			}
		</style>
		
        <script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
			function randomToN(maxVal){
					var randVal = Math.random() * maxVal;
					return typeof 0 == 'undefined' ? Math.round(randVal) : randVal.toFixed(0);
				};
				var list = [ "1.jpg", "2.jpg"], 
					ram = list[parseFloat(randomToN(list.length))], 
					img = ram == undefined || ram == null ? list[0] : ram; 
				$("div#ID").css("backgroundImage", "url(" + img + ")"); 
				
            $(function() {
				
                $('#sdt_menu > li').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'170px',
							'height':'170px',
							'left':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'140px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'170px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '170px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-170px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'25px'},500);
				});
            });
        </script>
		
	<script type="text/javascript">
		function openJS(){alert('loaded')}
		function closeJS(){alert('closed')}
	</script>
    </head>

    <body>
		<div class="content">
			
			<ul id="sdt_menu" class="sdt_menu">
				<li>
					<a href="#">
						<img src="temp/2.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">HOME</span>
							<span class="sdt_descr">Get to know us</span>
						</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="temp/4.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Account</span>
							<span class="sdt_descr">View/Edit Account</span>
						</span>
					</a>
					<div class="sdt_box">
						<span onclick="TINY.box.show({url:'PopUpLogOut.php',width:300,height:200})"><a href="process_logout.php">Log Out</a></span>
						<span onclick="TINY.box.show({url:'PopUpEdit.php',width:300,height:350})"><a href="#">Edit Account
						</a></span>
						<span><a href="user_reservations.php">View Reservation History</a></span>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="temp/3.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Services</span>
							<span class="sdt_descr">View Hotel Services</span>
						</span>
					</a>
					<div class="sdt_box">
						<span><a href="show_rooms.php">View Rooms</a></span>
						<span><a href="show_facilities.php">View Facilities</a></span>						
						<span><a href="show_other_services.php">Other Services</a></span>
						
					</div>
				</li>
				<li>
					<a href="#">
						<img src="temp/6.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">SEARCH</span>
							<span class="sdt_descr">Choose a Category</span>
						</span>
					</a>
					<div class="sdt_box">
						<span onclick="TINY.box.show({url:'PopUpSearch.php',width:300,height:150})"><a href="#">Rate</a></span>
						<span onclick="TINY.box.show({url:'PopUpSearchByAvailability.php',width:300,height:150})"><a href="#">Availability</a></span>						
						<span onclick="TINY.box.show({url:'PopUpSearchKeyword.php',width:300,height:150})"><a href="#">Any Keyword</a></span>
						
					</div>
				</li>
			</ul>
		</div>
	</body>
</html>
	
