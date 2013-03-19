 <!--
	CMSC128 AB-3L GROUP 4 PROJECT: HOTEL 128 Reservation System
	Claudine Bael
	Theresa Mercado
	Anitsirc Ybur Haniel
	Renee Chiarianne Navarrosa
	Kevin Lawrence Romas
	
	Description: Footer that contains the Back to Top Button
 -->
<html>
	<head>
		<script>
		$(document).ready(function(){
			$("#back-top").hide();
			
			$(function () {
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$('#back-top').fadeIn();
					} else {
						$('#back-top').fadeOut();
					}
				});

				$('#back-top a').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
				});
			});

		});
		</script>
	</head>
	
	<body>
		<footer id="page_footer">
			<span class = "allTextBlack"><strong>HRM &copy; 2013</strong></span>	
		</footer>
		<p id ="back-top">
			<a href = "#"><span></span>Back to Top</a>
		</p>
	</body>
</html>