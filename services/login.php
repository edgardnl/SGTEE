<?php 
                error_reporting(E_ALL ^ E_NOTICE);
		        $conexion=mysqli_connect('localhost','root','','sgte');

                $matricula = $_POST['m'];

                $sql = "SELECT alumnoID,tutorID,coordinadorID,administradorID FROM usuario WHERE (alumnoID = '{$matricula}') OR (tutorID = '{$matricula}')OR (coordinadorID = '{$matricula}')OR (administradorID = '{$matricula}')";
				
				
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result)){
            $alumno = $mostrar['alumnoID'];
            $tutor  = $mostrar['tutorID'];
            $coordi = $mostrar['coordinadorID'];
            $admini = $mostrar['administradorID'];
       
	}
        if($alumno == "" && $tutor == "" && $coordi == "" && $admini == ""){
            echo "no";
            //echo json_encode(["no"]);
        }
    
        
     if(!empty($alumno))
     {
            if    ($alumno == $matricula)
            {
                        //echo "<h2>Es alumno: {$alumno}</h2>";
            	        $query = "SELECT * FROM alumno WHERE matricula = '{$matricula}'";
                        $result = mysqli_query($conexion,$query);
                        if (mysqli_num_rows($result) >0)
                        {
                            $datos = array();
                            $datos[] = array_map("utf8_encode", mysqli_fetch_assoc($result));
                            $json_array = json_encode($datos);
                            echo $json_array;
                        }
                        else{echo json_encode(["no"]);}
             } 
     }elseif(!empty($tutor))
     {
            if($tutor  == $matricula)
            {
                        //echo "<h2>Es tutor: {$tutor}</h2>";
                        $query = "SELECT * FROM tutor WHERE matricula = '{$matricula}'";
                        $result = mysqli_query($conexion,$query);
                        if (mysqli_num_rows($result) >0)
                        {
                            $datos = array();
                            $datos[] = array_map("utf8_encode", mysqli_fetch_assoc($result));
                            $json_array = json_encode($datos);
                            echo $json_array;
                        }else{
                            echo json_encode(["no"]);
                        }
        }
     }elseif(!empty($coordi))
     { 
         if($coordi == $matricula)
         {
                            //echo "<h2>Es Coordinador: {$coordi}</h2>";
                            $query = "SELECT * FROM coordinador WHERE matricula = '{$matricula}'";
                            $result = mysqli_query($conexion,$query);

                            if (mysqli_num_rows($result) >0)
                            {
                                $datos = array();
                                $datos[] = array_map("utf8_encode", mysqli_fetch_assoc($result));
                                $json_array = json_encode($datos);
                                echo $json_array;
                            }else{
                                echo json_encode(["no"]);
                            }
            }
     }elseif(!empty($admini))
     {
            if($admini == $matricula)
            {
                            //echo "<h2>Es Administrador: {$admini}</h2>";
                            $query = "SELECT * FROM administrador WHERE matricula = '{$matricula}'";
                            $result = mysqli_query($conexion,$query);
                        if (mysqli_num_rows($result) >0)
                        {
                            $datos = array();
                            $datos[] = array_map("utf8_encode", mysqli_fetch_assoc($result));
                            $json_array = json_encode($datos);
                            echo $json_array;
                        }else{
                            echo json_encode(["no"]);
                        }
            }
     }
?>