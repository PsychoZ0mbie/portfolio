window.addEventListener("load",function(){
    let formLogin = document.querySelector("#formLogin");
    let btn = document.querySelector("#btnLogin");
    formLogin.addEventListener("submit",function(e){
        e.preventDefault();
        let strEmail = document.querySelector('#txtEmail').value;
        let strPassword = document.querySelector('#txtPassword').value;
        if(strEmail == "" || strPassword ==""){
            Swal.fire("Error", "Por favor, completa los campos", "error");
            return false;
        }
    
        let url = base_url+'/Login/loginUser'; 
        let formData = new FormData(formLogin);
        btn.innerHTML=`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
        btn.setAttribute("disabled","");
        request(url,"post",formData).then(function(objData){
            btn.innerHTML=`Iniciar sesión`;
            btn.removeAttribute("disabled");
            if(objData.status){
                window.location = base_url+'/dashboard'
            }else{
                Swal.fire("Error", objData.msg, "error");
            }
        });
    });
});
