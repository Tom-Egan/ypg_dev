<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>

<form class="ypg_form" action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="action" value="submit">
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
		<label class="inputLabel">*Name</label>
		<div class="field_highlight"></div>
	</div>
	<!-- phone -->
	<div class="col-md-12">
		<input type="text" name="phone" /> <br>
		<div class="step_circle step2">2</div>
		<label class="inputLabel">*Phone Number</label><br>
		<div class="field_highlight"></div>
	</div>
	<!-- email -->
	<div class="col-md-12">
		<input type="text" name="email" /> <br>
		<div class="step_circle step3">3</div>
		<label class="inputLabel">*Email Address</label><br>
		<div class="field_highlight"></div>
	</div>
	<!-- work experience -->
	<div class="col-md-12">
		
		<label class="checkLabel">Work Experience</label><br>
		<input type="checkbox" name="workXP[]" />Lawn<br>
		<input type="checkbox" name="workXP[]" />Landscape<br>
		<input type="checkbox" name="workXP[]" />Tree Service<br>
		<input type="checkbox" name="workXP[]" />Concrete<br>
		<input type="checkbox" name="workXP[]" />Snow Removal<br>
		<input type="checkbox" name="workXP[]" />Small Engine Mechanic<br>
		<input type="checkbox" name="workXP[]" />Automotive Mechanic<br>
		<input type="checkbox" name="workXP[]" />Diesel Mechanic<br>
		<div class="step_circle step4">4</div>
	</div>
	<!-- certifications -->
	<div class="col-md-12">
		
		<label class="checkLabel">Certifications</label><br>
		<input type="checkbox" name="certs[]" />WI Pesticide Applicator License<br>
		<input type="checkbox" name="certs[]" />Certified Arborist<br>
		<input type="checkbox" name="certs[]" />Master Gardener<br>
		<input type="checkbox" name="certs[]" />CDL<br>
		<input type="checkbox" name="certs[]" />Other<br>
		<div class="step_circle step5">5</div>
	</div>
	<!-- previous employers -->
	<div class="col-md-12">
		
		<label>*Previous Employer(s)</label><br>
		<p id="career_span">Limit: Last five (5) employers.</p>
		<input type="text" name="employer_1" />
		
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
		<textarea rows="6" class="long_text_field" name="intro"></textarea>
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

	<?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $phone=$_REQUEST['phone'];
    $email=$_REQUEST['email'];
    $intro=$_REQUEST['intro'];

    
    if (($name=="")||($phone=="")||($email=="")||($intro==""))
        {
		echo "All fields are required, please fill <a href=\"\">the form</a> again.";
	    }
    else{		
	    $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="$name: YPG Career Form Submission";
        $msg_detail1 = "Name: $name\n";
        $msg_detail2 = "Phone: $phone\n";
        $msg_detail3 = "Email: $email\n";
        $msg_detail4 = "Work Experience: $workXP\n";
        $msg_detail5 = "Certifications: $certs\n";
        $msg_detail6 = "Previous Employers: $prevEmployers\n";
        $msg_detail7 = "About Themselves: $intro\n";
        $msg = $msg_detail1 . $msg_detail2 . $msg_detail3 . $msg_detail4 . $msg_detail5 . $msg_detail6 . $msg_detail7
		mail("info@tom-egan.com", $from, $msg);
		echo "Email sent!";
	    }
    }  
?>