<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_AVION.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $marca = recuperaTexto("marca");
 $modelo = recuperaTexto("modelo");
 $tipo = recuperaTexto("tipo");
 $nombre = validaNombre($nombre);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: AVION, values: [AVI_NOMBRE => $nombre, AVI_MARCA => $marca, AVI_MODELO => $modelo, AVI_TIPO => $tipo]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/avion.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "marca" => ["value" => $marca],
  "modelo" => ["value" => $modelo],
  "tipo" => ["value" => $tipo],
  
 ]);
});
