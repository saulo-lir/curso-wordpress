<?php
function sr_deactivate_plugin(){
	wp_clear_scheduled_hook('sr_receita_diaria_hook');
}