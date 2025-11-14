<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_libreria/config/sesiones.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style> body { background-color: transparent !important; } </style>
</head>
<body>
  <div class="container text-center mt-5">
    
    <h1 class="display-4">📚<br>LIBRERÍA</h1>
    <p class="lead">Bienvenido al sistema de gestión KVM.</p>
    <hr class="my-4">
    
    <img src="<?php echo BASE_URL; ?>/public/images/logo.jpeg" alt="Logo Librería" class="img-fluid shadow-sm" style="max-height: 400px; border-radius: 8px;">
  
  </div>
</body>
</html>