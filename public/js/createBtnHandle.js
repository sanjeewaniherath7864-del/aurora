import redirect from "./controllers/redirect.js";

const btnCreate = document.querySelector(".create");

btnCreate?.addEventListener('click' , ()=>{
    redirect(`/staff/${btnCreate.dataset.id}/${btnCreate.dataset.path}/create`);
});