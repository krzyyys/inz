<?php
/* @var $this KatalogController */
/* @var $model Katalog */

$this->breadcrumbs=array(
	'Katalogs'=>array('index'),
	$model->IDkatalogu,
);

?>
<style>

form { display: block; 
        margin: 20px auto; 
        background: #eee; 
        border-radius: 10px; 
        padding: 15px 
}

.progress { position:relative; 
            width:100%; 
            height:40px;
            border: 1px solid #ffffff; padding: 1px; border-radius: 3px; }
.bar { background-color: #ed9c28; 
       width:0%; 
       height:100%; 
       border-radius: 3px; }
.percent { 
       position:absolute; 
       display:inline-block; 
       top:10px; left:48%; }
       
.dogory{    
 display: flex;
  flex-wrap: wrap;
 } 



.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  position: absolute;
  overflow: hidden;
  width: 80%;
  height: 80%;
  left: 10%;
  top: 10%;
  border-bottom: 1px solid #FFF;
  border-top: 1px solid #FFF;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  -ms-transform: scale(0,1);
  transform: scale(0,1);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}



.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 30px;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
  background-color: transparent;
  color: #FFF;
  padding: 0.5em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,-100%,0);
  transform: translate3d(0,-100%,0);
}

.hovereffect a, hovereffect p {
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,100%,0);
  transform: translate3d(0,100%,0);
}

.hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
</style>

      <div class="row">
         <?php
         if(empty(CHtml::encode($model->plikIDpliku['adres']))) { 
         ?>
           <div class="col-xs-12 col-sm-8" style="background: url('https://placeholdit.imgix.net/~text?txtsize=80&txt=nie+wybrano+miniatury&w=1900&h=1080') no-repeat center center; max-width:100%; height:auto; max-height:300px; min-height:300px;">
         <?php }                 
         else
         { ?>
            <div class="col-xs-12 col-sm-8" style="background: url('<?php echo CHtml::encode($model->plikIDpliku['adres']);?>') no-repeat center center; max-width:100%; height:auto; max-height:300px; min-height:300px;">
         <?php } ?>
            </div>
            
            <div class="col-xs-12 col-sm-4 text-center">
            <br />
            <?php echo'<h4>'.strtoupper(CHtml::encode($model->nazwa)).'<br/><br />
                        <small> '.strtoupper(CHtml::encode($model->opis)).' </small></h4><br />
                        STWORZONY '.CHtml::encode($model->data).' przez '.CHtml::encode($model->uzytkownikIDuzytkownika->login).' <br />';
     
                        if(isset(Yii::app()->user->roles)&&isset(Yii::app()->user->id)){         
                        if(((Yii::app()->user->roles)==='admin')||(Yii::app()->user->id) === ($model->uzytkownikIDuzytkownika['IDuzytkownika']))
                        { ?>
         
            <br />
                <div class="row">
                
                  <div class="col-xs-4 col-sm-4">
                      <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal">Dodaj plik</button><br />
                  </div>
                  
                  <div class="col-xs-4 col-sm-4">
                  
                                    <?php
                                    echo CHtml::button("Aktualizuj", 
                                                      array('submit' => array("katalog/update","id"=>$model->IDkatalogu),
                                                      'class'=>'btn btn-primary btn-block',
                                                      'encode' => false,
                                                       ));  
                  ?> 
                      
                  </div>
                                   
                  <div class="col-xs-4 col-sm-4">
                                    <?php
                                    echo CHtml::button("Usuń", 
                                                      array('submit' => array("katalog/delete","id"=>$model->IDkatalogu),
                                                      'confirm'=>'Jesteś pewny, że chcesz usunąć katalog z wszystkimi plikami?',
                                                      'class'=>'btn btn-danger btn-block',
                                                      'encode' => false,
                                                       ));  
                  ?> 
                  </div>
                  
                </div>
                <?php if($model->widok_IDwidoku=='2'){ ?>
                <div class="col-xs-12 col-sm-12">
                <h5>Link za pomocą którego osoby moga przeglądać ten katalog:<br/> <small><a href="<?php echo 'http://s30791.dev.pwste.edu.pl/praca/udostepnione/'.$model->unikalna; ?>"><?php echo 'http://s30791.dev.pwste.edu.pl/praca/udostepnione/'.$model->unikalna; ?></a></small></h5>
                </div>
                <?php
                }

          }
          } ?>

</div>
</div>




         


