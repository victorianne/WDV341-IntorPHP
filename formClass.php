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
		if(trim($inputValue)=="" || $inputValue=="undefined" || !strcasecmp($inputValue,"null"))
		{

			return "false";
		}
		else
		{
			return true;# code...
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
		return true;
	}
	else
	{
		return false;
	}

}//end of validateEmailField

public function validateRadioButton($inputValue)
{
	if (trim($inputValue)=="")
	{
		return "false";
	}
	else
	{
		return true;
	}

}//end of validateEmailField

}//end of FormValidation Class


?>