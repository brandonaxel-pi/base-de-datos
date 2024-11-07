<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_AVION.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: AVION,  orderBy: AVI_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode(string: $modelo[AVI_ID]);
  $id = htmlentities(string:$encodeId);
  $nombre = htmlentities(string: $modelo[AVI_NOMBRE]);
  $marca = htmlentities(string: $modelo[AVI_MARCA]);
  $model = htmlentities(string: $modelo[AVI_MODELO]);
  $tipo = htmlentities(string: $modelo[AVI_TIPO]);
  $render .=
   "<dt>
     <p>
      <a href='modifica.html?id=$id'>$nombre $marca $model $tipo</a>
     </p>
    </dt>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
