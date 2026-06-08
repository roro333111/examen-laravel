const token = localStorage.getItem('token');

if (!token) {
    window.location.href = '/';
}

const destinatarioSelect = document.getElementById('destinatario_id');
const formulari = document.querySelector('#crearMissatge');

fetch('/api/users', {
    headers: {
        Authorization: 'Bearer ' + token
    }
})
    .then(r => r.json())
    .then(users => {
        for(let i=0; i<users.length; i++){
            const option = document.createElement('option');
            option.value = users[i].id;
            option.textContent = users[i].name;
            destinatarioSelect.appendChild(option);
        };
    });

formulari.addEventListener('submit', async function (e) {
    e.preventDefault();

    const response = await fetch('/api/user', {
        headers: {
            Authorization: 'Bearer ' + token
        }
    });
    const user = await response.json();


    fetch('/api/missatges', {
        method: 'POST',
        headers:{
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },
        body: JSON.stringify({
            asunto: document.getElementById("asunto").value,
            mensaje: document.getElementById("mensaje").value,
            destinatario_id: document.getElementById("destinatario_id").value,
            remitente_id: user.id,
        })
    })
        .then(r => r.json())
        .then(data => {
            window.location.href = '/dashboard';
        })
        .catch(err => console.error('Error creant projectes:', err));
});