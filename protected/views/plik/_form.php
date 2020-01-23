<div class="form">

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'post-form',
		'type' => 'horizontal',
		'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
		'enableAjaxValidation'=>false,
		
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
		
		<?php echo $form->dropDownListGroup(
			$model,
			'katalog_IDkatalogu',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
	   			'widgetOptions' => array(
	   				'data' => CHtml::listData(Katalog::model()->findAll('uzytkownik_IDuzytkownika='.$model->uzytkownik_IDuzytkownika), 'IDkatalogu', 'nazwa'),
				)
			)
		); ?>
		
		
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
		

<?php $this->endWidget(); ?>

              