<?php
/* @var $this KatalogController */
/* @var $model Katalog */

$this->breadcrumbs=array(
	'Katalogs'=>array('index'),
	'Manage',
);


?>

<h1>Zarzadzaj katalogami</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'katalog-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IDkatalogu',
		array(
            'name' => 'uzytkownik_IDuzytkownika',
            'filter' => '',
            'value' => 'Uzytkownik::Model()->FindByPk($data->uzytkownik_IDuzytkownika)->login',
        ),
		'nazwa',
		'opis',
		'data',
		array(
            'name' => 'widok_IDwidoku',
            'filter' => CHtml::listData(Widok::model()->findAll(), 'IDwidoku', 'nazwa'), // fields from country table
            'value' => 'Widok::Model()->FindByPk($data->widok_IDwidoku)->nazwa',
        ),
		
		/*
		'uzytkownik_IDuzytkownika',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
