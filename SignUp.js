/**
 * Created by Gaurav on 08-03-2016.
 */

function validateSignUpForm() {
    var form = document.getElementById("signupForm");

    var enrol = form[0].value;
    var name = form[1].value;
    var email = form[2].value;
    var password = form[3].value;
    var passswordAgain = form[4].value;

    if (enrol == "" || name == "" || email == "" || password == "" || passswordAgain == "") {
        alert("Please Fill all detail!!");
        return false;
    }
    else if (password != passswordAgain) {
        alert("Password Does not match");
        return false;
    }
    else if(enrol.length != 12){
        alert("Enter valid Enrollment Number");
        return false;
    }
    else if(password.length <6){
        alert("Password at least 6 Character long");
        return false;
    }
    return true;
}