<h2 class="title-news">Bài viết nổi bật</h2>
<div class="content-nb"> <!-- lấy một bài viết nổi bật lớn -->
	<?php 
		$args = array(
			'post_status' => 'publish', // Chỉ lấy những bài viết được publish
			'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
			'showposts' => 1, // số lượng bài viết
			'cat' => 7, // lấy bài viết trong chuyên mục có id là 1
		);
	?>
	<?php $getposts = new WP_query($args); ?>
	<?php global $wp_query; $wp_query->in_the_loop = true; ?>
	<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
		<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'thumnail') ); ?></a>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="meta">
			<span>Ngày đăng: <?php echo get_the_date('d - m - Y') ?></span>
			<span>Lượt xem: <?php echo getpostviews(get_the_id()); ?></span>
		</div>
		<?php the_excerpt(); ?>
	<?php endwhile; wp_reset_postdata(); ?>
	
</div>
<div class="list-nb"><!--  lấy 3 bài viết nổi bật tiếp theo, trừ đi bài viết đầu tiên -->
	<div class="row">
	<?php 
		$args = array(
			'post_status' => 'publish', // Chỉ lấy những bài viết được publish
			'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
			'showposts' => 3, // số lượng bài viết
			'cat' => 7, // lấy bài viết trong chuyên mục có id là 1
			'offset' => 1 // bỏ đi bài viết đầu tiên
		);
	?>
 	<?php $getposts = new WP_query($args); ?>
	<?php global $wp_query; $wp_query->in_the_loop = true; ?>
	<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
		<div class="col-xs-4 col-sm-4 col-md-4 style-box">
			<div class="list-post">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_id(),'full', array('class' => 'thumbnail')); ?></a>
				<h4>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
				<div class="meta">
					<span>Ngày đăng: <?php echo get_the_date('d - m - Y'); ?></span>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>
