<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_libreria/config/sesiones.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_libreria/views/html/head.php'); 
?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Librería /</span> Autores</h4>

<div class="card">
    <h5 class="card-header">Lista de Autores</h5>
    <div class="card-body">
        
        <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalAutores">
            Nuevo Autor
        </button>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre y Apellido</th> 
                        <th>Nacionalidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="ListaAutores">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAutores" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalAutor"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form_autores" method="post">
                <input type="hidden" name="id_autor" id="id_autor">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nombre_apellido">Nombre y Apellido</label> 
                        <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" placeholder=" " required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" placeholder=" " required>
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

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_libreria/views/html/scripts.php'); ?>
<script src="./autores.js"></script>