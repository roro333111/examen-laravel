const token = localStorage.getItem('token');

const headers = {
    'Content-Type': 'application/json',
    'Authorization': 'Bearer ' + token
};



// LISTAR TODOS
fetch('/api/telefonos', {
    method: 'GET',
    headers
})
.then(r => r.json())
.then(data => console.log(data));



// OBTENER UNO
fetch('/api/telefonos/1', {
    method: 'GET',
    headers
})
.then(r => r.json())
.then(data => console.log(data));



// CREAR
fetch('/api/telefonos', {
    method: 'POST',
    headers,
    body: JSON.stringify({
        numero: '612345678',
        tipo: 'móvil'
    })
})
.then(r => r.json())
.then(data => console.log(data));



// ACTUALIZAR
fetch('/api/telefonos/1', {
    method: 'PUT',
    headers,
    body: JSON.stringify({
        numero: '699999999',
        tipo: 'fijo'
    })
})
.then(r => r.json())
.then(data => console.log(data));



// ELIMINAR
fetch('/api/telefonos/1', {
    method: 'DELETE',
    headers
})
.then(r => r.json())
.then(data => console.log(data));