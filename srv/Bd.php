<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

  //self::$pdo->exec("DROP TABLE IF EXISTS AVION");

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS AVION (
      AVI_ID INTEGER,
      AVI_NOMBRE TEXT NOT NULL,
      AVI_MARCA TEXT NOT NULL,
      AVI_MODELO TEXT NOT NULL,
      AVI_TIPO TEXT NOT NULL,
      CONSTRAINT AVI_PK
       PRIMARY KEY(AVI_ID),
      CONSTRAINT AVI_NOM_UNQ
        CONSTRAINT AVI_NOM_NV
       CHECK(LENGTH(AVI_NOMBRE) > 0)
     )"
   );
      
  }

  return self::$pdo;
 }
}
