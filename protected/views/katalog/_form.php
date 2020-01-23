<?php
/* @var $this KatalogController */
/* @var $model Katalog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'katalog-form',
		'type' => 'horizontal',
		'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
		'enableAjaxValidation'=>false,
		
	)
	
	
); ?>


<p class="note">Pola z <span class="required">*</span> sa obowiazkowe.</p>
 
	<fieldset>


	
			<?php echo $form->textFieldGroup(
			$model,
			'nazwa',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
				'hint' => 'Nazwa katalogu.'
			)
		); ?>

				
				<?php echo $form->textAreaGroup(
			$model,
			'opis',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
				)
			)
		); ?>


	
			<?php echo $form->dropDownListGroup(
			$model,
			'widok_IDwidoku',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
	   			'widgetOptions' => array(
	   				'data' => CHtml::listData(Widok::model()->findAll(), 'IDwidoku', 'nazwa'),
					
				)
			)
		); ?>

	</fieldset>
 
	<div class="row">
		<div class="col-sm-6">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'OK',
								'htmlOptions' => array(
					'class' => 'btn-block'),
			)
		); ?>
		</div>
		<div class="col-sm-6">		
		<?php $this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'reset', 
             'label' => 'Wyczysc',
             				'htmlOptions' => array(
					'class' => 'btn-block'),)
		); ?>
		</div>
		<br/><br />
	</div>
</div>
	
	
<?php
$this->endWidget();
unset($form);