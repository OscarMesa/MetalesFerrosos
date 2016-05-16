<?php

use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'Metales Ferrosos';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>

        <img src=""/> 

        <?php 
       



            echo Carousel::widget([
            'items' => [
                // the item contains only the image
                '<img src="http://ferroindustrial.co/wp-content/uploads/2012/02/Untitled-12.png"/>',
                // equivalent to the above
                ['content' => '<img src="http://www.metalesyperfiles.com/wp-content/uploads/2014/07/barra.jpg"/>'],
                // the item contains both the image and the caption
                [
                    'content' => '<img src="http://www.metalesyperfiles.com/wp-content/uploads/2014/07/cobre4.jpg"/>',
                    'caption' => '<h4>Metales</h4><p>Estos son los metales</p>',
                 //   'options' => [...],
                ],
            ]
        ]);
            ?>   
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>INTRODUCCIÓN</h2>

                <p>La historia de las personas es también la historia del uso que damos a los objetos que hay a  nuestro alrededor y la forma en que tratamos nuestro entorno.
                    Los materiales que forman nuestros objetos cotidianos son variados, pero comparten la característica de ser la mejor manera de componer un instrumento o herramienta que va a hacernos la vida más sencilla. Como es lógico, según se fueron descubriendo nuevos materiales o usos distintos de materiales ya conocidos, fueron cambiando la composición y modo de fabricación de esos instrumentos.
                    Es necesario conocer los materiales que componen los objetos cotidianos para poder apreciar la utilidad de esos objetos, así como afrontar su reutilización y reciclado, una vez terminada su vida útil.
</p>

                <p></p>
            </div>
                     
        </div>

    </div>
</div>
