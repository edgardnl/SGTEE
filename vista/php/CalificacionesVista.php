<?php

class CalificacionesVista{
	
	function tablaCalificacionesPorId($data){
		$dat ="<table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Profesor</th>
                            <th>Asignatura</th>                            
                            <th>Parcial</th>
                            <th>Calificacion</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id_calificiones."</td>
                        <td>".$r->nomProfesor."</td>
                        <td>".$r->asignatura."</td>
                        <td>".$r->parcial."</td>
                        <td>".$r->calificaciones."</td> 
                        <td><button class='btn-warning btn' onclick='enviarEdicionCal(".$r->id_calificiones.")'>Editar</button></td>
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
	}
}