function init() {
  $("#form_libros").on("submit", (e) => {
    guardarEditarLibro(e);
  });
}

const rutaLibros = "../../controllers/libros.controllers.php?op=";
const rutaAutores = "../../controllers/autores.controllers.php?op=";

$().ready(() => {
  cargaListaLibros();
});

var cargaListaLibros = () => {
  var html = "";
  $.get(rutaLibros + "todos", (ListaLibros) => {
    ListaLibros = JSON.parse(ListaLibros);
    $.each(ListaLibros, (index, libro) => {
      html += `<tr>
            <td>${index + 1}</td>
            <td>${libro.titulo}</td>
            <td>${libro.isbn}</td>
            <td>${libro.año}</td> <td>${libro.autor_nombre}</td>
            <td>
              <button class='btn btn-sm btn-primary' data-bs-toggle="modal" data-bs-target="#ModalLibros" onclick='uno(${libro.id_libro})'>Editar</button>
            </td>
          </tr>`;
    });
    $("#ListaLibros").html(html);
  });
};

var guardarEditarLibro = (e) => {
  e.preventDefault();
  var DatosFormulario = new FormData($("#form_libros")[0]);
  var accion = "";
  var id_libro = $("#id_libro").val();

  if (id_libro > 0) {
    accion = rutaLibros + "actualizar";
  } else {
    accion = rutaLibros + "insertar";
  }

  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormulario,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        Swal.fire('¡Guardado!', 'El libro se guardó con éxito.', 'success');
        cargaListaLibros();
        limpiarCajasLibro();
      } else {
        Swal.fire('Error', 'Hubo un problema al guardar.', 'error');
      }
    },
  });
};

var uno = async (id_libro) => {
  await cargarAutores();
  
  $("#tituloModalLibro").html("Editar Libro");
  $.post(rutaLibros + "uno", { id_libro: id_libro }, (libro) => {
    libro = JSON.parse(libro);
    $("#id_libro").val(libro.id_libro);
    $("#titulo").val(libro.titulo);
    $("#isbn").val(libro.isbn);
    $("#año").val(libro.año);
    $("#id_autor").val(libro.id_autor); 
  });
};

var cargarAutores = () => {
  return new Promise((resolve, reject) => {
    var html = `<option value="0">Seleccione un Autor</option>`;
    $.get(rutaAutores + "todos", (ListaAutores) => {
      ListaAutores = JSON.parse(ListaAutores);
      $.each(ListaAutores, (index, autor) => {
        html += `<option value="${autor.id_autor}">${autor.nombre_apellido}</option>`;
      });
      $("#id_autor").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var limpiarCajasLibro = () => {
  $("#id_libro").val("");
  $("#titulo").val("");
  $("#isbn").val("");
  $("#año").val("");
  $("#id_autor").val("0");
  $("#tituloModalLibro").html("Nuevo Libro");
  $("#ModalLibros").modal("hide");
};

init();