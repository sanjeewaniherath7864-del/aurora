import redirect from "./controllers/redirect.js";

const table = document.querySelector('table');

table.addEventListener("click" ,(e)=>{
    const clickItem = e.target;
    const order = clickItem.closest('tr').dataset.id;
    const userId = document.querySelector('body').dataset.id;


    if(order){
        redirect(`/staff/${userId}/orders/${order}`);
    }
})