/**
 * Created with JetBrains PhpStorm.
 * User: walid
 * Date: 2/20/13
 * Time: 9:49 AM
 * Name: Walid Hosseini
 * To change this template use File | Settings | File Templates.
 */
function validateForm() {

	if (!validatePhone() || !validateEmail() || !validatePassword() || !existRequiredFields()) {

		return false;
	}
	return true;
}

function existRequiredFields() {
	var form = document.forms["registration"];
	if ( !form['firstname'].value ||
		 !form['lastname'].value ||
		 !form['username'].value) {
		alert('First, Last and User name are required');
		return false;
	} else {
		return true;
	}
}
function validatePhone() {
	var form = document.forms["registration"];
	var phone = form["phone"].value;
	var reg = new RegExp('^(\\()?\\d{3}(\\))?(-|\\s)?\\d{3}(-|\\s)\\d{4}$');

	if (reg.test(phone)) {
		return true;
	} else {
		alert('Phone number is not valid');
		//form.phone.focus();
		document.forms["registration"]["phone"].value = "";
		return false;
	}
}
function validateEmail() {
	var form = document.forms["registration"];
	var email = form["email"].value;
	var reg = new RegExp('^\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,3}$');

	if (reg.test(email)) {
		return true;
	} else {
		alert('Email is not valid');
		//form.email.focus();
		document.forms["registration"]["email"].value = "";
		return false;
	}
}

function validatePassword() {
	var form = document.forms["registration"];
	var pw1 = form["password1"].value;
	var pw2 = form["password2"].value;

	if (!pw1 || !pw2 || pw1 !== pw2) {
		alert('Passwords don\'t match.');
		return false;
	} else {
		return true;
	}
}

