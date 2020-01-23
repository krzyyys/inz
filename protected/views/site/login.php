<?php /** @var TbActiveForm $form */
$this->pageTitle=Yii::app()->name . ' - Rejestracja';
$this->breadcrumbs=array(
	'Login',
);

$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'login-form',
		'type' => 'horizontal',
		'enableAjaxValidation'=>false,
    
    
    ));

    
?>

<div class="col-sm-12">

<div class="text-center">
<h1><span class="glyphicon glyphicon-hdd text-zolty" aria-hidden="true"></span> Archiwum</h1>
<h6>Logowanie</h6> <br />
</div>
<div class="col-sm-3"></div>
<div class="col-sm-6">
	
		<?php echo $form->textFieldGroup(
			$model,
			'username',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
					
				),

			)
		); ?>	
		
		<?php echo $form->passwordFieldGroup(
			$model,
			'password',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>
		
		<?php echo $form->checkboxGroup($model, 'rememberMe'); ?>
		
<?php $this->widget(
			'booster.widgets.TbButton',
			array(
        'buttonType'=> 'submit',
				'context' => 'warning',
				'label' => 'Zaloguj sie',
				'htmlOptions' => array(
					'class' => 'btn-block'),
				
			)
		); ?>



<?php
$this->endWidget();
unset($form);
?>

<div class="text-center" col-sm-6>lub</div>
<a href="/praca/signup" class="btn btn-primary btn-block" >Zarejestruj sie</a>
		

	</div>
		</div>
      
	<br />

