<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;


?>

       <div class="col-xs-12 col-sm-12">
      

          
             <div>
             <h1>Najnowsze pliki</h1>
             </div>
             
          <div class="row">
             <?php
             
              foreach ($pliki as $value)
              
              {

             ?>   
            <div class="col-sm-6 col-md-3">
              <div class="thumbnail">
                <img src="<?php echo $value['adres'];?>" alt="111">
                  <div class="caption">
                    <h3><?php echo $value['data'];?></h3>
                    <p><?php echo $value['data'];?></p>
                    <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <a href="#" class="btn btn-warning btn-block" role="button">Zobacz</a> 
                     </div>
                     
                     </div>
                  </div>
              </div>
            </div>
            
            <?php } ?>
                    
          </div>
       </div>

       

      <div class="col-xs-12 col-sm-12">
      
             <div>
             <h1>Najnowszy katalog</h1>
             </div>
             
          <div class="row">
          <?php
              foreach ($katalog as $value)
              {
             ?>     
             
            <div class="col-sm-12 col-md-12">
              <div class="thumbnail">
                <img src="https://placeholdit.imgix.net/~text?txtsize=158&txt=Slide+One&w=1900&h=1080" alt="111">
                  <div class="caption">
                    <h3><?php echo $value['nazwa'];?></h3>
                    <p><?php echo $value['opis'];?></p>
                    <div class="row">
                    <div class="col-sm-12 col-md-12">
                     <a href="/praca/katalog/<?php echo $value['IDkatalogu'];?>" class="btn btn-warning btn-block" role="button">Zobacz katalog</a> 
                     </div>
                    </div>
                  </div>
              </div>
            </div>
            <?php } ?>
            
            
          </div>
       </div>
       
       
       
       
       

        <div class="col-xs-12 col-sm-12">
      
             <div>
             
             <h1>Ostatnio zarejestrowani</h1>
             </div>
             
          <div class="row">
             
             <?php
              foreach ($uzytkownicy as $value)
              {
             ?>     
             <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img src="https://placeholdit.imgix.net/~text?txtsize=158&txt=Slide+One&w=1900&h=1080" class="img-circle" alt="111">
                  <div class="caption">
                    <h3><small>Login: </small><?php echo $value['login'];?></h3>
                    <p>Zarejestrowany: <small><?php echo $value['zarejestrowany'];?></small></p>
                    <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <a href="/praca/uzytkownik/<?php echo $value['IDuzytkownika'];?>" class="btn btn-warning btn-block" role="button">Zobacz profil</a> 
                     </div>
                     </div>
                  </div>
              </div>
            </div>
            
            <?php } ?>
            
                              
          </div>
       </div>

       
       
        
       
        
    
