<?php
/* @var $this UzytkownikController */
/* @var $model Uzytkownik */

$this->breadcrumbs=array(
	'Uzytkowniks'=>array('index'),
	'Manage',
);

?>

<h1>Zarzadzaj uzytkownikami</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'uzytkownik-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'IDuzytkownika',
		'login',
    array(
            'name' => 'role_IDroli',
            'filter' => CHtml::listData(Role::model()->findAll(), 'IDroli', 'nazwa'), // fields from country table
            'value' => 'Role::Model()->FindByPk($data->role_IDroli)->nazwa',
        ),
		//'haslo',
		/*
		'email',
		'nrTelefonu',
		'miasto',
		'ulica',
		'nrDomu',

		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
