<?php


class FormValidation 
{

/*
This class will hold a variety of general pipose methods that are used to validate fomr fields.
the methods will accept inputs as needed and will return true if the value(s) pass the validation and false otherwise.
*/

//Properties

//Constructor

	public function __constuct()
	{
		//empty constructor with no defined process
	}
	//Methods
	public function validateRequiredField($inputValue)

	//This field needs something in it. It can't be empty
	{
		if(!preg_match("/^[a-zA-Z ]*$/",$inputValue || ($inputValue) == ""))
		{

			return "Name Field is invalid";
		}
		else
		{
			return "";# code...
		}
	}//end validateRequiredField()

public function requiredNumericField($inputValue)
//This will require a numeric value in the input field
{
 return is_numeric($inputValue);
}//end of requiredNumericField()

public function validateEmailField($inputValue)
{
	if (!filter_var($inputValue, FILTER_VALIDATE_EMAIL) === false)
	{
		return "";
	}
	else
	{
		return "Email is invalid";
	}

}//end of validateEmailField

function validate_phone_number($inputValue)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($inputValue, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return "Phone Number is invalid";
     } else {
       return "";
     }
}

public function validateRadioButton($inputValue)
{
	if (trim($inputValue)=="")
	{
		return "Radio Button is required";
	}
	else
	{
		return "";
	}

}//end of validateRadioButton

public function validateOptionList($inputValue)
{
	if (trim($inputValue)=="")
	{
		return "Option List is required";
	}
	else
	{
		return "";
	}

}//end of validateRadioButton



public function validateComment($string,$length=200,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

}//end of FormValidation Class


?>