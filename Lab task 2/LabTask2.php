<?php
$name=$Email=$gender=$DEGREE=$dob=$bldgrp="";
$name_err=$email_err=$gen_err=$deg_err=$date_err=$month_err=$year_err=$bld_err="";

if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['btn_name']))
	{
		if(empty($_POST['name']))
		{
			$name_err="NAME CAN NOT BE EMPTY";
		}
        else
        {
           if(str_word_count($_POST['name'])<=1)
		   {
		   	$name_err="NAME CAN NOT BE less than 2 WORDS";
		   }
		   else
		   {
		    if(!preg_match("/^[a-z]/i", $_POST['name']))
		    {
		    	 $name_err="MUST START WITH A LETTER";
		    }
		    else
		    {
		       if(!preg_match("/[a-z]- \./i", $_POST['name']) && !strstr($_POST['name'],' '))
		       {
		       	$name_err="SPECIAL CHARACTER IS PROHIBITED";
		       }
		       else
		       {
			      $name=htmlspecialchars($_POST['name']);
		       }
		    }   
		}
	}   
	}
	if(isset($_POST['btn_email']))
	{
		if(empty($_POST['Email']))
		{
			$email_err="EMAIL CAN NOT BE EMPTY";
		}
		else
		{
		if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))
		{
			$email_err="PLEASE GIVE A VALID EMAIL";
		}
		else
		{
			$Email=htmlspecialchars($_POST['Email']);
		}
	    }
	}
	if(isset($_POST['btn_dob']))
	{
		if(empty($_POST['date']))
		{
			$date_err="DATE CAN NOT BE EMPTY";
		}	
		else
		{
		   if(($_POST['date']+0)>=32 || ($_POST['date']+0)<=0)
		   {
		   $date_err="INVALID DATE";
		   }
		}	    	
		if(empty($_POST['month']))
		{
			$month_err="MONTH CAN NOT BE EMPTY";
		}
	    else
	    {
		   if(($_POST['month']+0)>=13 || ($_POST['month']+0)<=0)
		   {
		    $month_err="INVALID month";
		   }
	    }   
		if(empty($_POST['year']))
		{
			$year_err="YEAR CAN NOT BE EMPTY";
		}
		else
		{
		if(($_POST['year']+0)<=1952 || ($_POST['year']+0)>=1999)
		{
			$year_err="INVALID year";
		}
		}
	    
	}

	if(isset($_POST['btn_gender']))
	{
		if(empty($_POST['gender']))
		{
			$gen_err="GENDER CAN NOT BE EMPTY";
		}
	}

	if(isset($_POST['btn_bldgrp']))
	{
		if(empty($_POST['bldgrp']))
		{
			$bld_err="PLEASE SELECT A BLOOD GROUP";
		}
	}
	if(isset($_POST['btn_degree']))
	{
		if(count($_POST['deg'])<=1)
		{
			$deg_err="PLEASE SELECT AT LEAST TWO DEGREE";
		}	
	}
}

?>

</!DOCTYPE html>
<html>
<head>
	<title>lab_2</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <fieldset style="width: 250px">
		<LEGEND>EMAIL</LEGEND>
	    <input type="email" name="Email" size="25" ><span><?php echo $email_err;?></span>
	    <hr>
	    <input type="submit" name="btn_email">
   </fieldset>

   <fieldset style="width: 250">
   	    <legend>DATE OF BIRTH</legend>
        <pre>   dd      mm      yyyy</pre>
   	    <input type="number" name="date" size="2" >&#32;&#47;&#32;
   	    <input type="number" name="month" size="2">&#32;&#47;&#32;
   	    <input type="number" name="year" size="4" >
   	    <div><div><?php echo $date_err;?></div><div><?php echo $month_err;?></div><div><?php echo $year_err;?></div></div>
   	    <hr>
	    <input type="submit" name="btn_dob">
   </fieldset>

    <fieldset style="width: 200px">
   	    <legend>GENDER</legend>
   	    <input type="radio" name="gender"value="Male">Male
   	    <input type="radio" name="gender"value="fmale">Female
   	    <input type="radio" name="gender"value="others">others
   	    <div><?php echo $gen_err;?></div>
   	    <hr>
	    <input type="submit" name="btn_gender">
   </fieldset>

   <fieldset style="width: 250px">
   	    <legend>DEGREE</legend>
   	    <input type="checkbox" name="deg[]" value="SSC">SSC
   	    <input type="checkbox" name="deg[]" value="HSC">HSC
   	    <input type="checkbox" name="deg[]" value="BSc">BSc
   	    <input type="checkbox" name="deg[]" value="MSc">MSc
   	    <div><?php echo $deg_err;?></div> 
   	    <hr>
	    <input type="submit" name="btn_degree">
   </fieldset>

   <fieldset style="width: 200px">
   	    <legend>BLOOD GROUP</legend>
   	    <select name="bldgrp">
   	    	<option selected disabled value=""></option>
   	    	<option value="A+">A+</option>
   	    	<option value="A-">A-</option>
   	    	<option value="B+">B+</option>
   	    	<option value="B-">B-</option>
   	    </select>
        <div><?php echo $bld_err;?></div> 
   	    <hr>
	    <input type="submit" name="btn_bldgrp">
   </fieldset>

    <fieldset style="width: 200px">
		<LEGEND>NAME</LEGEND>
	    <input type="text" name="name" size="20"><span><?php echo $name_err;?></span>
	    <hr>
	    <input type="submit" name="btn_name">
   </fieldset>
</form>
</body>
</html>



