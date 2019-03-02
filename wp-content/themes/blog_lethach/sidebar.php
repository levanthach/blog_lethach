<div class="widget">
	<h3>Tìm Kiếm</h3>
	<div class="content-search">
		<form action="<?php bloginfo('url'); ?>" method="GET" role="form">
			<div class="form-group">
				<input type="text" name="s" class="form-control" placeholder="Nhập từ khóa...">
				<button type="submit" class="btn btn-primary">Tìm Kiếm</button>
			</div>
			
		</form>
	</div>
</div>
<div class="widget">
	<h3>Chuyên mục</h3>
	<div class="content-w">
		<ul>
			<?php
			$args = array(
			  'orderby' => 'name',
			  'parent' => 0
			  );
			$categories = get_categories( $args );
			foreach ( $categories as $category ) {
				echo '<a href="' . get_category_link( $category->term_id) . '">' . $category->name . '</a>' . "  (" .$category->count .")". '<br/>';
			}
			?>
		</ul>
	</div>
</div>
<div class="widget">
	<h3>Bài viết mới</h3>
	<div class="content-new">
		<ul>
			<!-- Get post News Query -->
			<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=5&post_type=post&cat=1'); ?>
			<?php global $wp_query; $wp_query->in_the_loop = true; ?>
			<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'full' , array('class' => 'thumbnail')); ?></a>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="meta"><span>Ngày đăng: <?php echo get_the_date('d - m - Y'); ?></span></div>
					<div class="clear"></div>
				</li>
			<?php endwhile; wp_reset_postdata(); ?>
			<!-- Get post News Query -->
			
		</ul>
	</div>
</div>
<div class="widget">
	<h3>Bài viết xem nhiều</h3>
	<div class="content-mostv">
		<ul>
		    <?php  $i = 1; ?>
			<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=8&post_type=post&meta_key=views&orderby=meta_value_num'); ?>
			<?php global $wp_query; $wp_query->in_the_loop = true; ?>
			<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<li>
					<span><?php echo $i; ?></span>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="clear"></div>
				</li>
				<?php $i++; ?>
			<?php endwhile; wp_reset_postdata(); ?>
			
		</ul>
	</div>
</div>
<div class="widget">
	<h3>Quảng cáo</h3>
	<div class="content-wc">
		<a href="#"><img src="<?php bloginfo('template_directory') ?>/images/qc.jpg" alt=""></a>
	</div>
</div>
<div class="widget">
	<h3>Bạn bè</h3>
	<div class="content-w">
		<ul>
			<li><a href="http://thachit.somee.com">Lê Thạch</a></li>
			<li><a href="http://thachit.somee.com">Blog của Lê Thạch</a></li>
		</ul>
	</div>
</div>
<div class="widget">
	<h3>Facebook</h3>
	<div class="content-fb">
		<ul>
			<div class="fb-page" data-href="https://www.facebook.com/XemTinBongDa/" data-tabs="timeline" data-height="400px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/XemTinBongDa/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/XemTinBongDa/">Tin Bóng Đá</a></blockquote></div>
		</ul>
	</div>
</div>