			<footer>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="block-footer">
								<!-- Get post News Query -->
								<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&post_type=page&p=41'); ?>
								<?php global $wp_query; $wp_query->in_the_loop = true; ?>
								<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
									<h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" class="readmore">Xem thêm</a>
								<?php endwhile; wp_reset_postdata(); ?>
								<!-- Get post News Query -->
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="block-footer">
								<h3>Chuyên mục</h3>
								<ul>
									<?php
									$args = array(
									'orderby' => 'name',
									'parent' => 0
									);
									$categories = get_categories( $args );
									foreach ( $categories as $category ) {
										echo '<a href="' . get_category_link( $category->term_id) . '">' . $category->name . '</a>' .'<br/>';
									}
									?>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="block-footer">
								<h3>Liên hệ</h3>
								<p>Điện thoại: 0377026186</p>
								<p>Email: lethach150699@gmail.com</p>
								<p>Lên hệ với tôi hay <a href="<?php bloginfo('url'); ?>/lien-he">click</a> vào đây.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<p>Bản quyền thuộc về Lê Thạch </p>
				</div>
			</footer>
		</div>
		<script src="<?php bloginfo('template_directory') ?>/js/jquery-3.2.1.min.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/js/main.js"></script>
		<div id="fb-root"></div>
		<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=278742422916908&autoLogAppEvents=1"></script>
		<?php wp_footer(); ?>
	</body>
</html>