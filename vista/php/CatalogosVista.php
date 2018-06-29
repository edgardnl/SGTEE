<?php

class CatalogosVista{
	
	function generaSelectParcial($data){

		$cad="<div class='form-group'>
                <!--dos-->
                <label for='focusedinput' class='col-sm-2 control-label'>Parcial</label>
                <div class='col-sm-8'>

                    <select name='parcial' id='parcial' class='form-control1'>
                    <option value='0'>Selecciona una opcion</option>";
        $opts = "";
        foreach ($data as $key) {
            $opt = "<option value='".$key->id_parcial."'>".$key->parcial."</option>";
            $opts = $opts.$opt;
        }
                            
        $fin ="</select></div>
        <div class='col-sm-2 jlkdfj'>
                                        <p class='help-block'></p>
                                    </div>

                                </div>";            

    	return $cad.$opts.$fin;

	}

	function generaSelectAsignatura($data){
		$cad="<div class='form-group'>
                <!--dos-->
                <label for='focusedinput' class='col-sm-2 control-label'>Asignatura</label>
                <div class='col-sm-8'>

                    <select name='asignatura' id='asignatura' class='form-control1'>
                    <option value='0'>Selecciona una opcion</option>";
        $opts = "";
        foreach ($data as $key) {
            $opt = "<option value='".$key->id_asignatura."'>".$key->asignatura."</option>";
            $opts = $opts.$opt;
        }
                            
        $fin ="</select></div>
        <div class='col-sm-2 jlkdfj'>
                                        <p class='help-block'></p>
                                    </div>

                                </div>";            

    	return $cad.$opts.$fin;		
	}

	function generaSelectProfesores($data){
		$cad="<div class='form-group'>
                <!--dos-->
                <label for='focusedinput' class='col-sm-2 control-label'>Profesores</label>
                <div class='col-sm-8'>

                    <select name='profesor' id='profesor' class='form-control1'>
                    <option value='0'>Selecciona una opcion</option>";
        $opts = "";
        foreach ($data as $key) {
            $opt = "<option value='".$key->id_profesor."'>".$key->nombreAll."</option>";
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