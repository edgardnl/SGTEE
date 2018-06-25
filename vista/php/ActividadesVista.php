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

    function tablaActividadPorIdSeguimiento($data){
        $dat ="<table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>                            
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Lugar</th>
                            <th>Detecto Problematica</th>
                            <th>Avance</th>
                            <th>Motivo</th>
                            <th></th>                            
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){

            if ($r->id_motivo == 3) {
                $row = "<tr>                        
                        <td scope='row'>".$r->id_actividades."</td>
                        <td>".$r->fecha."</td>
                        <td>".$r->hora."</td>
                        <td>".$r->lugar."</td>
                        <td>".$r->detecto_problematica."</td> 
                        <td>".$r->avance."</td>
                        <td><button class='btn-success btn' onclick='enviarCanaliza(".$r->id_actividades.")'>Canalizacion</button></td>
                        <td><button class='btn-warning btn' onclick='enviarEdicionAct(".$r->id_actividades.")'>Editar</button></td>                        
                    </tr>";
                $rows = $rows.$row;
            }else{
                $row = "<tr>                        
                        <td scope='row'>".$r->id_actividades."</td>
                        <td>".$r->fecha."</td>
                        <td>".$r->hora."</td>
                        <td>".$r->lugar."</td>
                        <td>".$r->detecto_problematica."</td> 
                        <td>".$r->avance."</td>
                        <td>".$r->motivo."</td>
                        <td><button class='btn-warning btn' onclick='enviarEdicionAct(".$r->id_actividades.")'>Editar</button></td>                        
                    </tr>";
                $rows = $rows.$row;
            }
            
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }
}
