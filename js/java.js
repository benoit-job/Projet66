icon = document.querySelector('.fa-eye');
icon2 = document.querySelector('#off');

input = document.querySelector('#password');




    icon.addEventListener('click', ()=>{
        icon.classList.toggle('fa-eye-slash');
        icon.style.display="none";
        icon2.style.display="block";
        input.type="password";
    })

    icon2.addEventListener('click', ()=>{
        icon.style.display="block";
        icon2.style.display="none";
        input.type="text";
    })

