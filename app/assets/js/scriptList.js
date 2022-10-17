const form = document.querySelector('#delete-form');
const checkbox = document.querySelector('.delete-checkbox');
const message = document.querySelector('#message');

const submit = () => {
    form.addEventListener('submit', (e) => {
        
        if(checkbox!==null && checkbox.checked)
        {
            e.stopPropagation();
           
        }else{
            e.preventDefault();
            message.classList.remove('d-none');
           setTimeout(() => {
            message.classList.add('d-none');
           }, 3000);
        }
    });
}

submit();