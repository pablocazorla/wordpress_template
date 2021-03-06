<?php get_header(); ?>
	<article id="main-article" class="wrap archive">		
		<section class="post-list">
			<?php $cat_name = single_cat_title('',false);?>
			<header class="post-list-header">
				<h1>
					<?php if(is_category()):
						echo $cat_name; 
					elseif(is_tag()):
						echo "Tag <i>".$cat_name."</i>"; 
					elseif(is_author()):
						echo "Author: <i>".$cat_name."<i>"; 
					elseif(is_archive()):
						echo "On archive <i>".$cat_name."<i>";
					endif; ?>
				</h1>
				<p><?php echo category_description(); ?></p>
			</header>
			<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>
			<div class="content" id="post-<?php the_ID();?>">
				<a href="<?php the_permalink(); ?>">				
					<?php if(has_post_thumbnail()){
					the_post_thumbnail('thumbnail');
					}else{ ?>
					<img src="<?php bloginfo('template_url'); ?>/img/default-thumbnail.jpg" />
					<?php } ?>
				</a>
				<div class="post-caption">											
					<h2>
						<a href="<?php the_permalink(); ?>">					
							<?php the_title(); ?>
						</a>
					</h2>
					<div class="category">
						<?php the_category(', '); ?>					
					</div>
					<?php the_excerpt(); ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php else :?>
			<h2>Sorry, posts not found</h2>
			<?php endif; ?>
			<nav class="pagination">
				<?php		
					next_posts_link('<span class="link-title">Next Posts</span>');
					previous_posts_link('<span class="link-title">Previous Posts</span>');
				?>
			</nav>
		</section>
		<aside class="aside-sidebar">
			<?php get_sidebar(); ?>
		</aside>	
	</article>
<?php get_footer(); ?>