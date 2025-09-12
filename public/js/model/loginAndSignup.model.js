import { SERVER_URL } from "../ENV.js";
import { timout } from "./helperTimeOut.js";

async function verifyUser(data){
    if(!data.id) return {'status':'error' , 'message':'no User Found'};
    const respond = await fetch("/cookie" , {
        method:'POST',
        headers:{
            'Content-Type':"application/json",
        },
        body:JSON.stringify(data)
    })

    const json = await respond.json();
    return json.status == 'success';
}



export async function login(data){
    /////////////////////
    // server code here

    const response = await fetch(`/api/login` , {
        method:'POST',
        headers:{
            Accept:"application.json",
            'Content-Type':'application/json; charset=UTF-8',
            
        },
        body:JSON.stringify(data),
        
    })

    const user = await response.json();

    console.log(user.data)
    //
    if(!user?.data?.id){
        return {
            status:"fail",
            message:"Wrong email or password",
        }
    }

    console.log({
        'id':user.data.id,
        'username':user.data.name,
        'email':user.data.email,
        'password':data.password,
    })

    const isVerified = await verifyUser({
        'id':user.data.id,
        'username':user.data.name,
        'email':user.data.email,
        'password':data.password,
    });
    console.log(isVerified)

    if(!isVerified){
        return{
            status:'fail',
            message:'verification failed',
        }
    }

    // return user;
    return user;


}


export async function signUp(data){
    const {password,repassword} = data;

    if(password != repassword ){
        return {
            status:'fail',
            message:"passwords are not match",
        }
    }

    //////////////////
    // server code
    const respond = await fetch("/api/signup",{
        method:'post',
        headers:{
            Accept:"application.json",
            'Content-Type':'application/json'
        },
        body:JSON.stringify(data),
    });

    const user = await respond.json();



    const isVerified = await verifyUser({
        'id':user.data.id,
        'username':user.data.name,
        'email':user.data.email,
        'password':data.password,
    });

    if(!isVerified){
        return{
            status:'fail',
            message:'verification failed',
        }
    }


    return user;

}


export async function logout(){
    const respond = await fetch('/logout');
    const data = await respond.json();
    return data;
}