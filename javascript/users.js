const searchBar = document.querySelector(".users .search input");
searchBtn = document.querySelector(".users .search button");
userslist = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBtn.classList.toggle("active");
    searchBar.focus();
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let inputsearch = searchBar.value;

    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                userslist.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("inputsearch="+inputsearch);    
}

setInterval(()=>{

    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(!(searchBar.classList.contains("active"))){
                    userslist.innerHTML = data;
                    
                }
            }
        }
    }
    xhr.send();
},200);
