export async function addToCart(data){
    ///////////////////////
    // server code here
    const response = await fetch(`/users/${data.userId}/cart` , {
        method:"POST",
        headers:{
            'Content-Type':"application/json",
        },
        body:JSON.stringify({
            user:data.userId,
            quantity:data.quantity,
            productId:data.productId,
        })
    })

    
    const product = await response.json();
    console.log(product)

    return product;
}