<?php

class RelacionVista{
    
    function generaTablaRelacionNombre($data){
        $dat = "
        <table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tutor</th>
                            <th>Alumno</th>                            
                            <th></th>
                        </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id_relacion."</td>
                        <td>".$r->tutor."</td>
                        <td>".$r->alumno."</td>
                        <td><button class='btn-success btn' onclick=''>Mostrar</button></td>                      
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }
    
    function generaTablaAlumosPorTutor($data){
        $dat = "<script type='text/javascript' charset='utf-8'> 
            $(document).ready(function() {
                $('#example').dataTable();
            } );
        </script>  
        <table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Aprobacion</th>                            
                            <th>Observaciones</th>
                            <th></th>
                       </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id_relacion."</td>
                        <td>".$r->NomAll."</td>
                        <td>".$r->aprobacion."</td>
                        <td>".$r->observacion."</td>
                        <td><button class='btn-success btn' onclick='enviarDetalleAlu(".$r->id_alumno.")'>Detalle</button></td>                      
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }

    function generaTablaAlumosNombrePorTutor($data){
        $dat = "<script type='text/javascript' charset='utf-8'> 
            $(document).ready(function() {
                $('#example').dataTable();
            } );
        </script>  
        <table class='table' id='example'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>                            
                            <th></th>
                       </tr>
                    </thead>
                <tbody>";
        $rows ="";
        foreach ($data as $r){
            $row = "<tr>
                        <td scope='row'>".$r->id_relacion."</td>
                        <td>".$r->NomAll."</td>                        
                        <td><button class='btn-success btn' onclick='enviarScoreAlu(".$r->id_alumno.")'>Calificaciones</button></td>                      
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }
}


        
