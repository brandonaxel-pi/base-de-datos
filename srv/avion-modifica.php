<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_AVION.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $marca = recuperaTexto("marca");
 $modelo = recuperaTexto("modelo"); 
 $tipo = recuperaTexto("tipo");

 $nombre = validaNombre($nombre);

 update(
  pdo: Bd::pdo(),
  table: AVION,
  set: [AVI_NOMBRE => $nombre, AVI_MARCA => $marca, AVI_MODELO => $modelo, AVI_TIPO => $tipo],
  where: [AVI_ID => $id]

 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "marca" => ["value" => $marca],
  "modelo" => ["value" => $modelo],
  "tipo" => ["value" => $tipo],
 ]);
});
