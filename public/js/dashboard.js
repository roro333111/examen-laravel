const token = localStorage.getItem('token');

if (!token) {

    window.location.href = '/';

}

const editProjecte = document.querySelector("#editarProjecte");
const title = document.querySelector(".featured");
const tasksContainer = document.querySelector(".news");

fetch('/api/latestProjecte', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    }
})
    .then(r => r.json())
    .then(projecte => {
        title.innerText = projecte.nom + ":" + projecte.descripcio;
        editProjecte.setAttribute("href", "/editProject/" + projecte.id);

        if (!projecte.tasks <= 0) {
            for (let n = 0; n < projecte.tasks.length; n++) {
                article = document.createElement("article");
                article.innerText = projecte.tasks[n].descripcio;
                tasksContainer.append(article);
            }
        }


        console.log(projecte);
    });

async function cargarUsuario() {

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
    console.log(user);

    document.getElementById('saludo').innerText =
        'Bienvenido ' + user.name;
}

cargarUsuario();

const projectContainer = document.querySelector(".sidebar");

fetch('/api/projectes', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    }
})
    .then(r => r.json())
    .then(projectes => {
        for (let i = 0; i < projectes.length; i++) {
            a = document.createElement("a");
            a.innerText = projectes[i].nom
            a.dataset.id = projectes[i].id;
            a.addEventListener('click', () => {
                cargarProjecteSeleccionat(projectes[i].id)
            })
            projectContainer.append(a);
        }
    });

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

function cargarProjecteSeleccionat(id) {
    tasksContainer.innerHTML = "";

    fetch('/api/projectes/' + id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
        .then(r => r.json())
        .then(projecte => {
            title.innerText = projecte.nom + ":" + projecte.descripcio;
            editProjecte.setAttribute("href", "/editProject/" + projecte.id);

            for (let n = 0; n < projecte.tasks.length; n++) {
                article = document.createElement("article");
                article.innerText = projecte.tasks[n].descripcio;
                tasksContainer.append(article);
            }

            console.log(projecte);
        });
}