<?php
// Ruta del archivo de base de datos SQLite
$db_file = __DIR__ . "/database.sqlite";

try {
    // Verificar si la base de datos existe, si no, crearla
    $dbExists = file_exists($db_file);
    
    // Conectar a SQLite con PDO
    $pdo = new PDO("sqlite:" . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si la base de datos no existía, creamos la tabla
    if (!$dbExists) {
        $sql = "CREATE TABLE IF NOT EXISTS reservas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            email TEXT NOT NULL,
            telefono TEXT NOT NULL,
            fecha_reserva TEXT NOT NULL,
            num_personas INTEGER NOT NULL
        )";
        $pdo->exec($sql);
        file_put_contents(__DIR__ . "/database.log", date("[Y-m-d H:i:s]") . " ✅ Base de datos y tabla creadas\n", FILE_APPEND);
    }

} catch (PDOException $e) {
    file_put_contents(__DIR__ . "/database.log", date("[Y-m-d H:i:s]") . " ❌ Error: " . $e->getMessage() . "\n", FILE_APPEND);
    die("❌ Error de conexión a SQLite: " . $e->getMessage());
}
?>
