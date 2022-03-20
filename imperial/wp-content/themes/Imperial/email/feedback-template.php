<?php foreach($inputData as $dataItemKey=>$dataItem): ?>
	<?php echo  sForms::label($dataItemKey)?>:<?php echo $dataItem['value'];?><br />
<?php endforeach;?>
