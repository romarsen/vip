<?php
/**
 * @file
 * Returns the HTML for the footer region.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728140
 */
?>
<?php if ($content): ?>
  <footer id="footer" class="<?php print $classes; ?>">

  	<div class="footer_row1">
  		<div class="footer1">
  			<?php 
  				$block = module_invoke('block', 'block_view', '2');
    			print render($block['content']);
    			$block = module_invoke('block', 'block_view', '3');
    			print render($block['content']);

				$block = block_load('views', 'icons-block');
    			$block_content = _block_render_blocks(array($block));
    			$build = _block_get_renderable_array($block_content);
    			print drupal_render($build);

    		 ?>
  		</div>
  		<div class="footer2">
  			<?php print $content; ?>
  		</div>
  	</div>
  	<div class="footer_row2">
  		<div class="footer2">
  			<?php 
  				$block = module_invoke('system', 'block_view', 'navigation');
    			print render($block['content']);
    		?>
  		</div>
  		<div class="footer1">
  			<div class="web">	Створення сайту Julya 
  				<a href="user/1"  width="28" height="28">
  					<img src="/sites/all/themes/zen/my_zen/images/anonim.jpg" alt="Створення сайту Web-West ">
  				</a>
  			</div>
  		</div>
  	</div>
  </footer>
<?php endif; ?>
