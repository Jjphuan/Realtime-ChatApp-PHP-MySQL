const form = document.querySelector(".send-message"),
    inputField = document.querySelector(".type-area"),
    sendBtn = document.querySelector(".send-button"),
    chatBox = document.querySelector(".chat-area");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","serPhp/insert-chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                ScollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}
let executeone = false;
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","serPhp/get-chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    ScollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);


function ScollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

