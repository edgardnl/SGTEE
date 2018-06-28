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
                            <th>Matricula</th>
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
                        <td scope='row'>".$r->matricula."</td>
                        <td>".$r->nombre."</td>
                        <td>".$r->ap_p."</td>
                        <td>".$r->ap_m."</td>
                        <td><button class='btn-success btn' onclick='enviarEditarTutor(".$r->matricula.")'>Editar</button></td>
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

                    <select name='id_tutor' id='selector1' class='form-control1' pattern='.{1,}' required title='minimo 3 caracteres' maxlength='15'>";
        $opts = "";
        foreach ($data as $key) {
            $opt = "<option value='".$key->id."'>".$key->nombre_tutor."</option>";
            $opts = $opts.$opt;
        }
                            
        $fin ="</select></div>
        <div class='col-sm-2 jlkdfj'>
                                        <p class='help-block'></p>
                                    </div>

                                </div>";            

    return $cad.$opts.$fin;

      
    }
}


        
    