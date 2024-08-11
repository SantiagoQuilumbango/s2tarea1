<?php
require_once('../config/config.php');

class Productos
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idProductos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos` WHERE `idProductos` = $idProductos";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombre_Producto, $Codigo_Barras, $Graba_IVA, $idProducto = null)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        if ($idProducto) {
            // Actualizar producto existente
            $cadena = "UPDATE `productos` SET `Nombre_Producto` = '$Nombre_Producto', `Codigo_Barras` = '$Codigo_Barras', `Graba_IVA` = '$Graba_IVA' WHERE `idProductos` = $idProducto";
            $result = mysqli_query($con, $cadena);
            $con->close();
            return $result ? $idProducto : $con->error;
        } else {
            // Insertar nuevo producto
            $cadena = "INSERT INTO `productos` (`Nombre_Producto`, `Codigo_Barras`, `Graba_IVA`) VALUES ('$Nombre_Producto', '$Codigo_Barras', '$Graba_IVA')";
            if (mysqli_query($con, $cadena)) {
                $con->close();
                return $con->insert_id;
            } else {
                $con->close();
                return $con->error;
            }
        }
    }

    public function actualizar($idProductos, $Nombre_Producto, $Codigo_Barras, $Graba_IVA)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "UPDATE `productos` SET `Nombre_Producto` = '$Nombre_Producto', `Codigo_Barras` = '$Codigo_Barras', `Graba_IVA` = '$Graba_IVA' WHERE `idProductos` = $idProductos";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return $idProductos;
        } else {
            $con->close();
            return $con->error;
        }
    }

    public function eliminar($idProductos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM `productos` WHERE `idProductos` = $idProductos";
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
