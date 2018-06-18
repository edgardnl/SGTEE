<?php

class SeguimientoTutorVista{
	
	function generaTablaSeguimientoTutorActividades($data){
        $dat = "<script type='text/javascript' charset='utf-8'> 
            $(document).ready(function() {
                $('#example').dataTable();
            } );
        </script>  
        <table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Total de Actividades</th>                                                      
                            <th>Actividades</th>
                            <th></th>
                       </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id_seguimiento."</td>
                        <td>".$r->nomAlumno."</td>
                        <td>".$r->numActividades."</td>                        
                        <td><button class='btn-success btn' onclick='addActividad(".$r->id_seguimiento.")'>Agregar</button></td> 
                        <td><button class='btn-success btn' onclick='enviarSeguimiento(".$r->id_seguimiento.")'>Mostrar</button></td>                        
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }
}