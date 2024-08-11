<?php
require_once('../config/config.php');

class Clientes
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idClientes)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` WHERE `idClientes` = $idClientes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO `clientes` (`Nombres`, `Direccion`, `Telefono`, `Cedula`, `Correo`) VALUES ('$Nombres', '$Direccion', '$Telefono', '$Cedula', '$Correo')";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return $con->insert_id;
        } else {
            $con->close();
            return $con->error;
        }
    }

    public function actualizar($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "UPDATE `clientes` SET `Nombres`='$Nombres', `Direccion`='$Direccion', `Telefono`='$Telefono', `Cedula`='$Cedula', `Correo`='$Correo' WHERE `idClientes` = $idClientes";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return $idClientes;
        } else {
            $con->close();
            return $con->error;
        }
    }

    public function eliminar($idClientes)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM `clientes` WHERE `idClientes` = $idClientes";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return 1;
        } else {
            $con->close();
            return $con->error;
        }
    }
}
?>
