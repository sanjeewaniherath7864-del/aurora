import { addToCart as addToCartFunc } from "../model/productModel.js";
import {activateProductCard, deselectProductCards, displayMessage, productCardFormCounter, removeProductCartSppiner, renderProductCardSppiner, resetProductCard, updateAndCalcPrice} from "../view/productCards.js";



export function handleProductCards(e){
    handleProductCardForm(e);

    const clickItem = e.target;
    const clickedCard = clickItem.closest(".product");
    const productCards = document.querySelectorAll('.product');
    const isuserLogedIn = +document.querySelector('body').dataset.id;

    if(clickedCard && isuserLogedIn){
        activateProductCard(productCards , clickedCard);
    }else{
        deselectProductCards(productCards);
    }
    return;



}


export function handleProductCardForm(e){
    const clickItem = e.target;
    const clickedForm = clickItem.closest(".product__form");
    const clickedCard = clickItem.closest(".product");
    const id = Number(document.querySelector('body').dataset.id);
    let newCount = 0 ;
    if(clickedForm){
        e.preventDefault();
        const productId = clickedCard.dataset.id;


        const isPlusBtn = clickItem.closest(".btn_round_plus");
        const isMinusBtn = clickItem.closest(".btn_round_minus");
        const count = clickedForm.querySelector(".count");
        const addToCart = clickItem.closest(".btn_add-to-card");


        newCount = productCardFormCounter(count , 0)
        isPlusBtn && (newCount = productCardFormCounter(count , +1));
        isMinusBtn && ( newCount = productCardFormCounter(count , -1));
        newCount && updateAndCalcPrice(clickItem , newCount );

        if(addToCart){
            renderProductCardSppiner(clickedCard);
            addToCartFunc({
                userId : id,
                quantity : newCount , 
                productId ,
            }).then(data => { 
                displayMessage(data);
                removeProductCartSppiner(clickedCard);
                resetProductCard(clickedCard);
            }).catch(err=>console.log(err));
        }



    }

    return;
}
