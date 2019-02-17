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
<?php  
    $query = "SELECT * FROM tbl_footer WHERE id='1'";
    $copyright = $db->select($query);
    if ($copyright) {
    while ($result = $copyright->fetch_assoc()) {

?> 
		<p>&copy; <?php echo $result['note']; ?></p>
<?php } } ?>
	</div>
<?php  
/*Social Link*/
    $query = "SELECT * FROM tbl_social WHERE id='1'";
    $social = $db->select($query);
    if ($social) {
    while ($result = $social->fetch_assoc()) {

?>  
	<div class="fixedicon clear">
		<a target="_blank" href="<?php echo $result['fb'] ?>"><img src="img/social/fb.png" alt="FAcebook" /></a>
		<a target="_blank" href="<?php echo $result['tw'] ?>"><img src="img/social/twitter.png" alt="Twitter" /></a>
		<a target="_blank> href="<?php echo $result['gp'] ?>"><img src="img/social/googleplus.png" alt="Google Pluse" /></a>
		<a target="_blank" href="<?php echo $result['ln'] ?>"><img src="img/social/linkedin.png" alt="Linkedin" /></a>
		<a target="_blank" href="<?php echo $result['fb'] ?>"><img src="img/social/youtube.png" alt="Youtube" /></a>
	</div>
<?php } } ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-63535195-1', 'auto');
		ga('send', 'pageview');
	</script>

	<script type="text/javascript">
		var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="img/arrow_up.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();
	</script>


</body>

</html>