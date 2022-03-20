<table>
<?php

	if(!empty($fields)) foreach($fields as $fieldName=>$fieldData):

		if( ! empty( $fieldData['options'] ) )
		{
			$options = $fieldData['options'];
			if(is_callable($options))
				$options = call_user_func($options);
		}

		$type = empty($fieldData['type']) ? '' : $fieldData['type'];
		?>
	<?php if($type == 'selectbox'): ?>
		<tr>
			<td><strong><?php echo sForms::label($fieldName);?></strong></td>
			<td><?php echo sForms::selectbox($fieldName, $options);?></td>
		</tr>
	<?php elseif($type == 'textarea'):?>
		<tr>
			<td><strong><?php echo sForms::label($fieldName);?></strong></td>
			<td><?php echo sForms::textarea($fieldName, array('html_options'=>array('cols'=>60, 'rows'=>4, 'style'=>"width:98%")) );?></td>
		</tr>
	<?php elseif($type == 'multiselectbox'):?>
		<tr>
			<td><strong><?php echo sForms::label($fieldName);?></strong></td>
			<td><?php echo sForms::selectbox($fieldName, $options, array('html_options'=>array('multiple'=>'true')));?></td>
		</tr>

	<?php elseif($type == 'datetimepicker'): $initDateTimePicker = 1;?>
		<tr>
			<td><strong><?php echo sForms::label($fieldName);?></strong></td>
			<td><?php echo sForms::textField($fieldName, array('html_options'=>array('class'=>'datetimepicker')));?></td>
		</tr>
	<?php elseif($type == 'single_image_select'): $needMediaUpload  = true;?>
	<tr>
		<td><strong><?php echo sForms::label($fieldName);?></strong></td>
		<td>
			<input  type="button" class="single_image_select" name="media" value="<?php echo __('Select', STM_DOMAIN)?>">
			<?php if( ! empty( $value[0] ) ):?>	
			<input  type="button"  name="media" id="deleteButton" value="<?php echo __('Delete', STM_DOMAIN)?>" onclick="jQuery('#deleteButton').remove();jQuery('#new_id_list').val(''); jQuery('.images ul li').remove();">
			<?php endif;?>
			<?php echo sForms::hidden($fieldName, array('html_options'=>array('id'=>'new_id_list')));?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td class="images">
		
		<ul >
			<?php if( ! empty( $value[0] ) ):?>	
			<li><?php echo wp_get_attachment_image( $value[0] ); ?>
			</li>
			<?php endif?>
			
		</ul></td>
	</tr>
	<?php else:?>
		<tr>
			<td><strong><?php echo sForms::label($fieldName);?></strong></td>
			<td><?php echo sForms::textField($fieldName);?></td>
		</tr>
		
	<?php endif;?>
	
	
	
<?php endforeach;?>



	</table>


<?php if(!empty($needMediaUpload)):?>
<br class="ui-helper-clearfix">
<?php wp_enqueue_media();?>

<script type="text/javascript">
	
	jQuery(document).ready(function($){
		$('.single_image_select').click(function(e) {
			e.preventDefault();
			ImageIds = [];
			var custom_uploader = wp.media({
				title: 'Select images',
				button: {
					text: 'Attach'
				},
				multiple: true  // Set this to true to allow multiple files to be selected
			})
				.on('select', function() {
					var attachments = custom_uploader.state().get('selection').toJSON();
					console.log(attachments);
							
					jQuery.each(attachments, function(i, data){

						$('.images ul').html('<li class="attachment save-ready new" id="item-'+data.id+'">');

						$('#item-' + data.id).append($('<img>', {
							src : (typeof  data.sizes.thumbnail == 'undefined') ? data.sizes.full.url: data.sizes.thumbnail.url
						}));
						ImageIds.push( data.id );
					});
					
					jQuery('#new_id_list').val(ImageIds);

				})
				.open();
		});
	});
</script>
<?php endif;?>


<?php

	if(!Empty($initDateTimePicker)):
		wp_enqueue_script('jquery-ui-datepicker', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js');
		wp_enqueue_script('jquery-ui-timepicker', get_stylesheet_directory_uri().'/js/timepicker.js');
		wp_enqueue_style('jquery-ui-datepicker', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
	?>
		<script type="text/javascript">
			jQuery(function() {
				jQuery('.datetimepicker').datetimepicker();
			});
		</script>
<?php
	endif;


?>