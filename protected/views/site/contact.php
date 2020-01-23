<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Kontakt';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Skontaktuj się!</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>




<?php 



$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id'=>'contact-form',
		'type' => 'horizontal',
		'enableAjaxValidation'=>false,
	)
);

?>

	<p class="note">Pola z <span class="required">*</span> są obowiązkowe.</p>

	<fieldset>
 		
		<?php echo $form->textFieldGroup(
			$model,
			'name',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'email',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				
			)
		); ?>

	<?php echo $form->textFieldGroup(
			$model,
			'subject',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				
			)
		); ?>

	<?php echo $form->ckEditorGroup(
			$model,
			'body',
			array(
		   		'wrapperHtmlOptions' => array(
					/* 'class' => 'col-sm-5', */
				),
				'widgetOptions' => array(
					'editorOptions' => array(
						'fullpage' => 'js:true',
						/* 'width' => '640', */
						/* 'resize_maxWidth' => '640', */
						/* 'resize_minWidth' => '320'*/
					)
				)
			)
		); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row text-center">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Przepisz litery</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	</fieldset>
 
<div class="form-actions text-center">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Wyslij'
			)
		); ?>
		

	</div>
<?php
$this->endWidget();
unset($form);

endif; ?>