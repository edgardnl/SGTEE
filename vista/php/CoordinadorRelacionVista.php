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
                            <th>Nombre Del Alumno</th>
                            <th>Clave tutor</th>
                            <th>Nombre Del Tutor </th>
                            <th>Aprobado</th>                            
                            
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
        
            $row = "<tr>
                        <td scope='row'>".$r->id."</td>
                        <td>".$r->clave."</td>
                        <td>".$r->nombre." ".$r->ap_p." ".$r->ap_m."</td>
                        <td>".$r->clavet."</td>
                        <td>".$r->nombret." ".$r->ap_pt." ".$r->ap_mt."</</td>
                        <td>".$r->estatus."</td>                                                 
                    </tr>";
            $rows = $rows.$row;
        
        
    }
        $fin = "</tbody>
                </table>";
        //<th>Eliminar</th>
        //<td><button class='btn-success btn' onclick='eliminarsinmvc(".$r->id.")'>Eliminar Relacion</button></td>
        
        return $dat.$rows.$fin;

    }
}
?>