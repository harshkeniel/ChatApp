const form = document.querySelector(".login form");
signupBtn = document.querySelector(".form form .button input");
errortxt = form.querySelector(".error-text");


form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}
signupBtn.onclick = ()=>{
    
    
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/login.php", true);
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

