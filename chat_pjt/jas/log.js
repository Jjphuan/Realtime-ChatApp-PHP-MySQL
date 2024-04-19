const form = document.querySelector(".sigup-form form"),
    conBtn = form.querySelector(".button"),
    errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}

conBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","serPhp/login.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    window.location.href = "userpage.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "flex";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}