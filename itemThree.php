<?php
	include "inc/header.php";
?>

		<div class="containsection contempleate clear">
			<div class="maincontain clear myitem">
	
				<div class="sorting">
					<h1>All Catagoris</h1>

		<div id="filters" class="button-group">  <button class="button is-checked" data-filter="*">show all</button>
				<button class="button" data-filter=".metal">PHP</button>
				<button class="button" data-filter=".transition">JAVA</button>
				<button class="button" data-filter=".alkali, .alkaline-earth">PYTHON</button>
				<button class="button" data-filter=":not(.transition)">HTML</button>
				<button class="button" data-filter=".metal:not(.transition)">CSS</button>
		</div>


<div class="grid">
		  <div class="element-item transition metal " data-category="transition">
		    	<img src="img/php.png" alt="">
		  </div>
		  <div class="element-item metalloid " data-category="metalloid">
		   	 	<img src="img/java.png" alt="">
		  </div>
		  <div class="element-item post-transition metal " data-category="post-transition">
		  	   <img src="img/php.png" alt="">
		  </div>
		  <div class="element-item post-transition metal " data-category="post-transition">
		   		<img src="img/java.png" alt="">
		  </div>
		  <div class="element-item transition metal " data-category="transition">
		    	<img src="img/php.png" alt="">
		  </div>
		  <div class="element-item alkali metal " data-category="alkali">
		   		<img src="img/java.png" alt="">
		  </div>
		 
</div>

				</div>
		
				
			</div>
			
		<?php 
			include "inc/sidebar.php";
		 ?>

			</div>
		</div>
		<div class="footersection templeate clear">

			<div class="footermenu clear">
				<ul>
					<li><a href="#">HOME</a></li>
					<li><a href="#">ABOUT</a></li>
					<li><a href="#">CONTACT</a></li>
					<li><a href="#">PRIVACY</a></li>
				</ul>
			</div>

			<p>&copy; Zillur Rahman</p>
		</div>
		<div class="fixedicon clear">
			<a href="#"><img src="img/social/fb.png" alt="FAcebook" /></a>
			<a href="#"><img src="img/social/twitter.png" alt="Twitter" /></a>
			<a href="#"><img src="img/social/googleplus.png" alt="Google Pluse" /></a>
			<a href="#"><img src="img/social/linkedin.png" alt="Linkedin" /></a>
			<a href="#"><img src="img/social/youtube.png" alt="Youtube" /></a>
		</div>
		
	</body>
	</html>