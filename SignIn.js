/**
 * Created by Gaurav on 08-03-2016.
 */

function validate(){
    var form = document.getElementById("detailForm");

    var enrol = form[0];
    var password = form[1];

    if(enrol.value.toString().length != 12){
        alert("Please Enter Proper Enrollment Number");
        return false;
    }

    return true;
}