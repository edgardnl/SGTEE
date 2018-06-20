<?php

class TutoresVista{
    
    function generaTablaTutores($data){
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
                        <td><button class='btn-success btn' onclick='enviarEditarTutor(".$r->id.")'>Editar</button></td>
                    </tr>";
            $rows = $rows.$row;
        }
        $fin = "</tbody>
                </table>";
        
        
        return $dat.$rows.$fin;
    }

    function generaSelectTutores($data){
        $cad="<div class='form-group'>
                <!--dos-->
                <label for='focusedinput' class='col-sm-2 control-label'>Tutores</label>
                <div class='col-sm-8'>

                    <select name='carrera' id='selector1' class='form-control1' pattern='.{1,}' required title='minimo 3 caracteres' maxlength='15'>";
        $opts = "";
        foreach ($data as $key) {
            $opt = "<option value='".$key->id."'>".$key->nombre_tutor."</option>";
            $opts = $opts.$opt;
        }
                            
        $fin ="</select></div>";            

    return $cad.$opts.$fin;

      
    }
}


        
    