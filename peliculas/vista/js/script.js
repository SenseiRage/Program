$.ajax({
    type : 'GET',
    url : '../controlador/Main.php',
    dataType : 'json',
    success : ( result ) => {

        var parent = document.querySelector('#tableFilms');
        var table = document.createElement('TABLE');

        table.innerHTML = "<tr><th>ID</th><th>Título</th><th>Año</th><th>Director</th><th>Poster</th><th>Acciones</th></tr>";

        result['peliculas'].forEach( pelicula => {

            var row = document.createElement('TR');
            row.setAttribute( 'data-id', pelicula.id );

            row.innerHTML = `<td>${pelicula.id}</td><td>${pelicula.title}</td><td>${pelicula.year}</td><td>${pelicula.director.nombre}</td><td><img src="${pelicula.poster}" alt=""></td><td class="actions"><button>Eliminar</button><button>Editar</button></td>`;
            table.appendChild( row );
        } );

        parent.appendChild( table );

        // Eventos click de los botones
        let delButtons = document.querySelectorAll('.actions > button:nth-child(1)');
        let updateButtons = document.querySelectorAll('.actions > button:nth-child(2)');

        delButtons.forEach( button => {
            deleteClickEvent( button );
        })

        updateButtons.forEach( a => {
            updateClickEvent( a );
        })

    }
});


function deleteClickEvent( button ) {
    button.addEventListener( 'click', ( ) => {
        let id = button.parentElement.parentElement.dataset.id;
        $.ajax({
            type : 'GET',
            url : `../controlador/Delete.php?id=${id}`,
            dataType : 'json',
            success : ( deleted ) => {
                if ( deleted ) {
                    window.location.reload( true );
                } else {
                    alert( `No se ha podido eliminar` );
                }
            }
        });
    });
}

function updateClickEvent( a ) {
    let formButton = document.querySelector( '#btnExecUpdate' );

    formButton.addEventListener( 'click', ( ) => {
        let id = a.parentElement.parentElement.dataset.id;
        let title = document.querySelector('#titleUpdate').value;
        let year = document.querySelector('#yearUpdate').value;
        let author = document.querySelector('#authorUpdate').value;
        let director = document.querySelector('#directorUpdate').value;
        let poster = document.querySelector('#posterUpdate').value;

        $.ajax({
            type : 'GET',
            url : `../controlador/Update.php`,
            data : { 'id' : id, 'title' : title, 'year' : year, 'author' : author, 'director' : director, 'poster' : poster },
            dataType : 'json',
            success : ( updated ) => {
                if ( updated ) {
                    window.location.reload( true );
                } else {
                    alert( `No se ha podido actualizar` );
                }
            }
        });
    });
}