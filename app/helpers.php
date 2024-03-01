<?php
// Pestañas de la barra de navegacion partial.nav.blade.php
function setActive($routeName){
	return request()->routeIs($routeName) ? 'active':'';
}

// marcar chekbox cuando abre la pagina role  edit.blade.php
function setCheked($allItemList, $allItemToChecked){
  if ($allItemToChecked == null) {
  	return '';
  }
	$aux = false;
	foreach ($allItemToChecked as $itemToChecked) {
			if (strcmp($itemToChecked->id, $allItemList->id) == 0 ) {  $aux = true;  }
	}
	return $aux ? 'Checked' : '';
}

// marcar radios cuando abre la pagina role  edit.blade.php
function setChekedRadio($special,$valorRadio){
			if (isset($special)) {
			   if ( strcmp($special,$valorRadio) == 0  ) {
			   	   return "checked";
			   }
		  }
	return "";
 }

// para users show.blade.php
 function EmailVerificado($email_verified_at){
	// return $email_verified_at;
	   return is_null($email_verified_at) ? 'No Verificado' :  'Verificado';
 }
