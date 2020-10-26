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

let deleteBtn = document.querySelectorAll('.delete-user');
let checkUser = document.getElementById('checkUser');

let btn = document.querySelectorAll('user-manage-btn');

deleteBtn.forEach(function(btn){
    btn.addEventListener('click',function(){
        let id = btn.getAttribute('id');
        let username = document.getElementById('username-' + id).innerHTML;
        let deleteForm = document.getElementById('deleteUserForm');

        deleteForm.setAttribute('action', deleteForm.getAttribute('action') + '/' + id);

        document.querySelectorAll('.usernameModal').forEach(function(span){
            span.innerHTML = username;
        });

        let deleteLink = document.getElementById('deleteUserLink');   
        deleteLink.addEventListener('click',function(e){
            if(checkUser.value != username){
                e.preventDefault();
                checkUser.classList.add('is-invalid');
            }
        });
    });
});

var modalRemoveUser = document.getElementById('confirmModal');
modalRemoveUser.addEventListener('hide.bs.modal', function(){
    checkUser.classList.remove('is-invalid');
    checkUser.value = '';
});