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
                            <th>#</th>
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
                        <td scope='row'>".$r->id."</td>
                        <td>".$r->clave."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td>".$r->estatus."</td>
                        <td><button class='btn-success btn' onclick='EnviarEditarCoordinadorR(".$r->id.")'>Editar Tutor</button></td>
                       
                    </tr>";
            $rows = $rows.$row;
            }
            else{
                 $row = "<tr>
                        <td scope='row'>".$r->id."</td>
                        <td>".$r->clave."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td>".$r->estatus."</td>
                        <td><button class='btn-success btn' onclick='enviaridCoordinador(".$r->id.")'>Asignar Tutor</button></td>
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