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
	

	<div class="rel_fix"></div>
</form>
</div>

<div class="rel_fix"></div>

</div>

<script async src="js/nav_toggle.js"> </script>

</body>
</html>