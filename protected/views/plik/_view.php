<?php
/* @var $this PlikController */
/* @var $data Plik */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDpliku')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDpliku), array('view', 'id'=>$data->IDpliku)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adres')); ?>:</b>
	<?php echo CHtml::encode($data->adres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('widok_IDwidoku')); ?>:</b>
	<?php echo CHtml::encode($data->widok_IDwidoku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('katalog_IDkatalogu')); ?>:</b>
	<?php echo CHtml::encode($data->katalog_IDkatalogu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uzytkownik_IDuzytkownika')); ?>:</b>
	<?php echo CHtml::encode($data->uzytkownik_IDuzytkownika); ?>
	<br />


</div>