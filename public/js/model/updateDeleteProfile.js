export async function updateDeleteProfile(type,data){
    if(type=="update"){
        const respond = await fetch(`/api/users/${data.id}` , {
            method:"PATCH",
            headers:{
                'Content-Type':'application/json',
            },
            body:JSON.stringify(data),
        } )
        const updatedUser = await respond.json();
        console.log(updatedUser,data ,`/api/users/${data.id}`);
        return updatedUser;

    }else if(type=='delete'){
        const respond = await fetch(`/users/${data.id}` , {
            method:"DELETE",
            headers:{
                'Content-Type':'application/json',
            },
            body:JSON.stringify(data),
        } )
        const deteledUser = await respond.json();

        return deteledUser;
    }



}