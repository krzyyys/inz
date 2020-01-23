<?php
/* @var $this UzytkownikController */
/* @var $data Uzytkownik */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('imie')); ?>:</b>
	<?php echo CHtml::encode($data->imie); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />



	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nrTelefonu')); ?>:</b>
	<?php echo CHtml::encode($data->nrTelefonu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miasto')); ?>:</b>
	<?php echo CHtml::encode($data->miasto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ulica')); ?>:</b>
	<?php echo CHtml::encode($data->ulica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nrDomu')); ?>:</b>
	<?php echo CHtml::encode($data->nrDomu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_idrole')); ?>:</b>
	<?php echo CHtml::encode($data->role_idrole); ?>
	<br />

	*/ ?>

</div>