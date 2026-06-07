const token = localStorage.getItem('token');

if (!token) {
    window.location.href = '/';
}

document.getElementById('createProject').addEventListener('submit', async function (e) {
    e.preventDefault();

    const response = await fetch('/api/user', {
        headers: {
            Authorization: 'Bearer ' + token
        }
    });

    const user = await response.json();

    fetch('/api/projectes', {
        method: 'POST',
        headers:{
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