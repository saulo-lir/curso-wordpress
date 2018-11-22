<?php

function sr_add_dashboard_widgets(){

	wp_add_dashboard_widget(
		'sr_receitas_ultimos_votos_widget',
		'Últimos Votos de Receitas',
		'sr_receitas_ultimos_votos_display'
	);

}

function sr_receitas_ultimos_votos_display(){

	global $wpdb;

	$ultimos_votos = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."receitas_votos ORDER BY ID LIMIT 5");

	echo "<ul>";

	foreach($ultimos_votos as $voto){
		$title = get_the_title($voto->receita_id);
		$permalink = get_the_permalink($voto->receita_id);
		$nota = $voto->voto;
	?>

		<li>
			<a href="<?= $permalink ?>"><?=  $title ?></a> recebeu um voto de <?= $nota ?>
		</li>

	<?php
	}	

	echo "</ul>";

}