<?php

	function getFooterMenu(){
		
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations['secondary'] );	
		if(empty($menu)) return false;
		$menu_items = wp_get_nav_menu_items($menu->term_id, array('post_parent'=>0));
		$divOn = ceil(count($menu_items)/2);

		if($menu_items):
		?>
		<ul>
			<?php $a =0; foreach($menu_items as $menuItem): $a++;?>
			 <li>
                <a href="<?php echo $menuItem->url?>"><?php echo apply_filters('the_title', $menuItem->title)?></a>
            </li>
            <?php if($divOn == $a):?> </ul><ul><?php endif;?>
            
			<?php endforeach;?>
		</ul>
		
		<?php
		endif;
		
	}