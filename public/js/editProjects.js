const token = localStorage.getItem('token');

if (!token) {
    window.location.href = '/';
}

const id = document.getElementById('id').value;

fetch('/api/projectes/' + id, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    },
})
    .then(r => r.json())
    .then(data => {
        const projecte = data;

        document.getElementById("nom").value = projecte.nom;
        document.getElementById("descripcio").value = projecte.descripcio;
        document.getElementById("data_ini").value = projecte.data_ini;
        document.getElementById("data_fi").value = projecte.data_fi;
    });


document.getElementById('editProject').addEventListener('submit', async function (e) {
    e.preventDefault();

    const response = await fetch('/api/user', {
        headers: {
            Authorization: 'Bearer ' + token
        }
    });

    const user = await response.json();

    fetch('/api/projectes/'+id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },
        body: JSON.stringify({
            nom: document.getElementById("nom").value,
            descripcio: document.getElementById("descripcio").value,
            data_ini: document.getElementById("data_ini").value,
            data_fi: document.getElementById("data_fi").value,
            user_id: user.id,
        })
    })
        .then(r => r.json())
        .then(data => {
            window.location.href = '/dashboard';
        })
        .catch(err => console.error('Error creant projectes:', err));
});