<?php

class AlumnoVista {
	
	function loginDatos($data){
		$cad = "".$data->id_role;
		return $cad;
	}

	function tablaAlumnosActividades($data){
		$dat ="<script type='text/javascript' charset='utf-8'> 
            $(document).ready(function() {
                $('#example').dataTable();
            } );
        </script>  
        <table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id."</td>
                        <td>".$r->matricula."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td><button class='btn-success btn' onclick='enviarMostrarActiv(".$r->id.")'>Mostrar</button></td>
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
	}

    function generaTablaAlumnos($data){
        $dat ="<script type='text/javascript' charset='utf-8'> 
            $(document).ready(function() {
                $('#example').dataTable();
            } );
        </script>  
        <table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id."</td>
                        <td>".$r->clave."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td><button class='btn-success btn' onclick='enviarEditarAlumnos(".$r->id.")'>Editar</button></td>
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }
}
?>