<article>

	<a href="<?php the_permalink(); ?>">
		<div class="post_item">
			<div class="post_comment_area">
				<?php comments_number('0', '1', '%'); ?>
			</div>
			<div class="post_info">

				<!-- Exibir conteúdo conforme tipo de formato -->
				<?php 

					if(get_post_format() == 'video'){ 
						$content = apply_filters('the_content', get_the_content());

						$video = get_media_embedded_in_content(
							$content,
							array('iframe', 'embed', 'object', 'video')
						);

						if($video){
							echo $video[0];
						}

					}elseif(get_post_format() == 'audio'){ 
						$content = apply_filters('the_content', get_the_content());

						$audio = get_media_embedded_in_content(
							$content,
							array('iframe', 'audio')
						);

						if($audio){
							echo $audio[0];
						}

					}elseif(has_post_thumbnail()){
						 the_post_thumbnail('medium', array('class'=>'post_thumb')); 
					} 

				?>

				<div class="post_data"><?php echo get_the_date(); ?></div>

				<div class="post_title"><?php the_title(); ?></div>

				<div class="post_excerpt"><?php the_excerpt(); ?></div>

			</div>
		</div>
	</a>

</article>