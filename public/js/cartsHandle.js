import { deleteFromCart } from "./model/deleteCartItem.js";

const cartContainer = document.querySelector('.cart_container');
const userId = document.querySelector('body').dataset.id;

cartContainer.addEventListener('click' , e=>{
    const clickedItem = e.target;
    const isDeleteBtn = clickedItem.closest('.btn-remove');

    if(isDeleteBtn){
        const clickedCart = clickedItem.closest(".cart");
        const cartId = clickedCart.dataset.cartid;
        console.log(cartId);
        deleteFromCart(userId,cartId).then(data=>console.log(data)).catch(err=>console.log(data)).finally(()=>{
            window.location.reload();
            window.location.reload();
        });
    }

});