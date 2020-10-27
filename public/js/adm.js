"use strict";
/* ---------------------------- Side adm tooltip ---------------------------- */

(window.onresize = () => {
    showMenuTooltip(document.body.clientWidth);
})();

function showMenuTooltip(width) {
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip-adm"]'));
    let tooltip;
    if(width < 576) {
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            tooltip = new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }else {
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            tooltip = new bootstrap.Tooltip(tooltipTriggerEl);
            tooltip.disable();
        });
    }
}

/* ------------------------ Delete user confirmation ------------------------ */


let checkUser;
let btn = document.querySelectorAll('.user-manage-btn');
let modals = document.querySelectorAll('.modal');

btn.forEach(function(btn){
    btn.addEventListener('click',function(){
        let id = btn.getAttribute('id').split('-')[1];
        let modalName = btn.getAttribute('id').split('-')[0];
        let username = document.getElementById('username-' + id).innerHTML;
        let form = document.getElementById(modalName + 'Form');
        let action = form.getAttribute('action');
        checkUser = document.getElementById(modalName + 'Check');

        form.setAttribute('action', action + '/' + id);

        document.querySelectorAll('.usernameModal').forEach(function(span){
            span.innerHTML = username;
        });

        let confirmButton = document.getElementById('confirmButton-' + modalName);   
        confirmButton.addEventListener('click',function(e){
            if(checkUser.value != username){
                e.preventDefault();
                checkUser.classList.add('is-invalid');
            }
        });
    });
});

modals.forEach(function(modal){   
    modal.addEventListener('hide.bs.modal', function(){
        let form = document.getElementById(modal.getAttribute('id') + 'Form');
        let action = form.getAttribute('action').split('/');
        action.pop();
        action = action.join('/');
        form.setAttribute('action',action);
        checkUser.classList.remove('is-invalid');
        checkUser.value = '';
    });
    modal.addEventListener('shown.bs.modal', function(){
        checkUser.focus();
    });
});
