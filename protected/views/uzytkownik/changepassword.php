<div class="form">
 
<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
            'id' => 'chnage-password-form',
            'enableClientValidation' => true,
            'htmlOptions' => array('class' => 'well'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
     ));
if(isset($_GET['msg'])) echo '<h2>'.$_GET['msg'].' <small> <a href="/praca/uzytkownik/'.$model->IDuzytkownika.'">Wróc</a></h2> <br/>';

?>
 
 
 
  <?php echo $form->passwordFieldGroup(
			$model,
			'old_password',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>
		
		  <?php echo $form->passwordFieldGroup(
			$model,
			'new_password',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>
		
		  <?php echo $form->passwordFieldGroup(
			$model,
			'powtorz_password',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-12',
				),
			
			)
		); ?>

 
  <div class="row submit">
    
    
    	<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'warning',
				'label' => 'Zmien',
				'htmlOptions' => array(
					'class' => 'btn-block'),
				
			)
		); ?>
		
  </div>
  <?php $this->endWidget(); ?>
</div>