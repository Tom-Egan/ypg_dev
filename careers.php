<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS: Main -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Lato Light, Reg, Bold -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700" rel="stylesheet">


	<title></title>

	<script type="text/javascript">
		var i = 1;
		function addEmployer() {
			if (i <= 4) {
				i++;
				var div = document.createElement('div');
				div.innerHTML = '<input type="text" class="newEmployerInput" name="prevEmployer_' + i +'"><div class="field_highlight employer_highlight2"></div><input type="button" value="remove" onclick="removeEmployer(this)">';

				document.getElementById('newEmployer').appendChild(div);
			}
		}

		function removeEmployer(div) {
			document.getElementById('newEmployer').removeChild(div.parentNode);
			i--;
		}

	</script>
</head>
<body>

<!-- overlay tint when service dropdown is active -->
<div id="drop_overlay"></div>
<?php include 'modules/nav.php'; ?>

<!-- desktop mega menu -->
<?php include 'modules/nav_desktop_megamenu.php'; ?>

<!-- subpage hero -->
<div class="subpage_hero_wrap">
	<div class="subpage_hero_image careers_hero">
		<div class="ypg_wrap">
			<div class="subpage_hero_text">
				<h1>Join the <span class="bold">YPG Team</span></h1>
			</div>
		</div>
	</div>
</div>

<div class="ypg_wrap subpage">
<div class="col-md-5 career_intro">
<p>
Thanks for your interest in working at Your Personal Gardener. Please fill out this brief form and you will receive a response shortly. If you have any questions, feel free to give us a call at <span class="bold accent_orange">(262) 470-3829</span>! We look forward to potentially working together in the near future.</p>

<h4>James Chesebro</h4>
<span>Owner, Your Personal Gardener, LLC</span>
</div>

<div class="col-md-1"></div>

<!-- form -->
<div class="col-md-6">

