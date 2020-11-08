'use strict'

function validate() {
    //input declarations
    const lastname = document.getElementById("lastname");
    const firstname = document.getElementById("firstname");
    const number = document.getElementById("number");
    const date = document.getElementById("date");
    const age = document.getElementById("age");

    //radio groups declarations 
    
    const scaleEat = document.getElementsByName("scaleEat");
    const scaleWT = document.getElementsByName("scaleWT");
    const scaleWatchMovie = document.getElementsByName("scaleWM");
    const scaleRadio = document.getElementsByName("scaleLR");


    //deleting spaces 
    firstname.value.trim();
    number.value.trim();
    lastname.value.trim();

    //validating ratings in radio groups
    let valid1 = radioCheck(scaleEat);

    let valid2 = radioCheck(scaleWT);

    let valid3 = radioCheck(scaleWatchMovie);

    let valid4 = radioCheck(scaleRadio);

    //let validNode3 = false;

    //validation rules if all tru then procces if not show error messages in alert object 
    if (valid1 === true && valid2 === true &&
        valid3 === true && valid4 === true ) {
        alert(`${firstname.value} you have Succesfully Completed the survey`);
        return true;
    } else {
    
        alert("please choose one rating for each row !"); 
        return false;
    }

}

function radioCheck(radioGroupName) { //check if the check box is checked
    let valid = false;
    for (let i = 0; i < radioGroupName.length; i++) {
        if (radioGroupName[i].checked) {
            valid = true;
            break;
        }

    }

    return valid;
}