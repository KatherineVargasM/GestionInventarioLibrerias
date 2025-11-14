function init() {
  $("#form_autores").on("submit", (e) => {
    guardarEditarAutor(e); 
  });
}
const rutaAutores = "../../controllers/autores.controllers.php?op=";

$().ready(() => {
  cargaListaAutores(); 
});

var cargaListaAutores = () => {
  var html = "";
  $.get(rutaAutores + "todos", (ListaAutores) => {
    ListaAutores = JSON.parse(ListaAutores);
    $.each(ListaAutores, (index, autor) => {
      html += `<tr>
            <td>${index + 1}</td>
            <td>${autor.nombre_apellido}</td> 
            <td>${autor.nacionalidad}</td>
            <td>
              <button class='btn btn-sm btn-primary' data-bs-toggle="modal" data-bs-target="#ModalAutores" onclick='uno(${autor.id_autor})'>Editar</button>
              <button class='btn btn-sm btn-danger' onclick='eliminar(${autor.id_autor})'>Eliminar</button>
            </td>
          </tr>`;
    });
    $("#ListaAutores").html(html);
  });
};

var guardarEditarAutor = (e) => {
  e.preventDefault();
  var DatosFormulario = new FormData($("#form_autores")[0]);
  var accion = "";
  var id_autor = $("#id_autor").val();

  if (id_autor > 0) {
    accion = rutaAutores + "actualizar";
  } else {
    accion = rutaAutores + "insertar";
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

        Swal.fire({
          title: '¡Guardado!',
          text: 'El autor se guardó con éxito.',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            cargaListaAutores();
            limpiarCajasAutor();
          }
        });

      } else {
        Swal.fire('Error', 'Hubo un problema al guardar.', 'error');
      }
    },
  });
};

var uno = (id_autor) => {
  $("#tituloModalAutor").html("Editar Autor");
  $.post(rutaAutores + "uno", { id_autor: id_autor }, (autor) => {
    autor = JSON.parse(autor);
    $("#id_autor").val(autor.id_autor);
    $("#nombre_apellido").val(autor.nombre_apellido); 
    $("#nacionalidad").val(autor.nacionalidad);
  });
};

var eliminar = (id_autor) => {
  Swal.fire({
    title: '¿Estás seguro?',
    text: "No podrás revertir esto.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, ¡borrar!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(rutaAutores + "eliminar", { id_autor: id_autor }, (respuesta) => {
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          Swal.fire('¡Borrado!', 'El autor ha sido eliminado.', 'success');
          cargaListaAutores(); 
        } else {
          Swal.fire('Error', 'No se pudo eliminar.', 'error');
        }
      });
    }
  });
};

var limpiarCajasAutor = () => {
  $("#id_autor").val("");
  $("#nombre_apellido").val(""); 
  $("#nacionalidad").val("");
  $("#tituloModalAutor").html("Nuevo Autor");
  $("#ModalAutores").modal("hide");
};

init();