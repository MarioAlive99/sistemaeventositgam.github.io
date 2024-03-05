 
    function mostrarAlerta() {
        alert('Usuario no válido');
    }

    function mostrarValores(button) {
        var row = button.closest("tr");
        var id = row.querySelector(".registroId").innerText;
        var titulo = row.cells[1].innerText;
        var ponente = row.cells[2].innerText;
        var souvenir = row.cells[5].innerText;
        var precio = row.cells[6].innerText;
        var horario = row.cells[7].innerText;
        var fecha = row.cells[8].innerText;
        var aula = row.cells[10].innerText;
        var cupo = row.cells[11].innerText;
        document.getElementById("id_cursoLabel").setAttribute('value', id);
        document.getElementById("tituloLabel").setAttribute('value',titulo);
        document.getElementById("ponenteLabel").setAttribute('value', ponente);
        document.getElementById("souvenirLabel").setAttribute('value',souvenir);
        document.getElementById("precioLabel").setAttribute('value', precio);
        document.getElementById("horarioLabel").setAttribute('value', horario);
        document.getElementById("fechaLabel").setAttribute('value', fecha);
        document.getElementById("aulaLabel").setAttribute('value', aula);
        document.getElementById("cupoLabel").setAttribute('value', cupo);
    }
    
    
   
    function mostrarValores2(button) {
        var row = button.closest("tr");
        var id = row.querySelector(".registroId").innerText;
        var titulo = row.cells[1].innerText;
        var ponente = row.cells[2].innerText;
        var souvenir = row.cells[5].innerText;
        var precio = row.cells[6].innerText;
        var horario = row.cells[7].innerText;
        var fecha = row.cells[8].innerText;
        var aula = row.cells[10].innerText;
        var cupo = row.cells[11].innerText;
        document.getElementById("id_cursoLabel").setAttribute('value', id);
        document.getElementById("tituloLabel").setAttribute('value',titulo);
        document.getElementById("ponenteLabel").setAttribute('value', ponente);
        document.getElementById("souvenirLabel").setAttribute('value',souvenir);
        document.getElementById("precioLabel").setAttribute('value', precio);
        document.getElementById("horarioLabel").setAttribute('value', horario);
        document.getElementById("fechaLabel").setAttribute('value', fecha);
        document.getElementById("aulaLabel").setAttribute('value', aula);
        document.getElementById("cupoLabel").setAttribute('value', cupo);
    }
    