<?php
    $error = '';
    $name = '';
    $phone = '';
    $email = '';
    $description = '';
    $prevEmployers1 = '';
    $prevEmployers2 = '';
    $prevEmployers3 = '';
    $prevEmployers4 = '';
    $prevEmployers5 = '';

    // if submit button pressed
    if(isset($_POST['careerSubmit'])) {

	    $name   = $_POST['name'];
	    $email    = $_POST['email'];
	    $phone  = $_POST['phone'];
	    $workXP = join(", ", $_REQUEST["workXP"]);
	    $certs = join(", ", $_REQUEST["certs"]);
	    $prevEmployers1 = $_POST['prevEmployer_1'];
	    $prevEmployers2 = $_POST['prevEmployer_2'];
	    $prevEmployers3 = $_POST['prevEmployer_3'];
	    $prevEmployers4 = $_POST['prevEmployer_4'];
	    $prevEmployers5 = $_POST['prevEmployer_5'];
	    // $prevEmployers = join(", ", $prevEmployers1 . $prevEmployers2 . $prevEmployers3 . $prevEmployers4 . $prevEmployers5);
	    $description = $_POST['description'];


    if(trim($name) == '') {
      $error = '<div class="error_message">* You must enter your name.</div>';
    } else if(trim($email) == '') {
      $error = '<div class="error_message">* Please enter a valid email address.</div>';

    } else if(!formatPhoneNumber($phone)) {
      $error = '<div class="error_message">* Phone number can only contain digits.</div>';

    } else if(!isEmail($email)) {
      $error = '<div class="error_message">* You have enter an invalid e-mail address.</div>';
    }

    if(trim($description) == '') {
      $error = '<div class="error_message">* Please enter a description about yourself.</div>';
    }

    if($error == '') {
      if(get_magic_quotes_gpc()) {
        $description = stripslashes($description);
      }

    // where the form is sending the submission
    $address = "info@tom-egan.com";

    // email subject line
    $e_subject = $name . ': YPG Career Form Submission';


    // Configuration option.
    $e_content ="Name: $name \nEmail: $email\nPhone: $phone \n\n-----------------\nWork Experience\n-----------------\n$workXP\n\n\n----------------\nCertifications\n----------------\n$certs \n\n\n--------------------\nPrevious Employers\n--------------------\n1. $prevEmployers1\n2. $prevEmployers2\n3. $prevEmployers3\n4. $prevEmployers4\n5. $prevEmployers5\n\n\n---------------------------------------------------------\nEmployment description and why they want to work at YPG\n---------------------------------------------------------\n$description"; 


    $msg = $e_content . $e_reply;

    if(mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n"))
    {
      // Email has sent successfully, echo a success page.
       echo "<h4>Thanks $name! Your submission was successful, we will reach out to you shortly.</h4>";
     } else echo "Error. Submission was unsuccessful, please reload the page.";

    }
  }

    if(!isset($_POST['careerSubmit']) || $error != '') // Do not edit.
    {
?>


<?php echo $error; ?>


<form class="ypg_form" action="" method="POST">

<div class="stepper_wrap">
	<div class="step_line"></div>
</div>
	<div class="col-md-12">
		<p class="required">* denotes required fields.</p>
	</div>
	<!-- name -->
	<div class="col-md-12">
		
		<input type="text" name="name" /> <br>
		<div class="step_circle step1">1</div>
		<label class="inputLabel" value="<?php echo $name; ?>">*Name</label>
		<div class="field_highlight"></div>
	</div>
	<!-- phone -->
	<div class="col-md-12">
		<input type="text" name="phone" /> <br>
		<div class="step_circle step2">2</div>
		<label class="inputLabel" value="<?php echo $phone; ?>">*Phone Number</label><br>
		<div class="field_highlight"></div>
	</div>
	<!-- email -->
	<div class="col-md-12">
		<input type="text" name="email" /> <br>
		<div class="step_circle step3">3</div>
		<label class="inputLabel" value="<?php echo $email; ?>">*Email Address</label><br>
		<div class="field_highlight"></div>
	</div>
	<!-- work experience -->
	<div class="col-md-12">
		
		<label class="checkLabel">Work Experience</label><br>
		<input type="checkbox" name="workXP[]" value="Lawn"/>Lawn<br>
		<input type="checkbox" name="workXP[]" value="Landscape"/>Landscape<br>
		<input type="checkbox" name="workXP[]" value="Tree Service"/>Tree Service<br>
		<input type="checkbox" name="workXP[]" value="Concrete"/>Concrete<br>
		<input type="checkbox" name="workXP[]" value="Snow Removal"/>Snow Removal<br>
		<input type="checkbox" name="workXP[]" value="Small Engine Mechanic"/>Small Engine Mechanic<br>
		<input type="checkbox" name="workXP[]" value="Automotive Mechanic"/>Automotive Mechanic<br>
		<input type="checkbox" name="workXP[]" value="Diesel Mechanic"/>Diesel Mechanic<br>
		<div class="step_circle step4">4</div>
	</div>
	<!-- certifications -->
	<div class="col-md-12">
		
		<label class="checkLabel">Certifications</label><br>
		<input type="checkbox" name="certs[]" value="WI Pesticide Applicator License" />WI Pesticide Applicator License<br>
		<input type="checkbox" name="certs[]" value="Certified Arborist"/>Certified Arborist<br>
		<input type="checkbox" name="certs[]" value="Master Gardener" />Master Gardener<br>
		<input type="checkbox" name="certs[]" value="CDL"/>CDL<br>
		<input type="checkbox" name="certs[]" value="Other"/>Other<br>
		<div class="step_circle step5">5</div>
	</div>
	<!-- previous employers -->
	<div class="col-md-12">
		
		<label>*Previous Employer(s)</label><br>
		<p id="career_span">Limit: Last five (5) employers.</p>
		<input type="text" name="prevEmployer_1" value="<?php echo $prevEmployer_1; ?>" />
		
		<div class="field_highlight employer_highlight"></div>
		<!-- placeholder space for new input boxes -->
		<div id="newEmployer"></div>
		
		<br>
		<div class="step_circle step6">6</div>
		<!-- add additional employers -->
		<input type="button" onclick="addEmployer()" id="addEmployerBtn" value="Add Employer" />
	</div>
	<!-- tell us about yourself -->
	<div class="col-md-12">
		
		<label>*Tell Us About Yourself</label><br>
		<p id="career_span">Talk about your past work experience, why you are interested in working at YPG, and a little about yourself.</p>
		<textarea rows="6" class="long_text_field" name="description"></textarea>
		<div class="textarea_highlight"></div>
		<div class="step_circle step7">7</div>
	</div>

	<div class="col-md-12">
		
		<div class="g-recaptcha" data-sitekey="6LfYESUUAAAAAA8dUEJls7CvT_vCSxbuUSRrJ8zv"></div>
		<div class="step_circle step8">8</div>
	</div>

	<!-- submit -->
	<div class="col-md-12">
		
		<input type="submit" value="Send" name="careerSubmit">
		<div class="step_circle step9">9</div>
	</div>

<?php }

function isEmail($email) { // Email address verification, do not edit.
return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

function formatPhoneNumber($phone) {
    $phoneNumber = preg_replace('/[^0-9]/','',$phone);

    if(strlen($phone) > 10) {
        $countryCode = substr($phoneNumber, 0, strlen($phone)-10);
        $areaCode = substr($phone, -10, 3);
        $nextThree = substr($phone, -7, 3);
        $lastFour = substr($phone, -4, 4);

        $phone = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phone) == 10) {
        $areaCode = substr($phone, 0, 3);
        $nextThree = substr($phone, 3, 3);
        $lastFour = substr($phone, 6, 4);

        $phone = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phone) == 7) {
        $nextThree = substr($phone, 0, 3);
        $lastFour = substr($phone, 3, 4);

        $phone = $nextThree.'-'.$lastFour;
    }

    return $phone;
}

