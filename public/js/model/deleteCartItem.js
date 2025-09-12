export async function deleteFromCart(userId , cartId){
    const response = await fetch( `/users/${userId}/cart/${cartId}` , {
        method:"DELETE",
        headers:{
            "Content-Type" : "application/json",
        },
    });

    const data = await response.json();

    return data;
}