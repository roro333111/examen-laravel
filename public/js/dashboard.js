const token = localStorage.getItem('token');

if (!token) {

    window.location.href = '/';

}

const missatgesContainer = document.querySelector("#missatges");
let userId;

async function cargar() {

    const response = await fetch('/api/user', {

        headers: {
            Authorization: 'Bearer ' + token
        }

    });

    if (!response.ok) {

        localStorage.removeItem('token');

        window.location.href = '/';

        return;
    }

    const user = await response.json();
    userId = user.id;

    console.log(user);

    document.getElementById('saludo').innerText =
        'Hola ' + user.name;


    cargarMissatgesEntrada()
}

cargar();

document.getElementById('entrada').addEventListener('click', async () => {
    cargarMissatgesEntrada()
})

document.getElementById('sortida').addEventListener('click', async () => {
    cargarMissatgesSortida()
})

function cargarMissatgesEntrada() {
    missatgesContainer.innerHTML = "";

    fetch('/api/missatgesTeus/' + userId, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },
    })
        .then(r => r.json())
        .then(data => {
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                const td = document.createElement("td");
                td.innerText = data[i].created_at + " - " + data[i].remitente.name + " - " + data[i].asunto;

                const a = document.createElement("a");
                a.innerText = data[i].asunto;
                a.addEventListener('click', (e) => {
                    e.preventDefault();
                    cargarMissatgeSeleccionat(data[i].id, 1)
                });
                td.innerText = data[i].created_at + " - " + data[i].remitente.name + " - ";
                td.append(a);

                if (data[i].leido) {
                    td.classList.add("read");
                }
                else {
                    td.classList.add("noRead");
                }

                missatgesContainer.append(td);
            }
        });
}

function cargarMissatgesSortida() {
    missatgesContainer.innerHTML = "";

    fetch('/api/missatgesEnviats/' + userId, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },
    })
        .then(r => r.json())
        .then(data => {
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                const td = document.createElement("td");

                const a = document.createElement("a");
                a.innerText = data[i].asunto;
                a.addEventListener('click', (e) => {
                    e.preventDefault();
                    cargarMissatgeSeleccionat(data[i].id, 0)
                });
                td.innerText = data[i].created_at + " - " + data[i].destinatario.name + " - ";
                td.append(a);

                missatgesContainer.append(td);
            }
        });
}

document.getElementById('logout').addEventListener('click', async () => {

    await fetch('/api/logout', {

        method: 'POST',

        headers: {
            Authorization: 'Bearer ' + token
        }

    });

    localStorage.removeItem('token');

    window.location.href = '/';

});


function cargarMissatgeSeleccionat(id, destinatario) {

    missatgesContainer.innerHTML = "";

    if (destinatario) {
        fetch('/api/canviarStatusMissatge/' + id, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
            .then(r => r.json())
            .then(missatge => console.log(missatge));
    }


    fetch('/api/missatges/' + id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
        .then(r => r.json())
        .then(missatge => {
            console.log(missatge);
            const div = document.createElement("div");
            const destinatari = document.createElement("p");
            destinatari.innerText = "Destinatari: " + missatge.destinatario.name;
            div.append(destinatari);

            const remitent = document.createElement("p");
            remitent.innerText = "Remitent: " + missatge.remitente.name;
            div.append(remitent);

            const data = document.createElement("p");
            data.innerText = "Data: " + missatge.created_at;
            div.append(data);

            const asumpte = document.createElement("p");
            asumpte.innerText = "Asumpte: " + missatge.asunto;
            div.append(asumpte);

            const mesage = document.createElement("p");
            mesage.innerText = "Missatge: " + missatge.mensaje;
            div.append(mesage);

            missatgesContainer.append(div);
        });
}