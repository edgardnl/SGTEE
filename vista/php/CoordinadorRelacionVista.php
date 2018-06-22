<?php
class CoordinadorRelacionVista{
    function generaTablaCoordinadorRelacion($data){
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
                            <th>Nombre del Alumno</th>
                            <th>Apellido Paterno</th>
                            <th>apellido Maternos </th>
                            <th>Status</th>
                            <th>llllll</th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
        if($r->estatus == 0){
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
        else{
            $row = "<tr>
                        <td scope='row'>".$r->id."</td>
                        <td>".$r->clave."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td>".$r->estatus."</td>
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