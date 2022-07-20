const form = document.querySelector(".contact-us form");
signupBtn = document.querySelector(".contact-us form .button input");
errortxt = form.querySelector(".error-text");


form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

signupBtn.onclick = ()=>{
    
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/mail.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    errortxt.textContent = "Message Sent!";
                    errortxt.classList.add("active");
                    form.reset();
                }
                else{
                    if(errortxt.classList.contains("active")){
                        errortxt.classList.remove("active");
                    }
                    errortxt.textContent = "Something went wrong!";
                    errortxt.style.display = "block";
                }
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(form); //creating new formData
    xhr.send(formData); // sending form data to php

}

