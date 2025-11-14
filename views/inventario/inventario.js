function init() {
  $("#form_inventario").on("submit", (e) => {
    guardarEditarInventario(e);
  });
}
const rutaInventario = "../../controllers/inventario.controllers.php?op=";

$().ready(() => {
  cargaListaInventario();
});

var cargaListaInventario = () => {
  var html = "";
  $.get(rutaInventario + "todos", (ListaInventario) => {
    ListaInventario = JSON.parse(ListaInventario);
    $.each(ListaInventario, (index, item) => {
      html += `<tr>
            <td>${index + 1}</td>
            <td>${item.titulo}</td>
            <td>${item.autor_nombre}</td> <td>${item.stock}</td>
            <td>${item.ubicacion}</td>
            <td>
              <button class='btn btn-sm btn-primary' data-bs-toggle="modal" data-bs-target="#ModalInventario" onclick='uno(${item.id_inventario})'>Editar Stock</button>
            </td>
          </tr>`;
    });
    $("#ListaInventario").html(html);
  });
};

var guardarEditarInventario = (e) => {
  e.preventDefault();
  var DatosFormulario = new FormData($("#form_inventario")[0]);
  var accion = "";
  var id_inventario = $("#id_inventario").val();

  if (id_inventario > 0) {
    accion = rutaInventario + "actualizar";
  } else {
    accion = rutaInventario + "insertar";
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
        Swal.fire('¡Guardado!', 'El inventario se actualizó con éxito.', 'success');
        cargaListaInventario();
        limpiarCajasInventario();
      } else {
        Swal.fire('Error', 'Hubo un problema al guardar.', 'error');
      }
    },
  });
};

var uno = (id_inventario) => {
  $("#tituloModalInventario").html("Editar Stock");
  $("#divSelectLibro").hide();
  $("#id_libro").removeAttr("required");
  $("#divInfoLibro").show();

  $.post(rutaInventario + "uno", { id_inventario: id_inventario }, (item) => {
    item = JSON.parse(item);
    $("#id_inventario").val(item.id_inventario);
    $("#stock").val(item.stock);
    $("#ubicacion").val(item.ubicacion);
    $("#nombre_libro_editar").val(item.titulo);
  });
};

var cargarLibrosSinInv = () => {
  $("#tituloModalInventario").html("Añadir Stock");
  $("#divSelectLibro").show();
  $("#id_libro").attr("required", "required");
  $("#divInfoLibro").hide();

  return new Promise((resolve, reject) => {
    var html = `<option value="">Seleccione un Libro</option>`;
    $.get(rutaInventario + "librosSinInventario", (ListaLibros) => { 
      ListaLibros = JSON.parse(ListaLibros);
      $.each(ListaLibros, (index, libro) => {
        html += `<option value="${libro.id_libro}">${libro.titulo}</option>`;
      });
      $("#id_libro").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var limpiarCajasInventario = () => {
  $("#id_inventario").val("");
  $("#stock").val("");
  $("#ubicacion").val("");
  $("#id_libro").val("");
  $("#ModalInventario").modal("hide");
};

init();