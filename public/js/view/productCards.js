
export function activateProductCard(productList , clickCard){
    deselectProductCards(productList);
    clickCard.classList.add("active");
    return ;

}

export function deselectProductCards(productList){
    productList.forEach(card=>card.classList.remove('active'));
    return ;
}


export function productCardFormCounter(counter , int){
    let newQuantity = Number(counter.value) + int;
    newQuantity = newQuantity <= 0 ? 1 : newQuantity;
    counter.value = newQuantity;
    return newQuantity;
}


export function updateAndCalcPrice(clickCard , count){
    clickCard = clickCard.closest(".product");
    const unitPrice = clickCard.querySelector(".unit_price");
    const tatalPrice = clickCard.querySelector(".total_price");
    tatalPrice.textContent = +unitPrice.textContent * count;
}

export function renderProductCardSppiner(clickCard){
    clickCard.classList.add('loading');

}

export function removeProductCartSppiner(clickCard){
    clickCard.classList.remove('loading');
}

export function displayMessage(data){
    console.log(data);
        swal({
            title:`Added to Cart`,
            icon:data.status,

        });
}


export function resetProductCard(card){
    updateAndCalcPrice(card , 1);
    card.querySelector('.count').value = 1; 
}