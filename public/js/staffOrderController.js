import { deleteOrder, udpateOrder } from "./model/updateOrderModel.js";
import displaySwal from "./view/displaySwal.js";

const updateForm = document.querySelector('.form-update-order');

updateForm.addEventListener('click' , e=>{
    e.preventDefault();
    const userId = document.querySelector('body').dataset.id;
    const orderId = updateForm.dataset.id;
    e.preventDefault();

    const clickItem = e.target;

    if(clickItem.closest('button')){
        console.log('button_clicked');
        
        const issuOrder = clickItem.closest(".issue-order");
        const transportOrder = clickItem.closest(".transport-order");
        const cancelOrder = clickItem.closest(".cancel-order");
        
        if(issuOrder){
            const date = issuOrder.querySelector('input').value;
            udpateOrder({
                'issued_at':date,
                orderId, 
            }).then(data=>{
                displaySwal({
                    status:data.status,
                    title:data.status == 'success'?'order updated':'order not updated',
                })
            }).catch(err=>console.log(err));
        }
        if(transportOrder){
            const vehicle_no = transportOrder.querySelector('input').value;
            
            udpateOrder({
                vehicle_no,
                orderId,
            }).then(data=>{
                displaySwal({
                    status:data.status,
                    title:data.status == 'success'?'order updated':'order not updated',
                })
            }).catch(err=>console.log(err));
        }
        if(cancelOrder){
            
            udpateOrder({
                orderId,
                'status':'canceled',
            }).then(data=>{
                displaySwal({
                    status:data.status,
                    title:data.status == 'success'?'order deleted':'order not deleted',
                })
            }).catch(err=>console.log(err));
            
        }

        // window.location.reload();
    }
});