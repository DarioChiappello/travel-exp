<?php
   class Base{
      const DB_SERVER = "localhost";
      const DB_USER = "root";
      const DB_PASS = "";
      const DB_NAME = "travelexp_db";
      private $conexion;
      private $ultima_consulta;


      public function __construct(){
         $this->abrirConexion();
      }

      public function __destruct(){
         $this->cerrarConexion();
      }

      private function abrirConexion(){
         $this->conexion = mysqli_connect(self::DB_SERVER, self::DB_USER, self::DB_PASS, self::DB_NAME);
         if (!$this->conexion) {
            unset($this->conexion);
            die("No se puede conectar con la base de datos" . mysqli_connect_errno());
         }
      }
     
      private function cerrarConexion(){
         if (isset($this->conexion)){
            mysqli_close($this->conexion);
            unset($this->conexion);
         }
      }

      public function buscar_por_sql($sql){
         $resultado = $this->enviar_consulta($sql);
         return $resultado;
      }

      private function enviar_consulta($sql){
         $this->ultima_consulta = $sql;
         $resultado = mysqli_query($this->conexion,$sql);
         $this->verificar_consulta($resultado);
         return $resultado;
      }

      private function verificar_consulta($consulta){
         if (!$consulta) {
            $salida = "No se puede realizar la consulta" . mysqli_error() . "<br>";
            $salida .= "Última consulta SQL: " . $this->ultima_consulta;
            die($salida);
         }
      }
   }
   $conexion = new Base();
?>
