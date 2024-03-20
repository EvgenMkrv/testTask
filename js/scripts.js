window.addEventListener('load', function () {
    let accounts = document.querySelector('.accounts_list')
    if (accounts) {
        accounts.addEventListener('click', evt => {
            let target = evt.target;
            if (target.classList && target.classList.contains('delete')) {
                let idAccount = target.parentElement.children[0].innerText;
                $.ajax({
                    url: '/scripts/delete_account.php',
                    method: 'POST',
                    data: {id: idAccount}
                });
                accounts.removeChild(target.parentElement);
            }
        });
    }
})