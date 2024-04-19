const passField = document.querySelector(".user-details input[type='password']"),
toggleBtn = document.querySelector(".user-details .field i");
const form = document.querySelector(".signup-form form"),
    conBtn = form.querySelector(".button input"),
    errorText = document.querySelector(".error-txt");

toggleBtn.onclick = ()=>{
    if(passField.type == "password"){
        passField.type = "text";
        toggleBtn.classList.add("active");
    }
    else{
        passField.type = "password";
        toggleBtn.classList.remove("active");
    }
}

form.onsubmit = (e)=>{
    e.preventDefault();
}

conBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","serPhp/index.php",true);
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