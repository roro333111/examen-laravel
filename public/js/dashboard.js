const token = localStorage.getItem('token');

if(!token){

    window.location.href = '/';

}

async function cargarUsuario(){

    const response = await fetch('/api/user', {

        headers: {
            Authorization: 'Bearer ' + token
        }

    });

    if(!response.ok){

        localStorage.removeItem('token');

        window.location.href = '/';

        return;
    }

    const user = await response.json();

    document.getElementById('saludo').innerText =
        'Bienvenido ' + user.name;
}

cargarUsuario();

document
.getElementById('logout')
.addEventListener('click', async ()=>{

    await fetch('/api/logout', {

        method: 'POST',

        headers: {
            Authorization: 'Bearer ' + token
        }

    });

    localStorage.removeItem('token');

    window.location.href = '/';

});