let active;
const btnBars = document.querySelector("#bars");
const btnCloseBars = document.querySelector("#closeBars");
const loading = document.querySelector(".loading");
const progress = document.querySelectorAll(".skill-item div .progress-bar");
const inputs = document.querySelectorAll("input");
const message = document.querySelector("#txtMessage");
const form = document.querySelector("#formContact");
const toast = new bootstrap.Toast(document.querySelector("#liveToast"));
const btn = document.querySelector("#btnSubmit");
const modal = document.querySelector("#modalProject");
const objModal = new bootstrap.Modal(modal);

/*
if(window.innerWidth <= 1280){
    document.querySelector(".main").classList.add("main-mobile");
}else{
    document.querySelector(".main").classList.remove("main-mobile");
}*/
setInterval(function(){
    if(loading.offsetLeft == document.querySelector(".content").clientWidth){
        loading.classList.remove("status"); 
        loading.classList.remove("loading-active");
        loading.classList.remove("status-menu");
        document.querySelector(".content").classList.add("animation");
        progressAnimation(1);
        projectsAnimation(1);
    }
},0);
btnBars.addEventListener("click",function(){
    document.querySelector(".main").classList.add("active");
});
btnCloseBars.addEventListener("click",function(){
    document.querySelector(".main").classList.remove("active");
});

window.addEventListener('resize',function(){
    if(window.innerWidth <= 1280){
        document.querySelector(".main").classList.add("main-mobile");
    }else{
        document.querySelector(".main").classList.remove("main-mobile");
    }
});
window.addEventListener("load",function(){

    
    /***************************************Formulario**************************************** */
    message.addEventListener("input",function(){
        
        if(message.value!=""){
            message.nextElementSibling.classList.remove("valid-input");
        }else{
            message.nextElementSibling.classList.add("valid-input");
        }
    });
    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        input.addEventListener("input",function(){
            
            if(input.value!=""){
                document.querySelectorAll(".form-focus-effect")[i].classList.remove("valid-input");
            }else{ 
                document.querySelectorAll(".form-focus-effect")[i].classList.add("valid-input");
            }
            if(i==1 && !fntEmailValidate(input.value)){
                document.querySelectorAll(".form-focus-effect")[i].classList.add("valid-input");
            }
        });
    }
    form.addEventListener("submit",function(e){
        e.preventDefault();
        
        let strName = document.querySelector("#txtName").value;
        let strEmail = document.querySelector("#txtEmail").value;
        let strBusiness = document.querySelector("#txtBusiness").value;
        let strServices = document.querySelector("#txtServices").value;
        let strMessage = document.querySelector("#txtMessage").value;
    
        if(strName =="" || strEmail == "" || strBusiness =="" || strServices=="" || strMessage== ""){
            toast.show();
            return false;
        }
        if(!fntEmailValidate(strEmail)){
            toast.show();
            return false;
        }
        btn.innerHTML =`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
        btn.setAttribute("disabled","");
        formData = new FormData(form);
        request(base_url+"/home/sendMessage","post",formData).then(function(objData){
            btn.removeAttribute("disabled");
            btn.innerHTML ="Enviar mensaje";
            if(objData.status){
                document.querySelector(".toast-body").classList.remove("bg-danger");
                document.querySelector(".toast-body").classList.add("bg-success");
                document.querySelector(".toast-body").innerHTML=objData.msg;
                form.reset();
                toast.show();
            }else{
                document.querySelector(".toast-body").classList.add("bg-danger");
                document.querySelector(".toast-body").classList.remove("bg-success");
                document.querySelector(".toast-body").innerHTML=objData.msg;
                toast.show();
            }
    
        });
    });
    
});

/***************************************Funciones**************************************** */
function showLoading(page){
    //if(loading.offsetLeft == document.querySelector(".content").clientWidth)return false;
    window.clearTimeout(active);
    progressAnimation(2);
    projectsAnimation(2);
    loading.classList.add("status");
    document.querySelector(".content").classList.remove("animation");
    if(document.querySelector(".main.active")){
        loading.classList.remove("status");
        document.querySelector(".main.active").classList.remove("active");
        loading.classList.add("status-menu");
    }
    if(window.innerWidth <= 1280)document.querySelector(".main").classList.remove("loading-active");
    const runTime = function(){
        active = window.setTimeout(function(){
            loading.classList.add("loading-active");
            showPage(page);
        },1500);
    }
    runTime();
}
function showPage(page){
    const pages = document.querySelectorAll("section");
    for (let i = 0; i < pages.length; i++) {
        pages[i].classList.add("d-none");
    }
    pages[page].classList.remove("d-none");
}
function progressAnimation(option){
    if(option==1){
        for (let i = 0; i < progress.length; i++) {
            const bar = progress[i];
            let valueNow = bar.getAttribute("aria-valuenow");
            bar.style.width = 0;
            bar.style.width =valueNow+"%";
        }
    }else{
        for (let i = 0; i < progress.length; i++) {
            const bar = progress[i];
            bar.style.width = 0;
        }
    }
}
function projectsAnimation(option){
    let projects = document.querySelectorAll(".project");
    if(option == 1){
        for (let i = 0; i < projects.length; i++) {
            const project = projects[i];
            project.style.transition= `left 0.5s ${i/1.5}s ease`
            project.style.left = 0;
        } 
    }else{
        for (let i = 0; i < projects.length; i++) {
            const project = projects[i];
            project.style.transition ="none";
            project.style.left = "-100vw";
        }
    }
}
function getProject(id){
    let formData = new FormData();
    formData.append("id",id);
    request(base_url+"/home/getProject","post",formData).then(function(info){
        document.querySelector(".modal-title").innerHTML=info.data.name+" - "+info.data.date;
        document.querySelector(".modal-footer a").setAttribute("href",info.data.url);
        document.querySelector(".modal-footer a").setAttribute("target","__blank");
        document.querySelector(".project-modal-img img").src =base_url+"/assets/images/uploads/"+info.data.picture;
        document.querySelector("#data").innerHTML = info.data.description;
        objModal.show();
    });
}



