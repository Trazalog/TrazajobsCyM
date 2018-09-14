<?php
class conexion
	{
	  var $server = "localhost";
	  var $user = "mauriper_traza";
	  var $pass = "123Traza24";
	  var $links;
	
	  function conectarse()   
	  	{
		 if(!($this->links=mysql_connect($this->server,$this->user,$this->pass)))
		 	{
			 return 1;
			} //si no se muestra ningun mensaje es que se realizo la conexion 
		
		 if (!mysql_select_db("mauriper_trazajobs20",$this->links ))
   			{
      		 return 1;
   			}
		}
		
	function cerrar_conexion()
		{
		 mysql_close($this->links); //cierra la conexion 
		}
}		
?>