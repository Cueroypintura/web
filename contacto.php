<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contacto - Cuero y Pintura</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="Estilos.css" />
  <style>
    body {
      background-image: url('img/fondo_contacto.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: Arial, sans-serif;
      color: #fff;
    }

    .form-label {
      color: #ffc107;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.9);
      color: #000;
      border: 2px solid transparent;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .form-control:focus {
      border-color: #ffc107;
      box-shadow: 0 0 12px rgba(255, 193, 7, 0.8);
      outline: none;
    }

    /* Animación para los enlaces sociales */
.d-flex a {
  transition: transform 0.3s ease, color 0.3s ease;
  display: flex;
  align-items: center;
  gap: 0.4rem;
}

.d-flex a:hover {
  transform: scale(1.15);
  text-decoration: none;
  filter: drop-shadow(0 0 4px #ffc107);
}


    ::placeholder {
      color: #666;
      font-style: italic;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }

    .form-control:focus::placeholder {
      opacity: 0.5;
    }

    .btn-primary {
      background-color: #ffc107;
      border: none;
      color: #000;
      font-weight: 700;
      box-shadow: 0 4px 10px rgba(255, 193, 7, 0.6);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #e0a800;
      box-shadow: 0 6px 15px rgba(224, 168, 0, 0.8);
    }

    .navbar {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
    }

    h2, h4 {
      color: #ffc107;
      text-shadow: 1px 1px 2px #000;
    }

    .text-shadow {
      text-shadow: 1px 1px 2px black;
    }

    /* Animación para el fade out */
    #mensaje-exito {
      transition: opacity 1.5s ease;
      opacity: 1;
    }

    #mensaje-exito.fade-out {
      opacity: 0;
    }
  </style>
</head>
<body>

<?php
  $nombre = $email = $mensaje = "";
  $errores = [];
  $exito = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
      $errores[] = "Por favor ingresa tu nombre.";
    } else {
      $nombre = htmlspecialchars($_POST["nombre"]);
    }

    if (empty($_POST["email"])) {
      $errores[] = "Por favor ingresa tu correo electrónico.";
    } else {
      $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["mensaje"])) {
      $errores[] = "Por favor escribe un mensaje.";
    } else {
      $mensaje = htmlspecialchars($_POST["mensaje"]);
    }

    if (empty($errores)) {
      $exito = true;
      $nombre = $email = $mensaje = "";
    }
  }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-grande">
  <div class="container">
    <a class="navbar-brand" href="index.html">Cuero y Pintura</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="servicios.html">Servicios</a></li>
        <li class="nav-item"><a class="nav-link" href="galeria.html">Galería</a></li>
        <li class="nav-item"><a class="nav-link active" href="contacto.php">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="nosotros.html">Nosotros</a></li> 
      </ul>
    </div>
  </div>
</nav>

<section class="container py-5">
  <h2 class="text-center mb-4">Contáctanos</h2>

  <?php if (!empty($errores)): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errores as $error): ?>
          <li><?= $error ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if ($exito): ?>
    <div id="mensaje-exito" class="alert alert-success text-center">
      ¡Gracias por tu mensaje! Nos pondremos en contacto pronto.
    </div>
  <?php endif; ?>

  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <form action="contacto.php" method="POST" novalidate>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            value="<?= $nombre ?>"
            placeholder="Tu nombre completo"
          />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico:</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            value="<?= $email ?>"
            placeholder="ejemplo@email.com"
          />
        </div>
        <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje:</label>
          <textarea
            class="form-control"
            id="mensaje"
            name="mensaje"
            rows="4"
            placeholder="Escribe tu mensaje aquí..."
          ><?= $mensaje ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar mensaje</button>
      </form>
    </div>
  </div>

  <div class="text-center">
    <h4>Síguenos o escríbenos directamente:</h4>
    <div class="d-flex justify-content-center gap-4 mt-3 fs-4">
      <a href="https://www.facebook.com/share/14GyMGtVzrf/?mibextid=wwXIfr" target="_blank" class="text-decoration-none text-primary">
        <i class="bi bi-facebook"></i> Facebook
      </a>
      <a href="https://wa.me/+573153116428" target="_blank" class="text-decoration-none text-success">
        <i class="bi bi-whatsapp"></i> WhatsApp
      </a>
      <a href="https://www.instagram.com/tapiceria_cuero_y_pintura?igsh=MTQ3NWlnc215dnho" target="_blank" class="text-decoration-none text-danger">
        <i class="bi bi-instagram"></i> Instagram
      </a>
      <a href="https://www.bing.com/maps?q=cuero+y+pintura+&FORM=HDRSC7&cp=7.119971%7E-73.130085&lvl=16.0">
        <i class="bi bi-geo-alt-fill"></i> Google Maps
      </a>
    </div>
  </div>
</section>

<footer class="bg-dark text-white text-center py-4 mt-5">
  <div class="container">
    <p class="mb-0">&copy; 2025 Cuero y Pintura. Todos los derechos reservados.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const mensajeExito = document.getElementById("mensaje-exito");
    if (mensajeExito) {
      setTimeout(() => {
        mensajeExito.classList.add("fade-out");
        // Luego de 1.5s (duración de la transición), lo eliminamos del DOM
        setTimeout(() => {
          mensajeExito.remove();
        }, 1500);
      }, 6000);
    }
  });
</script>

</body>
</html>

