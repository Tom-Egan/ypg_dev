<!-- navigation wrapper -->
<div class="ypg_nav">
	<!-- ypg logo -->
	<div class="ypg_nav_logo">
		<a href="index.html"><img id="ypgLogo" height="64" width="297" src="images/ypg_logo_green.png"></a>
	</div>

	<!-- hamburger button -->
	<button id="hamburger" onclick="toggleHamburger()">
		<div id="ham_line1"></div>
		<div id="ham_line2"></div>
		<div id="ham_line3"></div>
	</button>

	<!-- 1st level mobile navigation -->
	<div id="ypg_nav_mobile">
		<h3>Menu</h3>
		<div class="mobile_link_wrap mobile_active"><a class="mobile_nav_text" href="index.html">Home</a></div>
		<div class="mobile_link_wrap"><a class="mobile_nav_text" href="#">About</a></div>
		<div class="mobile_link_wrap" id="mobile_service_trigger" onclick="toggleMobileService()"><a class="mobile_nav_text" href="#">Services</a></div>
		<div class="mobile_link_wrap"><a class="mobile_nav_text" href="showcase.html">Showcase</a></div>
		<div class="mobile_link_wrap"><a class="mobile_nav_text" href="careers.html">Careers</a></div>
		<div class="mobile_link_wrap"><a class="mobile_nav_text" href="contact.html">Contact</a></div>
		<div id="mobile_phone_btn" class="mobile_link_wrap"><a class="mobile_nav_text" href="#">Call Now: (262) 470-3829</a></div>
	</div>

	<!-- 2nd level mobile navigation: services -->
	<div id="mobile_service_wrap">
		<div class="back_btn_wrap">
			<a href="javascript:void(0)" id="back_btn" onclick="toggleMobileService()"><span><img id="back_arrow" src="images/arrow.png" height="20" width="20"></span>Back</a>
		</div>

		<div class="mobile_service_tile_wrap">
			<div class="col-xs-6 mobile_service_tile">
				<a href="landscape.html">Landscape</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="lawn-and-turf.html">Lawn and Turf</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="tree-service.html">Tree Service</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="hardscape.html">Hardscape</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="concrete.html">Concrete</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="landscape-design.html">Landscape Design</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="maintenance.html">Maintenance</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="plant-health-care.html">Plant Health Care</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="grading-and-drainage.html">Grading and Drainage</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="mosquito-and-tick-control.html">Mosquito and Tick Control</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="firewood-logs-mulch.html">Firewood, Logs, and Mulch</a>
			</div>
			<div class="col-xs-6 mobile_service_tile">
				<a href="snow-and-ice-management.html">Snow and Ice Management</a>
			</div>
		</div>
	</div>

	<!-- desktop nav: links -->
	<div class="ypg_nav_links">
		<a href="index.html">Home</a> 
		<a href="about.html">About</a>
		<a href="javascript:void(0)" id="serviceTrigger" onclick="toggleService()" class="service_drop_trigger">Services<span><img id="drop_arrow" src="images/arrow.png" height="20" width="20"></span></a>
		<a href="showcase.html">Showcase</a>
		<a href="careers.html">Careers</a>
		<a href="contact.html">Contact</a>
	</div>

	<!-- desktop nav: phone number -->
	<div class="ypg_nav_phone">
		<p>(262) 470-3829</p>
	</div>
</div>