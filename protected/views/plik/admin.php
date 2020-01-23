<?php
/* @var $this PlikController */
/* @var $model Plik */

$this->breadcrumbs=array(
	'Pliks'=>array('index'),
	'Manage',
);

?>

<h1>Zarzadzaj plikami</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'plik-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IDpliku',
		
		
		'adres',
		array(
            'name'=>'adres',
            'header'=>'obrazek',
            'type'=>'html',
            'value'=>'(!empty($data->adres))?CHtml::image(($data->adres),"",array("style"=>"width:100px;","class"=>"img-responsive;")):"no image"',
 
        ),
		
		
		
		'data',
		
				array(
            'name' => 'widok_IDwidoku',
            'filter' => CHtml::listData(Widok::model()->findAll(), 'IDwidoku', 'nazwa'), // fields from country table
            'value' => 'Widok::Model()->FindByPk($data->widok_IDwidoku)->nazwa',
        ),
		array(
            'name' => 'katalog_IDkatalogu',
            'filter' => '',
            'value' => 'Katalog::Model()->FindByPk($data->katalog_IDkatalogu)->nazwa',
        ),
		array(
            'name' => 'uzytkownik_IDuzytkownika',
            'filter' => '',
            'value' => 'Uzytkownik::Model()->FindByPk($data->uzytkownik_IDuzytkownika)->login',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