<div class="row">
<br/><br/>
<?php 
$licznik=0;
foreach ($model->pliks as $cosik)
{


                          

?>


        
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
 <div class="text-center"><?php if(strlen($cosik['nazwa'])>=30){ echo substr(CHtml::encode($cosik['nazwa']),0,30).'.'.CHtml::encode($cosik['typ']);} else echo CHtml::encode($cosik['nazwa']); ?></div>

    <?php $finfo = new finfo(FILEINFO_MIME_TYPE); $mime = $finfo->file(Yii::app()->basePath."../../..".$cosik['adres']);if (preg_match('/^image\/.+/i', $mime)) { ?>
     
    <div class="hovereffect thumbnail">
        
                  
                      <img class="img-responsive" src="<?php echo CHtml::encode($cosik['adres']); ?>" style="min-width:100%; min-height:175px; max-height:175px;" alt="">


                      <div id="Lightbox<?php echo $licznik;?>" class=lightbox fade  tabindex='-1' role='dialog' aria-hidden='true'>
                          <div class='lightbox-dialog'>
                                <div class='lightbox-content'>
                                    
                                    <img src=<?php echo $cosik['adres'];?>>
                                         
                                  
                                        <div class='lightbox-caption'><p><?php echo $cosik['nazwa'];?></p> </div>
                                </div>
                          </div>
                      </div>   
        
            
            
            
            <div class="overlay">
                <h2><a data-toggle=lightbox href="#Lightbox<?php echo $licznik;?>"> <span class="glyphicon glyphicon-plus"></span></a> </h2>
                
                
                <?php } else { ?>
                
                <div class="hovereffect thumbnail">
        
                  
                      <img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=80&txt=<?php echo $cosik['typ'];?>&w=700&h=400" style="min-width:100%; min-height:175px; max-height:175px;" alt="">


                 <div class="overlay">
                 
                <h2><a href='<?php echo $cosik['adres'];?>' download> <span class="glyphicon glyphicon-plus"></span></a> </h2>
                
                <?php
                }
                ?>
				<p> 
					<?php 
					
					   if(isset(Yii::app()->user->roles)&&isset(Yii::app()->user->id)){
                    if(((Yii::app()->user->roles)==='admin')||(Yii::app()->user->id) === ($model->uzytkownikIDuzytkownika['IDuzytkownika'])){
					  
					  if (preg_match('/^image\/.+/i', $mime)) {   
				                                            echo CHtml::htmlbutton('<i class="glyphicon glyphicon-picture"></i>', 
                                                            array('submit' => array('katalog/ustaw','id'=>CHtml::encode($model->IDkatalogu),'obraz'=>CHtml::encode($cosik['IDpliku'])),
                                                                        'confirm'=>'Jesteś pewny, że chcesz ustawić obrazek jako ikonę katalogu?',
                                                                        'class'=>'btn btn-warning',
                                                                        ));         
                                                                      }  
                                          
                                                        
					  if (preg_match('/^image\/.+/i', $mime)) {   
				                                            echo CHtml::htmlbutton('<i class="glyphicon glyphicon-user"></i>', 
                                                            array('submit' => array('katalog/awatar','id'=>CHtml::encode($model->IDkatalogu),'obraz'=>CHtml::encode($cosik['IDpliku'])),
                                                                        'confirm'=>'Jesteś pewny, że chcesz ustawić obrazek jako swój awatar?',
                                                                        'class'=>'btn btn-warning',
                                                                        ));         
                                                                      }  
                                                                      
                                                    echo CHtml::htmlbutton('<i class="glyphicon glyphicon-edit"></i>', 
                                                    array('submit' => array("plik/update","id"=>$cosik['IDpliku']),
                                                      'confirm'=>'Jesteś pewny, że chcesz aktualizowac?',
                                                      'class'=>'btn btn-primary',
                                                       ));                
                                                                      
                                                     echo CHtml::htmlbutton('<i class="glyphicon glyphicon-minus"></i>', 
                                                     array('submit' => array("plik/delete","id"=>$cosik['IDpliku']),
                                                      'confirm'=>'Jesteś pewny, że chcesz usunąć plik?',
                                                      'class'=>'btn btn-danger',
                                                       ));                                                                          
                                                       
                                                       
                     }}       
                                                                        
        ?> 


				</p> 
            </div>
            
    </div>
    
   
</div>


<?php 
$licznik++;
} ?>
</div>
        <br/ > <br />



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Dodaj pliki</h4>
      </div>
      <div class="modal-body">
        <div class="titi2" >
        
         <form action="/praca/plik/plikCreateAjax/<?php echo $model->IDkatalogu;?>" method="post" enctype="multipart/form-data">
           
          
           
          <input type="file" name="myfile[]" multiple="multiple"  class="multi"  maxlength="<?php echo Yii::app()->params['maxFile']; ?>"  data-maxsize="<?php echo Yii::app()->params['maxPostsize']; ?>"  data-maxfile="<?php echo Yii::app()->params['maxFileupload']; ?>" 
           accept="<?php
            
            $n = count(Yii::app()->params['fileFormat']);
            for ($i=0;$i<$n; $i++)
            echo Yii::app()->params['fileFormat'][$i].'|';
            
          ?>"/>
            
            Za jednym razem możesz wysłać <b> <?php echo Yii::app()->params['maxFile']; ?> plików </b> o maksymalnej wadze <b><?php echo Yii::app()->params['maxPostsize']; ?> KB</b>,<br/> 
            pojedyńczy plik może ważyć maksymalnie <b><?php echo Yii::app()->params['maxFileupload']; ?> KB</b>.<br />
            Dozwolone rozszerzenia plików: <b>
            <?php
            
            $n = count(Yii::app()->params['fileFormat']);
            for ($i=0;$i<$n; $i++)
            echo Yii::app()->params['fileFormat'][$i].', ';
            
          ?>
            </b>
            
            
            <br>
        
        
          </div>
     
          
     <div class="progress titi" >
        <div class="bar titi"></div >
        <div class="percent titi">0%</div >
    </div>
    
      <div class="titi text-center">
      <h3> Zostaniesz automatycznie przeniesiony. 
      <small><br /> Przeładowanie strony zakończy przesyłanie plików.<br />
      Możesz ukryć okno modalne, bez przeładowania strony aby dokończyć przesyłanie plików.</h3>
      </div>
    

    
      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary titi2" data-dismiss="modal">Anuluj</button>
        	<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'warning',
				'label' => 'Dodaj',
				'htmlOptions' => array(
					'class' => 'btn titi2'),
				
			)
		); ?>
				</form>
		

      </div>
    </div>
  </div>
</div>


<script src="http://malsup.github.com/jquery.form.js"></script>

<script>
(function() {
$(".titi").hide();
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
  
$('form').ajaxForm({
        
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
        

    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);

        $(".titi").show();
        $(".titi2").hide();
		//console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
        
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
		location.reload(); 
	}
}); 

})();       
</script>
       
