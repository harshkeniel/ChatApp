const form = document.querySelector(".signup form");
const fnameField = document.getElementById("fname");
const lnameField = document.getElementById("lname");
signupBtn = document.querySelector(".form form .button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}
signupBtn.onclick = ()=>{
    //pass validation

    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    
    if(!((fnameField.value.match(lowerCaseLetters) || fnameField.value.match(upperCaseLetters)) && (lnameField.value.match(lowerCaseLetters) || lnameField.value.match(upperCaseLetters)))){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Name must contain letters only!";
    }
    else if(!(pswrdField.value.match(lowerCaseLetters) && pswrdField.value.match(upperCaseLetters) && pswrdField.value.match(numbers) && pswrdField.value.length >= 8)){
      errortxt.style.display = "block";
      errortxt.innerHTML = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
    }
    else{
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "php/signup.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        location.href = "users.php";
                    }
                    else{
                        errortxt.textContent = data;
                        errortxt.style.display = "block";
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php
    } 


}

