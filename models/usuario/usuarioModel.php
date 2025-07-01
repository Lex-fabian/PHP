<?php

require_once __DIR__ . '/../../config/conexion.php';

class UsuarioModel {
    private $conexion;

    public function __construct() {
        $this->conexion = getConexion();
    }

    public function credenciales($usuario, $clave) {
        $sql = 'SELECT * FROM usuario WHERE usuario = :usuario AND estado = "activo" LIMIT 1';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['clave'] == $clave) {
            return $user;
        }
        return false;
    }
}
?>