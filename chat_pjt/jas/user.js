let userList = document.querySelector(".friend-list"),
    searchbar = document.querySelector(".search-box"),
    searchBtn = document.querySelector(".searchBtn"),
    searchTerm = "";

searchbar.onkeyup = ()=>{
    searchTerm = searchbar.value;
    if(searchTerm != ""){
        searchbar.classList.add("active");
    }
    else{
        searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST","serPhp/search.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","serPhp/user.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchbar.classList.contains("active")){
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 1000);