?>



<!-- footer -->
<!-- <div class="footer_top_border">
</div> -->
<div class="footer_bg">
	<div class="ypg_wrap">
		<!-- company -->
		<div class="col-md-3 footer_side_box">
			<h4>Company</h4>
			<ul>
				<li><a href="about.html">About</a></li>
				<li><a href="careers.html">Careers</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="portfolio.html">Portfolio</a></li>
			</ul>
		</div>

		<!-- services -->
		<div class="col-md-6 footer_center_service">
			<!-- row 1 -->
			<div class="row">
				<!-- landscape -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Landscape</a>
				</div>
				<!-- lawn and turf -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Lawn and Turf</a>
				</div>
				<!-- tree service -->
				<div class="col-md-4 footer_grid_box right_border">
					<a href="">Tree Service</a>
				</div>
			</div> 
			<!-- row 2 -->
			<div class="row">
				<!-- hardscape -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Hardscape</a>
				</div>
				<!-- concrete -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Concrete</a>
				</div>
				<!-- landscape design -->
				<div class="col-md-4 footer_grid_box right_border">
					<a href="">Landscape Design</a>
				</div>
			</div>
			<!-- row 3 -->
			<div class="row">
				<!-- maintenance -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Maintenance</a>
				</div>
				<!-- plant health care -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Plant Health Care</a>
				</div>
				<!-- grading and drainage -->
				<div class="col-md-4 footer_grid_box right_border">
					<a href="">Grading and Drainage</a>
				</div>
			</div>
			<!-- row 4 -->
			<div class="row">
				<!-- mosquito and tick control -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Mosquito and Tick Control</a>
				</div>
				<!-- firewood, logs, and mulch -->
				<div class="col-md-4 footer_grid_box">
					<a href="">Firewood, Logs, and Mulch</a>
				</div>
				<!-- snow and ice management -->
				<div class="col-md-4 footer_grid_box right_border">
					<a href="">Snow and Ice Management</a>
				</div>
			</div> <!-- end of row 4 -->
		</div> <!-- end of col-md-6 -->

		<!-- contact -->
		<div class="col-md-3 footer_side_box right_align">
			<h4>Contact</h4>
			<ul>
				<li><a href="#">(262) 470-3829</a></li>
				<li><a href="#">YourPersonalGardenerLLC@gmail.com</a></li>
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Google+</a></li>
			</ul>
		</div> 
		<!-- awards and affiliates -->
		<div class="row_buffer">
			<div class="row awards_row">
				<div class="col-md-12">
					<h4>Awards and Affiliates</h4>
				</div>
			<!-- 2017 expertise award -->
				<div class="col-sm-2"><img title="Expertise.com's Top 25 Best Milwaukee Landscapers for 2017" alt="Expertise.com's Top 25 Best Milwaukee Landscapers for 2017" height="130" width="130" class="img-responsive" src="images/affiliates-awards/award_expertise2017.svg"></div>
				<!-- 2016 expertise award -->
				<div class="col-sm-2"><img title="Expertise.com's Top 25 Best Milwaukee Landscapers for 2016" alt="Expertise.com's Top 25 Best Milwaukee Landscapers for 2016" height="130" width="130" class="img-responsive" src="images/affiliates-awards/award_expertise2016.svg"></div>
				<!-- 2015 gold leaf award -->
				<div class="col-sm-2"><img title="2015 Gold Leaf Award" alt="2015 Gold Leaf Award" height="150" width="180" class="img-responsive" src="images/affiliates-awards/award_gold_leaf.png"></div>
				<!-- simply the best 2016 -->
				<div class="col-sm-2"><img title="2016 Mukwonago Area's 'Simply the Best' Landscape and Lawn Maintenance Company" alt="2016 Mukwonago Area's 'Simply the Best' Landscape and Lawn Maintenance Company" height="130" width="106" class="img-responsive" src="images/affiliates-awards/award_best_2016_130.png"></div>
				<!-- simply the best 2015 -->
				<div class="col-sm-2"><img title="2015 Mukwonago Area's 'Simply the Best' Landscape and Lawn Maintenance Company" alt="2015 Mukwonago Area's 'Simply the Best' Landscape and Lawn Maintenance Company" height="130" width="106" class="img-responsive" src="images/affiliates-awards/award_best_2015_130.png"></div>
				<!-- simply the best 2014 -->
				<div class="col-sm-2"><img title="2014 Mukwonago Area's 'Simply the Best' Landscape and Lawn Maintenance Company" alt="2014 Mukwonago Area's 'Simply the Best' Landscape and Lawn Maintenance Company" height="130" width="105" class="img-responsive" src="images/affiliates-awards/award_best_2014_130.png"></div>
			</div>

			<div class="row awards_row">
				<!-- wisconsin landscape contractor association -->
				<div class="col-sm-2"><img title="Wisconsin Landscape Contractors Association" alt="Wisconsin Landscape Contractors Association" height="130" width="357" class="img-responsive wlca" src="images/affiliates-awards/afil_wlca_130.png"></div>
				<!-- mukwonago chamber of commerce -->
				<div class="col-sm-2"><img title="Mukwonago Area Chamber of Commerce and Tourism Center" alt="Mukwonago Area Chamber of Commerce and Tourism Center" height="130" width="130" class="img-responsive" src="images/affiliates-awards/afil_muk_coc_130.png"></div>
				<!-- master gardener -->
				<div class="col-sm-2"><img title="UW-Extension Master Gardener Program" alt="UW-Extension Master Gardener Program" height="130" width="130" class="img-responsive" src="images/affiliates-awards/afil_master_gardener_130.png"></div>
				<!-- pesticide applicator -->
				<div class="col-sm-2"><img title="UW-Extension Pesticide Applicator Training Program" alt="UW-Extension Pesticide Applicator Training Program" height="130" width="130" class="img-responsive" src="images/affiliates-awards/afil_pat_130.png"></div>
				<!-- wisconsin arborist association -->
				<div class="col-sm-2"><img title="Wisconsin Arborist Association" alt="Wisconsin Arborist Association" height="130" width="130" class="img-responsive" src="images/affiliates-awards/afil_waa_130.png"></div>
				<!-- isa member -->
				<div class="col-sm-2"><img title="ISA Member" alt="ISA Member" height="129" width="82" class="img-responsive" src="images/affiliates-awards/afil_isa_130.png"></div>
			</div>
		</div> <!-- end of row -->

		<div class="row copyright">
		<p>&copy;2017 Your Personal Gardener, LLC. All rights reserved.</p>
		<p>Designed and handbuilt by <a title="The YPG website was designed and built from scratch by Tom Egan, come take a look at some of his other projects." alt="This website was designed and built from scratch by Tom Egan, come take a look at some of his other projects." target="_blank" href="http://tom-egan.com">Tom Egan</a>.</p>
		</div>
	</div> <!-- end of ypg_wrap -->

	<!-- relative/clear fix -->
	<div class="rel_fix"></div>

</div> <!-- end of footer_bg -->




<script async src="js/nav_toggle.js"> </script>
<script async src='https://www.google.com/recaptcha/api.js'></script>



</body>
</html>