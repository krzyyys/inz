<?php
/* @var $this KatalogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publiczne katalogii uzytkownikow',
);
$this->pageTitle=Yii::app()->name . ' - Katalogi publiczne';

?>

<h1>Publiczne katalogii <small><a href='/praca/katalog/create/'><span class="glyphicon glyphicon-plus text-zolty" aria-hidden="true"></span></a></small></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText' => "",
	//'summaryText' => "{start} do {end} z {count}",
'template' => '{summary} {sorter} {items} {pager}',
'emptyText' => 'Aktualnie nie ma publicznych katalogów',
'sorterHeader' => 'Sortuj:',
'sortableAttributes' => array('uzytkownik_IDuzytkownika','nazwa', 'data'),
)); ?>
