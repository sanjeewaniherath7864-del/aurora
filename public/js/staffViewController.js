import redirect from "./controllers/redirect.js";
import redirectParams from "./controllers/redirectParams.js";

const inputSearch = document.querySelector("input[type=search]");
const filter = document.getElementById("filter");

let windowKeyDownEventListner;

inputSearch?.addEventListener("focus" , ()=>{
    const userId = document.querySelector('body').dataset.id;
    windowKeyDownEventListner = window.addEventListener('keydown' ,keyDownEvent =>{
        if(keyDownEvent.key == "Enter"){
            redirect(`/staff/${userId}/${inputSearch?.dataset.search}/${inputSearch.value}`);
        };
    })
})

inputSearch?.addEventListener('focusout' , ()=>{
    removeEventListener(windowKeyDownEventListner)
})

filter?.addEventListener("change" , ()=>{
    const userId = document.querySelector('body').dataset.id;
    const sortBy = filter.value;
    redirectParams(`/staff/${userId}/${filter.dataset["search"]}`,{
        sort : sortBy,
    });    
});


// window.addEventListener('load' , (e)=>{
//     const staffNavButtons = document.querySelectorAll('.staff_nav ul li');


//     Array.from(staffNavButtons)?.forEach(element => {
//         element.classList.remove('active');
//         console.log(window.location.pathname.includes(element.textContent));

//         if(window.location.pathname.includes(element.textContent)){
//             element.classList.add("active");
//             console.log(element);
//         }
//     });
//     console.log(staffNavButtons);
//     console.log(window.location);
// })