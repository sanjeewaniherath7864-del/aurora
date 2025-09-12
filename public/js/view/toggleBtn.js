export function toggleBtnOnOff(action , btn){
    if(action == "on"){
        btn.classList.add('active');
    }
    if(action == 'off'){
        btn.classList.remove('active');
    }
}