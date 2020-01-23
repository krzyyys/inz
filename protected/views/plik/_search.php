<?php
/* @var $this PlikController */
/* @var $model Plik */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDpliku'); ?>
		<?php echo $form->textField($model,'IDpliku',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adres'); ?>
		<?php echo $form->textField($model,'adres',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'widok_IDwidoku'); ?>
		<?php echo $form->textField($model,'widok_IDwidoku'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'katalog_IDkatalogu'); ?>
		<?php echo $form->textField($model,'katalog_IDkatalogu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uzytkownik_IDuzytkownika'); ?>
		<?php echo $form->textField($model,'uzytkownik_IDuzytkownika'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->