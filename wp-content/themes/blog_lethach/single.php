<?php get_header(); ?>
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9">
						<div class="breadcrumbs">
							<?php
								if ( function_exists('yoast_breadcrumb') ) {
									yoast_breadcrumb('<p id="breadcrumbs">','</p>');
								}
							?>
						</div>
					<div class="post-news">
						<!-- Get post mặt định -->
						<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
						<?php setpostview(get_the_id()); ?>
						   <h1 class="single-title"><?php the_title(); ?></h1>
							<div class="meta">
								<span>Ngày đăng : <?php echo get_the_date("d - m - Y");?></span>
								<span>Tác giả : <?php the_author(); ?></span> 
								<span>Chuyên mục : <?php the_category(" ,"); ?></span><br>
								<span>Lượt xem : <?php echo getpostviews(get_the_id()); ?> </span>
								<hr class="ngan">
							</div>
							<article class="post-content">
								<?php the_content(); ?>
							</article>
							<div class="tag">
								<p><?php the_tags('Từ Khóa : '); ?></p>
							</div>
							<div class="like">
								<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
							</div>

							<div class="comment">
								<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-width="100%"></div>
							</div>

							<div class="lienquan">
								<h3>Bài Viết Liên Quan</h3>
								<div class="content-lienquan">
								<?php 
									$categories = get_the_category(get_the_ID());
									if ($categories) 
									{
										$category_ids = array();
										foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
								
										$args=array(
										'category__in' => $category_ids,
										'post__not_in' => array(get_the_id()),
										'showposts'=>8, // Số bài viết bạn muốn hiển thị.
										);
										$my_query = new wp_query($args);
										if( $my_query->have_posts() ) 
										{
											echo '<ul class="list-news">';
											while ($my_query->have_posts())
											{
												$my_query->the_post();
												?>
												<li>
													<div class="new-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(85, 75)); ?></a></div>
													<div class="item-list">
														<h4><a href="<?php the_permalink() ?>" ><?php the_title();  ?></a></h4>
														<div class="meta_list">
															<span>Ngày đăng : <?php echo get_the_date("d - m - Y"); ?></span>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<?php
											}
											echo '</ul>';
										}
									}
								?>
								</div>
							</div>
						<?php endwhile; else : ?>
						<?php endif; ?>
						<!-- Get post mặt định -->
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