export default function displaySwal({status , title , message}){
    try{

        swal({
            icon : status == "success" ? status : "error",
            title,
            text:message,
        })
    }catch(err){
        console.warn(err , "\n\n No swal downloaded");
    }
}