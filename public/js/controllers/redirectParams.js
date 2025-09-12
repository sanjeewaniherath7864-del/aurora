export default function redirectParams(baseURL,paramsObj={}){
    const queryParams = new URLSearchParams(window.location.search);
    
    for(const [entry , value] of Object.entries(paramsObj)){
        queryParams.set(entry ,value);
    }

    console.log(queryParams.toString());
    window.location.replace(baseURL+"?"+queryParams.toString());
}