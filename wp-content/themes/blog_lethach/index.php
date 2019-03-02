<?php get_header(); ?>
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9">
					<div class="noibat">
						<?php get_template_part('noibat'); ?>
					</div>
					<div class="post-news">
						<h2 class="title-news">Bài viết mới nhất</h2>
						<div class="content-news">
							<?php if(have_posts()) : ?>
								<?php while(have_posts()) : the_post(); ?>
									<div class="news-detail">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array('class' => 'thumbnail')); ?></a>
										<div class="info-post">
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<div class="meta">
												<span>Ngày đăng:<?php echo get_the_date('d - m - Y'); ?></span>
											</div>
											<?php the_excerpt(); ?>
									</div>
								<div class="clear"></div>
							</div>
								<?php endwhile; else : ?>
								<p>Không có bài viết !</p>
							<?php endif; ?>
							
						</div>
						<?php if(paginate_links()!='') {?>
						<div class="phantrang">
							<?php
							global $wp_query;
							$big = 999999999;
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'prev_text'    => __('«'),
								'next_text'    => __('»'),
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
								) );
						    ?>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>