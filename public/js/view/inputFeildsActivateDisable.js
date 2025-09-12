export function setInputEnableDisable(type , nodeList){
    
    if(type=='enable'){
        console.log('node list enabled')
        nodeList.forEach(el=> el.removeAttribute('disabled'));
    }
    if(type=='disable'){
        nodeList.forEach(el=> el.disabled = true);
    }
}