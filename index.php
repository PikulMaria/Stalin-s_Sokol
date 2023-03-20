<?php 
defined("_JEXEC") or die();/* Предотвращает прямой доступ к файлу index.php */
$doc=JFactory::getDocument();/*Создали объект*/
$doc->addStyleSheet(JUri::base(TRUE)."/templates/".$doc->template."/ssstyless.css");/*Путь к стилям*/
?>

<!DOCTYPE html>
    <html>
     <head>
     <jdoc:include type="head"/>
     </head>
	 
     <body>
  <div id="container">
  
  
    <div class="head"> 
	
<img class="fon_picture" src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/fon3.jpg " width= "1500"  height="600"/>

<img class="fon_picture" src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/fon1.jpg " width= "1500"  height="600"/>

<img class="fon_picture" src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/fon2.jpg " width= "1500"  height="600"/>
	</div>
	
	<div class="logo">
	<a href="<?php echo JUri::base(TRUE);?>"><img  src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/u182-4.png" /></a>
	</div>
	
	<div class="glavmenu">
	<jdoc:include type="modules" name="position-0"/> 
	   </div>
	<div class="content" width= "1500">
      <jdoc:include type="component" />
	  
    </div>
	<div class="map">
	<br>
	 <jdoc:include type="modules" name="position-1"/>
	 <br>
	<!-- <jdoc:include type="modules" name="position-2"/>-->
	 <a class="contact">
	&emsp;&emsp;&emsp;&emsp; Музей города Прокопьевск<br>
     &emsp;&emsp;&emsp;&emsp;653050,Россия, Кемеровская область,<br>
    &emsp;&emsp;&emsp;&emsp; г. Прокопьевск, пр. Шахтеров, 63<br>
     &emsp;&emsp;&emsp;&emsp;E-mail: prokopmuseum@yandex.ru<br>
     &emsp;&emsp;&emsp;&emsp;тел. : 8(3846)61-03-93 <br>
	 <br>
	 </a>
	 </div>
    <div class="footer" >
	<a href="http://www.prk-museum.ru/" class="logo_futter"><img src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/LOGOTIP.png "width= "50"  height="50"></a>
	<a href="https://vk.com/id315682596" class="VK_futter"><img src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/VK .png "width= "50"  height="50"></a>
	<a href="https://www.instagram.com/museumprk/?utm_source=ig_profile_share&igshid=n033u5w6z3i8" class="instagram_futter"><img src="<?php echo JUri::base(TRUE)."/templates/".$doc->template;?>/images/INST.png "width= "80"  height="80"></a>
	<h1 class="test2">
	
	<br>
	
	  <br>
     <br>
      <br>
      <br>
     </h1>
   <h1 class="test1" >   Все права защищены © 2020 МБУК "Краеведческий Музей" г. Прокопьевск  </h1>
   <br>
    </div>
	
  </div>
</body>
</html>
	
	
	