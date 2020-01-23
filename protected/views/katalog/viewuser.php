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
  height: 65%;
  left: 10%;
  top: 2%;
  border-bottom: 0px solid #FFF;
  border-top: 0px solid #FFF;
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





.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 40px;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
  background-color: transparent;
  color: #FFF;
  padding: 1em 0;
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
     ?>

</div>
</div>




         


<div class="row">
<br/><br/>
<?php 
$licznik=0;
foreach ($model->pliks as $cosik)
{
//wyswietlenie jezeli plik jest 1=publiczny lub plik(widok)=upubliczniony za linkiem i katalog jest upubliczniony
if($cosik->widok_IDwidoku==='1'||($cosik->widok_IDwidoku==='2'&&$model->widok_IDwidoku==='2')){
                          

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



				</p> 
            </div>
            
    </div>
    
   
</div>


<?php 
}
$licznik++;
} 
?>
</div>
        <br /> <br />


       
