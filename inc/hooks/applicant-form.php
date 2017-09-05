<?php

/**
 * Funcion que captura los valores del
 * formulario de aplicantes
 */
function fn_newapplicant(){

	// Nuestro código de manipulación de los datos

}
add_action('admin_post_nopriv_newapplicant', 'fn_newapplicant'); // Para usuarios no logueados
add_action('admin_post_newapplicant', 'fn_newapplicant'); // Para usuarios logueados