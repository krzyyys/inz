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
<h6>Rejestracja</h6> <br />
</div>
<div class="col-sm-3"></div>
<div class="col-sm-6">
	
		<?php echo $form->textFieldGroup(
			$model,
			'login',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
					
				),

			)
		); ?>
		
		<?php echo $form->passwordFieldGroup(
			$model,
			'haslo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>
		
		<?php echo $form->passwordFieldGroup(
			$model,
			'repeat_password',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>
		
		<?php echo $form->textFieldGroup(
			$model,
			'email',
			array(				
					'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>


	<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'warning',
				'label' => 'Zarejestruj się',
				'htmlOptions' => array(
					'class' => 'btn-block'),
				
			)
		); ?>



<?php
$this->endWidget();
unset($form);
?>

<div class="text-center" col-sm-6>lub</div>
<a href="/praca/login" class="btn btn-primary btn-block" >Zaloguj się</a>
		

	</div>
		</div>
      
	<br />