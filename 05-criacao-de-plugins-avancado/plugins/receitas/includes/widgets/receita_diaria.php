<?php
// Classe responsável pela criação do widget de receita do dia

class Sr_Receita_Do_Dia_Widget extends WP_Widget{

	public function __construct(){

		$options = array(
			'description' => 'Mostra um receita nova por dia'
		);

		parent::__construct('sr_receita_do_dia', 'Receita Do Dia', $options);
	}

	public function form($instance){

		$default = array(
			'title' => 'Receita Do Dia'
		);

		$instance = wp_parse_args($instance, $default);

		$title_id = $this->get_field_id('title');
		$title_name = $this->get_field_name('title');
		$title_value = esc_attr($instance['title']);
?>
		<p>
			<label for="<?= $title_id ?>">Título:</label>
			<input type="text" class="widget" id="<?= $title_id ?>" name="<?= $title_name ?>" value="<?= $title_value ?>" />
		</p>

<?php

	}

	public function update($new_instance, $old_instance){
		
		$array = array(
			'title' => strip_tags($new_instance['title'])
		);

		return $array;
	}

	public function widget($args, $instance){

		extract($args);
		extract($instance);

		$title = apply_filters('widget_title', $title);

		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;

		$receita_id = get_transient('sr_receita_diaria');
?>
		<a href="<?= get_the_permalink($receita_id); ?>">
			<?= get_the_post_thumbnail($receita_id); ?><br/>

			<?= get_the_title($receita_id); ?>
		</a>

<?php
		echo $after_widget;

	}

}