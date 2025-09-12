import { setFormBtnEnable, setFormBtndisabled } from "./controllers/formController.js";
import redirect from "./controllers/redirect.js";
import { login, signUp } from "./model/loginAndSignup.model.js";
import displaySwal from "./view/displaySwal.js";

const form = document.querySelector(".form");

form.addEventListener("submit" , e=>{
    e.preventDefault();
    const btnSignup = document.querySelector(".form__btn-submit--round");
    setFormBtndisabled(btnSignup);

    const form = new FormData(e.target);
    const formObj = {};

    for (const [property , value] of form.entries()) {
        formObj[property] = value;
    };

    if(formObj.password != formObj.repassword) {
        displaySwal({
            icon:'error',
            title:'Passwords not matching',
        })
        return;
    }

    console.log(formObj);

    signUp(formObj).then(data=>{
        displaySwal({
            icon: data.status,
            title: data.status == "success" ? "account create Successfully" : "Can't create yout account" || data.message,
        })
        if(data.status == 'success') {
            redirect(data.redirect);
            
        };
       
    
    }).finally( setFormBtnEnable(btnSignup)).catch(err=>console.log(err));

    
})

