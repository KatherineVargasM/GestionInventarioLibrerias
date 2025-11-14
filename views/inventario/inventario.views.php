<?php require_once('../html/head.php'); ?>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Librería /</span> Inventario</h4>

<div class="card">
    <button type="button" class="btn btn-outline-primary" onclick="cargarLibrosSinInv();" data-bs-toggle="modal" data-bs-target="#ModalInventario">
      Añadir Stock a Libro
    </button>
    <h5 class="card-header">Stock de Libros</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Stock</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaInventario">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="ModalInventario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalInventario"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form_inventario" method="post">
                <input type="hidden" name="id_inventario" id="id_inventario">
                <div class="modal-body">
                
                    <div id="divSelectLibro" class="form-group mb-3">
                        <label for="id_libro">Libro (sin stock)</label>
                        <select id="id_libro" name="id_libro" class="form-select" required>
                        </select>
                    </div>
                    
                    <div id="divInfoLibro" class="form-group mb-3" style="display:none;">
                         <label>Libro</label>
                         <input type="text" id="nombre_libro_editar" class="form-control" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" required min="0">
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación</label>
                        <input type="text" name="ubicacion" id="ubicacion" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/scripts.php'); ?>
<script src="./inventario.js"></script>