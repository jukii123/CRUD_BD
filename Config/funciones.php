<?php
function limpiarCadena($cadena) {
    $palabras = [
        "<script>", "</script>", "<script src", "<script type",
        "SELECT * FROM", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE",
        "TRUNCATE TABLE", "SHOW TABLES", "SHOW DATABASES", "<?php", "?>",
        "--", "^", "<", ">", "==", ";", "::"
    ];

    foreach ($palabras as $p) {
        $cadena = str_ireplace($p, "", $cadena);
    }

    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = htmlspecialchars($cadena, ENT_QUOTES, 'UTF-8');

    return $cadena;
}
?>
