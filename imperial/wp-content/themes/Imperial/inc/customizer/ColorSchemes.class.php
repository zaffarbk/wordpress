<?php
	class Stm_CustomizeColorSchemes_Control extends WP_Customize_Control {
		public function render_content() {
			?>

			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

				<div id="theme_scheme">
					<ul>
						<?php foreach($this->choices as $itemName=>$itemLabel): ?>
						<li class="scheme_<?php echo $itemName?>">
							<label><input type="radio" <?php $this->link(); ?> name="<?php echo $this->id?>" value="<?php echo $itemName;?>" title="<?php echo $itemLabel?>"><?php echo $itemLabel?></label>
						</li>
						<?php endforeach;?>

					</ul>
				</div>
			</label>

		<?php
		}
	}