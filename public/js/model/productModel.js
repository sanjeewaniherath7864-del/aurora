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

export async function deleteProduct(userId , productId){
    const response = await fetch(`/api/staff/${userId}/product/${productId}`,{
        method:"DELETE",
    });

    const data = await response.json();
    console.log(data);

    if(data.status == "successful"){
        data.message = "product deleted successfuly";
        return data;
    }else{
        return {
            status:"error",
            message:"product not deleted",
        }
    }
}