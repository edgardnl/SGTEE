<?php

class Coordinador1Vista {
	

    function generaTablaAlumnosCoordinador($data){
        $dat ="<script type='text/javascript' charset='utf-8'> 
            $(document).ready(function() {
                $('#example').dataTable();
            } );
        </script>  
        <table class='table' id='example'>
                    <thead>
                        <tr>                            
                            <th>Claves</th>
                            <th>Nombre </th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Estatus</th>
                            <th>Herramientas</th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            if($r->estatus==0){
            $row = "<tr>                        
                        <td scope='row'>".$r->clave."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td>Con Tutor</td>
                        <td><button class='btn-warning btn' onclick='EnviarEditarCoordinadorR(".$r->clave.")'>Editar Tutor</button></td>
                       
                    </tr>";
            $rows = $rows.$row;
            }
            else{
                 $row = "<tr>                       
                        <td scope='row'>".$r->clave."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td>Sin Tutor</td>
                        <td><button class='btn-success btn' onclick='enviaridCoordinador(".$r->clave.")'>Asignar Tutor</button></td>
                    </tr>";
            $rows = $rows.$row;


        }
}

        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }
}
?>