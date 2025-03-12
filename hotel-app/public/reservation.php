<?php 
include __DIR__ . '/../src/components/header.php'; 
include __DIR__ . '/../db/database.php'; 

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $date = trim($_POST["date"]);
    $guests = intval($_POST["guests"]);

    if (strlen($name) < 3) {
        $errorMessage = "❌ El nombre debe tener al menos 3 caracteres.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "❌ El correo electrónico no es válido.";
    } elseif (!preg_match('/^\d{10}$/', $phone)) {
        $errorMessage = "❌ El número de teléfono debe tener 10 dígitos.";
    } elseif (empty($date)) {
        $errorMessage = "❌ Debe seleccionar una fecha.";
    } elseif ($guests < 1) {
        $errorMessage = "❌ Debe seleccionar al menos una persona.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO reservas (nombre, email, telefono, fecha_reserva, num_personas) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $date, $guests]);
            $successMessage = "✅ ¡Reserva realizada con éxito!";
        } catch (PDOException $e) {
            $errorMessage = "❌ Error al guardar la reserva.";
        }
    }
}
?>

<div class="container my-5">
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center"><?= $successMessage ?></div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger text-center"><?= $errorMessage ?></div>
    <?php endif; ?>

    <div class="card shadow-lg p-4 mx-auto" style="max-width: 500px;">
        <h2 class="text-center text-primary">Reserva tu Habitación</h2>
        <p class="text-center text-muted">Completa el formulario para reservar tu estancia</p>

        <form id="reservationForm" method="POST" novalidate>
            <div class="mb-3">
                <label class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="name" id="name" required>
                <div class="invalid-feedback">El nombre debe tener al menos 3 caracteres.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">Ingrese un correo válido.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="tel" class="form-control" name="phone" id="phone" required>
                <div class="invalid-feedback">Ingrese un teléfono válido (10 dígitos).</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de Entrada</label>
                <input type="date" class="form-control" name="date" id="date" required>
                <div class="invalid-feedback">Seleccione una fecha válida.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Número de Personas</label>
                <input type="number" class="form-control" name="guests" id="guests" min="1" required>
                <div class="invalid-feedback">Debe seleccionar al menos una persona.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reservar Ahora</button>
        </form>
    </div>
</div>

<script src="/js/validations.js"></script>

<?php include __DIR__ . '/../src/components/footer.php'; ?>
