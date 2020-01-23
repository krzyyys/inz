<!DOCTYPE html>
<html lang="pl" class="full">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta name="description" content="Praca Inżynierska PWSTE Jarosław Krzysztof Barszcz">
    <meta name="author" content="Projekt!">

  <link rel=icon href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-lightbox.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-lightbox-min.css" rel="stylesheet">
  </head>

  <body>


<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/praca/"> <span class="glyphicon glyphicon-hdd text-zolty" aria-hidden="true"></span> Archiwum</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
						<li>
							<a href="/praca/katalog/"><span class="glyphicon glyphicon-folder-open text-zolty" aria-hidden="true"></span> Katalogi</a>
						</li>
					
						</ul>



					<ul class="nav navbar-nav navbar-right">
					
					<?php if(Yii::app()->user->isGuest){
					
					echo '
					
					   <li>
               <p class="navbar-btn">
                    <a href="'.Yii::app()->request->baseUrl.'/signup" class="btn btn-warning btn-block">ZAREJESTRUJ</a>
               </p>
             </li>
						
					   <li>
               
                    <a href="'.Yii::app()->request->baseUrl.'/login"><span class="glyphicon glyphicon-log-in text-zolty" aria-hidden="true"></span> Zaloguj</a>
               
             </li>


						';}
						else 						{
						echo '
						
						
						 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user text-zolty" aria-hidden="true"></span> '.Yii::app()->user->name.' <span class="caret text-zolty"></span></a>
          <ul class="dropdown-menu">


            <li><a href="/praca/uzytkownik/'.Yii::app()->user->id.'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Profil</a></li>
            
            ';
            
            if(Yii::app()->user->roles==='admin'){
            echo '
             <li><a href="/praca/admin"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Panel Administracyjny</a></li>
             ';
             }
             echo'
            
            
            <li role="separator" class="divider"></li>
            <li><a href="'.Yii::app()->request->baseUrl.'/logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Wyloguj</a></li>

          </ul>
        </li>	';
						}?>	
										
					</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
       




    <div class="container">
    	<?php echo $content; ?>
    </div>
    	
  

    
    <footer class="footer">
      <div class="container">
        <p class="text-muted text-center">Krzysztof Barszcz &copy; 2017</p>
      </div>
    </footer>
    
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/js/bootstrap-lightbox.min.js"></script>
<script src='<?php echo Yii::app()->request->baseUrl; ?>/css/js/jquery.form.js' type="text/javascript" language="javascript"></script>
<script src='<?php echo Yii::app()->request->baseUrl; ?>/css/js/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<script src='<?php echo Yii::app()->request->baseUrl; ?>/css/js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>

   </body>
</html>








