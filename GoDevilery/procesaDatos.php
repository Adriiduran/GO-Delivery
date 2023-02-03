<?php
include_once 'Datos.php';

if (isset($_POST['submit'])) {
    $fecha = $_POST['fecha'];
    $horas = floatval($_POST['horas']);
    $turno = $_POST['turno'];
    $pedidos = $_POST['pedidos'];
    $tipo = $_POST['tipo'];

    var_dump($horas);



    if (isset($_POST['horasLluvia'])) {
        $horasLLuvia = $_POST['horasLluvia'];
        $datos = new Datos($fecha, $turno, $tipo, $horas, $pedidos, $horasLLuvia);
    } else {
        $datos = new Datos($fecha, $turno, $tipo, $horas, $pedidos, 0);
    }

    if ($datos->comprobarInsert() == false) {
        $datos->insert();   
        header('Location: index.php');
    } else {
        header('Location: insertFallido.php');
    }
}

if (isset($_POST['select'])) {
    $datos = Datos::consultarDatosPorFecha($_POST['fechaInicial'], $_POST['fechaFinal']);

    $data = [];
    $total = 0;

    foreach ($datos as $dato) {
        $data[] = ['fecha' => $dato->getFecha(), 'turno' => $dato->getTurno(), 'tipo' => $dato->getTipo(), 'horas' => $dato->getHoras(), 'pedidos' => $dato->getPedidos(), 'total' => $dato->getTotal(), 'lluvia' => $dato->getLluvia()];
        $total += $dato->getTotal();
    }

    session_start();
    $_SESSION['datos'] = $data;
    $_SESSION['fecha'] = [$_POST['fechaInicial'],$_POST['fechaFinal']];
    $_SESSION['total'] = $total;
    header('Location: muestraDatos.php');
}