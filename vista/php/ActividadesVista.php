<?php

class ActividadesVista {
    
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
                            <th>Tutor</th>                            
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Lugar</th>
                            <th>Detecto Problematica</th>
                            <th>Motivo</th>
                            <th>Avance</th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id_actividades."</td>
                        <td>".$r->ntutor."</td>
                        <td>".$r->fecha."</td>
                        <td>".$r->hora."</td>
                        <td>".$r->lugar."</td>
                        <td>".$r->detecto_problematica."</td> 
                        <td>".$r->motivo."</td>
                        <td>".$r->avance."</td>                        
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
	}
}
