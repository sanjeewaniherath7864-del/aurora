import { setInputEnableDisable } from "./view/inputFeildsActivateDisable.js";
import { toggleBtnOnOff } from "./view/toggleBtn.js";
import displaySwal from "./view/displaySwal.js"
import { updateDeleteProfile } from "./model/updateDeleteProfile.js";
import { setFormBtnEnable ,setFormBtndisabled } from "./controllers/formController.js";
import { logout } from "./model/loginAndSignup.model.js";
import redirect from "./controllers/redirect.js";
 
const btnToggle = document.querySelector(".toggle");
console.log(btnToggle)
const updateForm = document.querySelector('.form__update_user');
const deleteFrom = document.querySelector('.form__delete_user');
const updateInputsFeilds = updateForm?.querySelectorAll('.feild__input');
const btnLogout = document.querySelector('.btn-logout');

btnToggle.addEventListener("click" , (e)=>{
    const btn = e.target.closest('.toggle');
    console.log('clicked')

    if(btn.classList.contains('active')){
        toggleBtnOnOff('off' , btn);
        setInputEnableDisable('disable' , updateInputsFeilds)
        
    }else{
        console.log('active')
        toggleBtnOnOff('on' , btn);
        setInputEnableDisable('enable' , updateInputsFeilds)
    }
})



updateForm.addEventListener("submit" , e=>{
    e.preventDefault();
    const btnUpdate = updateForm.querySelector(".secondary-btn[type=submit]");
    setFormBtndisabled(btnUpdate);

    const form = new FormData(e.target);
    const formObj = {};

    for (const [property , value] of form.entries()) {
        formObj[property] = value;
    };

    formObj.id = updateForm.dataset.id;

    updateDeleteProfile('update',formObj).then(data=>{
        console.log(data.status);
        displaySwal({
            status: data.status ,
            title: data.status == "success" ? "account update Successfully" : "Can't update your account" || data.message,
        })
        console.log('update enable')
        
    
    }).finally(()=>setFormBtnEnable(btnUpdate)).catch(err=>displaySwal({
        status:'error',
        title:'account not update',
    }))

    
})
deleteFrom.addEventListener("submit" , e=>{
    e.preventDefault();
    const btnDelete = updateForm.querySelector(".secondary-btn[type=submit]");
    setFormBtndisabled(btnDelete);

    const form = new FormData(e.target);
    const formObj = {'id':deleteFrom.dataset.id};

    for (const [property , value] of form.entries()) {
        formObj[property] = value;
    };

    updateDeleteProfile('delete',formObj).then(data=>{
        displaySwal({
            status: data.status,
            title: data.status == "success" ? "account delete Successfully" : "Can't delete your account" || "Your Account was deleted",
        })
        
    
    }).finally(()=>setFormBtnEnable(btnDelete)).catch(err=>displaySwal({
        icon:'error',
        title:'account not update',
    }))

    
})


btnLogout?.addEventListener('click' , ()=>{
    logout().then(data=>{
        displaySwal({
            status:data.status,
            message:data.status == 'success' ? data.message : 'Can,t log out some problem with server' ,
        })
    }).finally(redirect('/login')).catch(err=>console.log(err));
})