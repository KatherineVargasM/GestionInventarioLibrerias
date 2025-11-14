<?php require_once('../html/head2.php'); ?>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Librería /</span> Libros</h4>

<div class="card">
    <button type="button" class="btn btn-outline-primary" onclick="cargarAutores();" data-bs-toggle="modal" data-bs-target="#ModalLibros">
      Nuevo Libro
    </button>
    <h5 class="card-header">Lista de Libros</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Año</th> <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaLibros">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="ModalLibros" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalLibro">Nuevo Libro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form_libros" method="post">
                <input type="hidden" name="id_libro" id="id_libro">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="isbn">ISBN</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="año">Año Publicación</label>
                        <input type="number" name="año" id="año" class="form-control" placeholder="Ej: 1967" required min="1000" max="2099">
                    </div>
                    <div class="form-group">
                        <label for="id_autor">Autor</label>
                        <select id="id_autor" name="id_autor" class="form-select" required>
                        </select>
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

<?php require_once('../html/scripts2.php'); ?>
<script src="./libros.js"></script>