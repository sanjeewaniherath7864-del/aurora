import { setFormBtnEnable, setFormBtndisabled } from "./controllers/formController.js";
import redirect from "./controllers/redirect.js";
import { login } from "./model/loginAndSignup.model.js";
import displaySwal from "./view/displaySwal.js";

const form = document.querySelector(".form");

console.log(form);

form.addEventListener("submit" , e=>{
    console.log(e);
    e.preventDefault();
    const btnLogin = document.querySelector(".form__btn-submit--round");
    setFormBtndisabled(btnLogin);

    const form = new FormData(e.target);
    const formObj = {};

    for (const [property , value] of form.entries()) {
        formObj[property] = value;
    };

    login(formObj).then(data=>{
        console.log(data);
        displaySwal({
            status: data.status,
            title: data.status == "success" ? "Login Successfully" : "Email or password wrong"
        })
        if(data.status == 'success') {
            console.log(data);
            // if(data.data.role == "staff")redirect("/staff");
            // if(data.data.role == "user") redirect("/")
            redirect(data.redirect);
            
        };
        setFormBtnEnable(btnLogin);
    
    })

    
})

