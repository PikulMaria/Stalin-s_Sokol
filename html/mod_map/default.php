<?php
/**
 * API Яндекс карт
2018
 */
defined('_JEXEC') or die;
$list = json_decode($list_templates);
//print_r($list_templates_json_decode);

$template = $list->template;
$description = $list->description;
$point = $list->point;

//include ('/class.jbdump.php'); // подключение jbdump
//jbdump($list); // отладка

if(!$list) {
    $template = [ '0' =>'55.75399400, 37.62209300'];
    $description = [ '0' =>'Москва'];
    $point = null;
}
$count = count($template); // сколько точек ?
$doc = JFactory::getDocument();
$doc->addScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU");
$rand = rand(1,1000);
?>
<div class="yandex_map" id="yandex_map<?php echo $rand;?>">
    <script type="text/javascript">
        var myMap;
        // Дождёмся загрузки API и готовности DOM.
        ymaps.ready(init);

        function init () {
            var myMap = new ymaps.Map("map2<?php echo $rand;?>", {
                center: [<?php echo $centermap;?>],
                zoom: <?php echo $scope;?>,
                controls: [
                    <?php
                    echo $scrope_bool == 1 ? "'zoomControl'," : "";
                    echo $bottom_bool == 1 ? "'searchControl'," : "";
                    echo $typemap_bool == 1 ? "'typeSelector'," : "";
                    echo $scrope_bool == 1 ? "'zoomControl'," : "";
                    echo "'fullscreenControl'";
                    ?>
                ]
                //,type: "yandex#satellite" // загрузка спутник
            });
            <?php
            //for($i=0;$i<$count;$i++)
            foreach ($template as $i=>$temp)    {
            ?>
            // Создаем геообъект с типом геометрии "Точка".
            myPlacemark<?php echo $i?> = new ymaps.Placemark([<?php echo $temp;?>], {
                // Свойства.
                balloonContent: '<?php
                    $description_ = explode("\n", $description[$i]);
                    foreach ($description_ as $desc) {
                        echo $desc; // "распарим" строку для корректного отображения тэгов HTML
                    }
                    ?>'
            }, {
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                //
                <?php
                if ($point[$i]) {
                    $img = JFactory:: getURI()->base() . 'images/' . $point[$i];
                } else {
                    $img = JFactory:: getURI()->base() . $iconmap;
                }  ?>
                iconImageHref: '<?php echo $img;?>',
                // Размеры метки
                iconImageSize: [<?php echo $icon_wi;?>, <?php echo $icon_he;?>],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [<?php echo $zn1;?>, <?php echo $zn2;?>]
            });

            <?php
            } // конец foreach

            if($trafficControl == 1) {?>
            // Создадим элемент управления "Пробки".
            var trafficControl = new ymaps.control.TrafficControl({
                state: {
                    // Отображаются пробки "Сейчас".
                    providerKey: 'traffic#actual',
                    // Начинаем сразу показывать пробки на карте.
                    trafficShown: true
                }
            });
            // Добавим контрол на карту.
            myMap.controls.add(trafficControl);
            // Получим ссылку на провайдер пробок "Сейчас" и включим показ инфоточек.
            trafficControl.getProvider('traffic#actual').state.set('infoLayerShown', true);
            // Добавляем все метки на карту.
            <?php  } ?>
            <?php if($scaling==1) { ?>myMap.behaviors.disable('scrollZoom'); <?php } ?>
            myMap.geoObjects
            <?php
            for ($i = 0; $i < $count; $i++) {
                echo ' .add(myPlacemark' . $i . ') ';
            }
            ?>
        }
    </script>
    <div class="spb-webmaster" id="map2<?php echo $rand;?>" style="<?php
    $wi = trim($wi);
    $mystring = $wi;
    $findme   = '%';
    $findme2   = 'px';
    $pos_proc = strpos($mystring, $findme);
    $pos_px = strpos($mystring, $findme2);
    // Заметьте, что используется ===.  Использование == не даст верного результата
    if (($pos_proc === false) and ($pos_px === false)) { echo ' width:'.$wi.'px; ';} else { echo ' width:'.$wi.'; ';}
    $he = trim($he);
    $mystring = $he;
    $findme   = '%';
    $findme2   = 'px';
    $pos_proc = strpos($mystring, $findme);
    $pos_px = strpos($mystring, $findme2);
    // Заметьте, что используется ===.  Использование == не даст верного результата
    if (($pos_proc === false) and ($pos_px === false)) { echo ' height:'.$he.'px; ';} else { echo ' height:'.$he.'; ';} ?>"></div>
</div>
<div class="clear" style="clear:both"></div>
