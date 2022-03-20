<?php

if (isset($_POST['hide_upcp_review_box_hidden'])) {update_option('UPCP_Hide_Dash_Review_Ask', sanitize_text_field($_POST['hide_upcp_review_box_hidden']));}
$hideReview = get_option('UPCP_Hide_Dash_Review_Ask');
$Ask_Review_Date = get_option('UPCP_Ask_Review_Date');
if ($Ask_Review_Date == "") {$Ask_Review_Date = get_option("UPCP_Install_Time") + 3600*24*4;}

$Sql = "SELECT * FROM $catalogues_table_name ORDER BY Catalogue_Name LIMIT 0,10";
$myrows = $wpdb->get_results($Sql);
?>

<!-- START NEW DASHBOARD -->

<div id="ewd-upcp-dashboard-content-area">

	<div id="ewd-upcp-dashboard-content-left">

		<?php if ($Full_Version != "Yes" or get_option("UPCP_Trial_Happening") == "Yes") {
			$premium_info = '<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-full">';
			$premium_info .= '<div class="ewd-upcp-dashboard-new-widget-box-top">';
			$premium_info .= sprintf( __( '<a href="%s" target="_blank">Visit our website</a> to learn how to upgrade to premium.'), 'https://www.etoilewebdesign.com/premium-upgrade-instructions/' );
			$premium_info .= '</div>';
			$premium_info .= '</div>';

			echo apply_filters( 'ewd_dashboard_top', $premium_info, 'UPCP', 'https://www.etoilewebdesign.com/plugins/ultimate-product-catalog/#buy' );

		} ?>

		<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-upcp-dashboard-support-widget-box">
			<div class="ewd-upcp-dashboard-new-widget-box-top">Get Support<span id="ewd-upcp-dash-mobile-support-down-caret">&nbsp;&nbsp;&#9660;</span><span id="ewd-upcp-dash-mobile-support-up-caret">&nbsp;&nbsp;&#9650;</span></div>
			<div class="ewd-upcp-dashboard-new-widget-box-bottom">
				<ul class="ewd-upcp-dashboard-support-widgets">
					<li>
						<a href="https://www.youtube.com/watch?v=z6XL7whjY1Q&list=PLEndQUuhlvSoTRGeY6nWXbxbhmgepTyLi" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-youtube.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-support-widgets-text">YouTube Tutorials</div>
						</a>
					</li>
					<li>
						<a href="https://wordpress.org/plugins/ultimate-product-catalogue/#faq" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-faqs.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-support-widgets-text">Plugin FAQs</div>
						</a>
					</li>
					<li>
						<a href="https://www.etoilewebdesign.com/support-center/?Plugin=UPCP&Type=FAQs" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-documentation.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-support-widgets-text">Documentation</div>
						</a>
					</li>
					<li>
						<a href="https://www.etoilewebdesign.com/support-center/" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-forum.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-support-widgets-text">Get Support</div>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-upcp-dashboard-optional-table">
			<div class="ewd-upcp-dashboard-new-widget-box-top">Catalogs<span id="ewd-upcp-dash-optional-table-down-caret">&nbsp;&nbsp;&#9660;</span><span id="ewd-upcp-dash-optional-table-up-caret">&nbsp;&nbsp;&#9650;</span></div>
			<div class="ewd-upcp-dashboard-new-widget-box-bottom">
				<table class='ewd-upcp-overview-table wp-list-table widefat fixed striped posts'>
					<thead>
						<tr>
							<th><?php _e("Name", 'ultimate-product-catalogue'); ?></th>
							<th><?php _e("Shortcode", 'ultimate-product-catalogue'); ?></th>
							<th><?php _e("Products in Catalog", 'ultimate-product-catalogue'); ?></th>
						</tr>
					</thead>
					<tbody>
						 <?php
							if ($myrows) {
	  							foreach ($myrows as $Catalogue) {
									echo "<tr id='Item" . $Catalogue->Catalogue_ID ."'>";
									echo "<td class='name column-name'>";
									echo "<strong>";
									echo "<a class='row-title' href='admin.php?page=UPCP-options&Action=UPCP_Catalogue_Details&Selected=Catalogue&Catalogue_ID=" . $Catalogue->Catalogue_ID ."' title='Edit " . $Catalogue->Catalogue_Name . "'>" . $Catalogue->Catalogue_Name . "</a></strong>";
									echo "<br />";
									echo "<div class='row-actions'>";
									echo "<span class='delete'>";
									echo "<a class='delete-tag confirm-delete'' href='admin.php?page=UPCP-options&Action=UPCP_DeleteCatalogue&DisplayPage=Catalogues&Catalogue_ID=" . $Catalogue->Catalogue_ID ."'>" . __("Delete", 'ultimate-product-catalogue') . "</a>";
					 				echo "</span>";
									echo "</div>";
									echo "<div class='hidden' id='inline_" . $Catalogue->Catalogue_ID ."'>";
									echo "<div class='name'>" . $Catalogue->Catalogue_Name . "</div>";
									echo "</div>";
									echo "</td>";
									echo "<td class='description column-description'>[product-catalogue id='" . $Catalogue->Catalogue_ID . "']</td>";
									echo "<td class='description column-items-count'>" . $Catalogue->Catalogue_Item_Count . "</td>";
									echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="ewd-upcp-dashboard-new-widget-box <?php echo ( ($hideReview != 'Yes' and $Ask_Review_Date < time()) ? 'ewd-widget-box-two-thirds' : 'ewd-widget-box-full' ); ?>">
			<div class="ewd-upcp-dashboard-new-widget-box-top">What People Are Saying</div>
			<div class="ewd-upcp-dashboard-new-widget-box-bottom">
				<ul class="ewd-upcp-dashboard-testimonials">
					<?php $randomTestimonial = rand(0,2);
					if($randomTestimonial == 0){ ?>
						<li id="ewd-upcp-dashboard-testimonial-one">
							<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-testimonial-title">"Excellent and Works Perfect"</div>
							<div class="ewd-upcp-dashboard-testimonial-author">- @starmazing</div>
							<div class="ewd-upcp-dashboard-testimonial-text">A great way to organise products for mobile and desktop users. Result was perfect and more we could expect. Thanks a lot! <a href="https://wordpress.org/support/topic/excellent-to-design-a-shop-works-perfect-with-betheme/" target="_blank">read more</a></div>
						</li>
					<?php }
					if($randomTestimonial == 1){ ?>
						<li id="ewd-upcp-dashboard-testimonial-two">
							<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-testimonial-title">"Love It!"</div>
							<div class="ewd-upcp-dashboard-testimonial-author">- @kevdogg</div>
							<div class="ewd-upcp-dashboard-testimonial-text">I am using the product catalog on two sites now ~ the premium version. It is fast and easy. Their support is fast and helpful... <a href="https://wordpress.org/support/topic/love-it-2027/" target="_blank">read more</a></div>
						</li>
					<?php }
					if($randomTestimonial == 2){ ?>
						<li id="ewd-upcp-dashboard-testimonial-three">
							<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
							<div class="ewd-upcp-dashboard-testimonial-title">"Great plugin and TOP-Support"</div>
							<div class="ewd-upcp-dashboard-testimonial-author">- @bildfabrik</div>
							<div class="ewd-upcp-dashboard-testimonial-text">I searched for a plugin like this for month. Now my search is over – due to this great piece of work from Etoile Web Design... <a href="https://wordpress.org/support/topic/great-plugin-and-top-support-9/" target="_blank">read more</a></div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<?php if($hideReview != 'Yes' and $Ask_Review_Date < time()){ ?>
			<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-one-third">
				<div class="ewd-upcp-dashboard-new-widget-box-top">Leave a review</div>
				<div class="ewd-upcp-dashboard-new-widget-box-bottom">
					<div class="ewd-upcp-dashboard-review-ask">
						<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
						<div class="ewd-upcp-dashboard-review-ask-text">If you enjoy this plugin and have a minute, please consider leaving a 5-star review. Thank you!</div>
						<a href="https://wordpress.org/plugins/ultimate-product-catalogue/#reviews" class="ewd-upcp-dashboard-review-ask-button" target="_blank">LEAVE A REVIEW</a>
						<form action="admin.php?page=UPCP-options" method="post">
							<input type="hidden" name="hide_otp_review_box_hidden" value="Yes">
							<input type="submit" name="hide_otp_review_box_submit" class="ewd-upcp-dashboard-review-ask-dismiss" value="I've already left a review">
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($Full_Version != "Yes" or get_option("UPCP_Trial_Happening") == "Yes") { ?>
			<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-upcp-dashboard-guarantee-widget-box">
				<div class="ewd-upcp-dashboard-new-widget-box-top">
					<div class="ewd-upcp-dashboard-guarantee">
						<div class="ewd-upcp-dashboard-guarantee-title">14-Day 100% Money-Back Guarantee</div>
						<div class="ewd-upcp-dashboard-guarantee-text">If you're not 100% satisfied with the premium version of our plugin - no problem. You have 14 days to receive a FULL REFUND. We're certain you won't need it, though.</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</div> <!-- left -->

	<div id="ewd-upcp-dashboard-content-right">

		<?php if ($Full_Version != "Yes" or get_option("UPCP_Trial_Happening") == "Yes") { ?>
			<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-upcp-dashboard-get-premium-widget-box">
				<div class="ewd-upcp-dashboard-new-widget-box-top">Get Premium</div>

				<?php if ( get_option("UPCP_Trial_Happening") == "Yes" ) { do_action( 'ewd_trial_happening', 'UPCP' ); } ?>

				<div class="ewd-upcp-dashboard-new-widget-box-bottom">
					<div class="ewd-upcp-dashboard-get-premium-widget-features-title"<?php echo ( get_option("UPCP_Trial_Happening") == "Yes" ? "style='padding-top: 20px;'" : ""); ?>>GET FULL ACCESS WITH OUR PREMIUM VERSION AND GET:</div>
					<ul class="ewd-upcp-dashboard-get-premium-widget-features">
						<li>Unlimited Products</li>
						<li>Custom Fields</li>
						<li>WooCommerce Sync and Checkout</li>
						<li>Advanced Display Options</li>
						<li>+ More</li>
					</ul>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-product-catalog/#buy" class="ewd-upcp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>

					<?php if ( ! get_option("UPCP_Trial_Happening") ) { 
						$trial_info = sprintf( __( '<a href="%s" target="_blank">Visit our website</a> to learn how to get a free 7-day trial of the premium plugin.'), 'https://www.etoilewebdesign.com/premium-upgrade-instructions/' );
						
						echo apply_filters( 'ewd_trial_button', $trial_info, 'UPCP' );
					} ?>

				</div>
			</div>
		<?php } ?>

		<div class="ewd-upcp-dashboard-new-widget-box ewd-widget-box-full">
			<div class="ewd-upcp-dashboard-new-widget-box-top">Goes Great With</div>
			<div class="ewd-upcp-dashboard-new-widget-box-bottom">
				<ul class="ewd-upcp-dashboard-other-plugins">
					<li>
						<a href="https://wordpress.org/plugins/ultimate-faqs/" target="_blank"><img src="<?php echo plugins_url( '../images/ewd-ufaq-icon.png', __FILE__ ); ?>"></a>
						<div class="ewd-upcp-dashboard-other-plugins-text">
							<div class="ewd-upcp-dashboard-other-plugins-title">Ultimate FAQs</div>
							<div class="ewd-upcp-dashboard-other-plugins-blurb">An easy-to-use FAQ plugin that lets you create, order and publicize FAQs, with many styles and options!</div>
						</div>
					</li>
					<li>
						<a href="https://wordpress.org/plugins/ultimate-reviews/" target="_blank"><img src="<?php echo plugins_url( '../images/ewd-urp-icon.png', __FILE__ ); ?>"></a>
						<div class="ewd-upcp-dashboard-other-plugins-text">
							<div class="ewd-upcp-dashboard-other-plugins-title">Ultimate Reviews</div>
							<div class="ewd-upcp-dashboard-other-plugins-blurb">Let visitors submit reviews and display them right in the tabbed page layout!</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</div> <!-- right -->	

</div> <!-- ewd-upcp-dashboard-content-area -->

<?php if ($Full_Version != "Yes" or get_option("UPCP_Trial_Happening") == "Yes") { ?>
	<div id="ewd-upcp-dashboard-new-footer-one">
		<div class="ewd-upcp-dashboard-new-footer-one-inside">
			<div class="ewd-upcp-dashboard-new-footer-one-left">
				<div class="ewd-upcp-dashboard-new-footer-one-title">What's Included in Our Premium Version?</div>
				<ul class="ewd-upcp-dashboard-new-footer-one-benefits">
					<li>Unlimited Products</li>
					<li>Custom Fields</li>
					<li>WooCommerce Sync and Checkout</li>
					<li>Import/Export Products</li>
					<li>Advanced Product Page Layouts</li>
					<li>Advanced Display and Styling Options</li>
					<li>Product Page SEO Options</li>
					<li>Inquiry Form and Inquiry Cart</li>
					<li>Product Sorting Options</li>
				</ul>
			</div>
			<div class="ewd-upcp-dashboard-new-footer-one-buttons">
				<a class="ewd-upcp-dashboard-new-upgrade-button" href="https://www.etoilewebdesign.com/plugins/ultimate-product-catalog/#buy" target="_blank">UPGRADE NOW</a>
			</div>
		</div>
	</div> <!-- ewd-upcp-dashboard-new-footer-one -->
<?php } ?>	
<div id="ewd-upcp-dashboard-new-footer-two">
	<div class="ewd-upcp-dashboard-new-footer-two-inside">
		<img src="<?php echo plugins_url( '../images/ewd-logo-white.png', __FILE__ ); ?>" class="ewd-upcp-dashboard-new-footer-two-icon">
		<div class="ewd-upcp-dashboard-new-footer-two-blurb">
			At Etoile Web Design, we build reliable, easy-to-use WordPress plugins with a modern look. Rich in features, highly customizable and responsive, plugins by Etoile Web Design can be used as out-of-the-box solutions and can also be adapted to your specific requirements.
		</div>
		<ul class="ewd-upcp-dashboard-new-footer-two-menu">
			<li>SOCIAL</li>
			<li><a href="https://www.facebook.com/EtoileWebDesign/" target="_blank">Facebook</a></li>
			<li><a href="https://twitter.com/EtoileWebDesign" target="_blank">Twitter</a></li>
			<li><a href="https://www.etoilewebdesign.com/blog/" target="_blank">Blog</a></li>
		</ul>
		<ul class="ewd-upcp-dashboard-new-footer-two-menu">
			<li>SUPPORT</li>
			<li><a href="https://www.youtube.com/watch?v=z6XL7whjY1Q&list=PLEndQUuhlvSoTRGeY6nWXbxbhmgepTyLi" target="_blank">YouTube Tutorials</a></li>
			<li><a href="https://www.etoilewebdesign.com/support-center/?Plugin=UPCP&Type=FAQs" target="_blank">Documentation</a></li>
			<li><a href="https://www.etoilewebdesign.com/support-center/" target="_blank">Get Support</a></li>
			<li><a href="https://wordpress.org/plugins/ultimate-product-catalogue/#faq" target="_blank">FAQs</a></li>
		</ul>
	</div>
</div> <!-- ewd-upcp-dashboard-new-footer-two -->

<!-- END NEW DASHBOARD -->