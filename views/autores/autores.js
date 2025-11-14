function init() {
  $("#form_autores").on("submit", (e) => {
    guardarEditarAutor(e);
  });
}
const rutaAutores = "../../controllers/autores.controllers.php?op=";

$(() => {
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
              <!-- CAMBIO DE COLOR: Botón EDITAR (Nuevo Verde: #389C20) -->
              <button class='btn btn-sm' style="background-color: #389C20; color: white; border: none;" data-bs-toggle="modal" data-bs-target="#ModalAutores" onclick='uno(${autor.id_autor})'>Editar</button>
              
              <!-- Color de ELIMINAR se mantiene: #008E8F -->
              <button class='btn btn-sm' style="background-color: #008E8F; color: white; border: none;" onclick='eliminar(${autor.id_autor})'>Eliminar</button>
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
      

      if (respuesta.includes("ok")) {
        
        limpiarCajasAutor(); 

        Swal.fire({
          title: '¡Guardado!',
          text: 'El autor se guardó con éxito.',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            cargaListaAutores();
          }
        });

      } else {

        Swal.fire('Error', 'Respuesta del servidor: ' + respuesta, 'error');
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
        
        if (respuesta.includes("ok")) {
          Swal.fire('¡Borrado!', 'El autor ha sido eliminado.', 'success');
          cargaListaAutores();
        } else {
          Swal.fire('Error', 'No se pudo eliminar: ' + respuesta, 'error');
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