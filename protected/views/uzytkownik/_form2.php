<?php /** @var TbActiveForm $form */
$this->pageTitle=Yii::app()->name . ' - Rejestracja';
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'uzytkownik-form',
		'type' => 'horizontal',
		'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
		'enableAjaxValidation'=>false,
		
	)
	
); ?>

<div class="col-sm-12">

<div class="text-center">
<h1><span class="glyphicon glyphicon-hdd text-zolty" aria-hidden="true"></span> Archiwum</h1>
<h6>Zmiana danych użytkownika</h6> <br />
</div>
<div class="col-sm-3"></div>
<div class="col-sm-6">
	
		<?php echo $form->hiddenField($model,'login'); ?>
		
		
		<?php echo $form->textFieldGroup(
			$model,
			'imie',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); 
		if(isset(Yii::app()->user->roles)){         
                        if(Yii::app()->user->roles==='admin')
                        { 
		 echo $form->dropDownListGroup(
			$model,
			'role_IDroli',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
	   			'widgetOptions' => array(
	   				'data' => CHtml::listData(Role::model()->findAll(), 'IDroli', 'opis'),
				)
			)
		); 
		
		
		}
	}?>
		

	<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'warning',
				'label' => 'Aktualizuj',
				'htmlOptions' => array(
					'class' => 'btn-block'),
				
			)
		); ?>



<?php
$this->endWidget();
unset($form);
?>

		

	</div>
		</div>
      
	<br />