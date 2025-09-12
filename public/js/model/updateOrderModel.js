export async function udpateOrder(data){
    console.log(data);
    const response =await fetch(`/api/orders/${data.orderId}`,{
        method:"PATCH",
        headers:{
            'Content-Type':"application/json",
        },
        body:JSON.stringify(data),
    })

    const json = await response.json();

    return {
        status:'success',
        'data':json,
    }
}

export async function deleteOrder(data){
    const respond = fetch(`/orders/${data.orderId}` , {
        method:"DELETE",
        headers:{
            'Content-Type':"application/json",
        },
    })

    console.log(data);

    return {
        'status':'success'
    }
}