<?php
	use app\models\TipoMetales;
	use app\models\EstadoMaterial;
	use yii\helpers\Url;
	use yii\web\View;
	use yii\helpers\Html;
	use yii\grid\GridView;
	use yii\widgets\Pjax;
?>
<div class="panel-group">
  <div id="panel1" class="panel panel-primary">
    <div class="panel-heading">Filtro de metales</div>
	<div class="panel-body">
	<form method="POST" action="<?php echo Url::toRoute(['caracteristica-marca/busqueda-clasificacion-materiales']);?>" >
		<?php 

			foreach (TipoMetales::find()->all() as $tipo) {
				echo '  <div class="checkbox">
						    <label>
						      <input type="checkbox" class="tipo_metal" id_tipo="'.$tipo->id.'" name="TipoMetales['.$tipo->id.']"> <b>'.$tipo->tipo_metal.'</b>
						    </label>
						 </div>';
						 foreach ($tipo->getSubtipoMetales()->all() as $subtipo) {
						 //	if(is_object($subtipo)){
						 		echo '  <div class="checkbox content_subtipo_metal">
									    <label>
									      <input type="checkbox" class="subtipo_metal tipo'.$tipo->id.'" value="'.$subtipo->id.'" name="TipoMetales['.$tipo->id.'][subtipo][]"> '.$subtipo->subtipo_metal.'
									    </label>
									 </div>';
//							}
						 }
			}

		?>
	</form>
	</div>
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button type="button" class="btn btn-primary" id="btn-filtro1" value="">Filtrar</button>
		</div>
	</div>
  </div>


    <div id="panel2" style="display:none" class="panel panel-primary">
	    <div class="panel-heading">Propiedades del metal</div>
		<div class="panel-body">
				<form class="form-inline">
				 <div id="tratamientoTermico" style="" class="panel panel-danger">
	    			<div class="panel-heading">
	    				<div class="checkbox content_subtipo_metal" style="margin: 0px;">
						    <label><input type="checkbox" class="" name="TratamientoTermico" id="TratamientoTermico"/><b>Tratamiento termico</b></label>
						 </div>
	    			</div>
	    			<div class="panel-body">

	    			</div>
				 </div>

				 <div id="composicionQuimica" style="" class="panel panel-danger">
	    			<div class="panel-heading">
	    				<div class="checkbox content_subtipo_metal" style="margin: 0px;">
						    <label>
						      <input type="checkbox" class="" name="ComposicionQuimica" id="ComposicionQuimica"> <b>Composicion quimica</b>
						    </label>
						 </div>
	    			</div>
	    			<div class="panel-body">

	    			</div>
				 </div>

				 <?php 

				 	foreach (EstadoMaterial::find()
						->where(['not in','id', array(3)])
				 		->all() as $estado) {
				 		?>
				 			<div id="esadomaterial_<?php echo $estado->id; ?>" style="" class="panel panel-danger">
				 				<div class="panel-heading">
				    				<div class="checkbox content_subtipo_metal" style="margin: 0px;">
									    <label>
									      <input type="checkbox" class="chkestadoMaterial" name="EstadoMaterial[id][]" value="<?php echo $estado->id; ?>"> <b><?php echo $estado->tipo_caracteristica; ?></b>
									    </label>
									 </div>
				    			</div>
				 			</div>
				 		<?php
				 	}

				 ?>


				</form> 
		</div>
		<div class="panel-footer clearfix">
			<div class="pull-right">
				<button type="button" class="btn btn-primary" id="btn-filtro2" value="">Generar</button>
			</div>
		</div>
	</div>	


	<div id="panel3" style="display:none" class="panel panel-primary">
	    <div class="panel-heading">Propiedades del metal</div>
		<div style="overflow-x: scroll;" class="panel-body">

				  <?php Pjax::begin([
				  		'id' => 'some-id-you-like',
				  		'timeout' => false, 
            			'enablePushState' => false,
				  		'clientOptions' => ['method' => 'GET']
				  ]); ?>   
				 <?= GridView::widget([
			        'dataProvider' => $dataProvider,
			        'filterModel' => $searchModel,
				 		 'id' => 'propiedadesMetales',
			        
			        'columns' => [
			            ['class' => 'yii\grid\SerialColumn'],

			            'id',
			             [
			                'label' => 'Documento(s)',
			                'format' => 'raw',
			                 'value' => function ($data) {
			                 	$html = "<ul>";
			                 	foreach ($data->idMarca->getMarcasGestionDocumentals()->all() as $documento) {
			                 	 	$html .= "<li><a  data-method='post' href='".Url::toRoute(['caracteristica-marca/descargar-documento','doc' => $documento->id ])."' target='_blank'>".$documento->nombre_archivo."</a></li>";
			                 	 } 
			                 	$html .= "<ul>";
			                    return $html;
			                },
			            ],

			            [
			                'label' => 'Tipo',
			                'filter' => yii\helpers\ArrayHelper::map(\app\models\TipoMetales::find()->orderBy('tipo_metal')->asArray()->all(), 'id', 'tipo_metal'),
			                 'value' => function ($data) {
			                    return $data->idMarca->idSubtipoMetal->idTipoMetal->tipo_metal; // $data['name'] for array data, e.g. using SqlDataProvider.
			                },
			            ],
			            [
			                'label' => 'Subtipo',
			                'filter' => yii\helpers\ArrayHelper::map(\app\models\SubtipoMetales::find()->orderBy('subtipo_metal')->asArray()->all(), 'id', 'subtipo_metal'),
			                 'value' => function ($data) {
			                    return $data->idMarca->idSubtipoMetal->subtipo_metal; // $data['name'] for array data, e.g. using SqlDataProvider.
			                },
			            ],
			            [
			                'attribute' => 'id_marca', 
			                'filter' => yii\helpers\ArrayHelper::map(\app\models\MarcasAcerosFundiciones::find()->orderBy('marcas_aceros_fundiciones')->asArray()->all(), 'id', 'marcas_aceros_fundiciones'),
			                 'value' => function ($data) {
			                    return $data->idMarca->marcas_aceros_fundiciones; 
			                },
			            ],
			            [
			                'attribute' => 'id_campo', 
			                'filter' => yii\helpers\ArrayHelper::map(\app\models\CampoCaracteristica::find()->orderBy('nombre_campo')->asArray()->all(), 'id', 'nombre_campo'),
			                 'value' => function ($data) {
			                    return is_object($data->idCampo)?$data->idCampo->nombre_campo:''; // $data['name'] for array data, e.g. using SqlDataProvider.
			                },
			            ],
			            [
			                'attribute' => 'id_estado_material', 
			                'filter' => yii\helpers\ArrayHelper::map(\app\models\EstadoMaterial::find()->orderBy('tipo_caracteristica')->asArray()->all(), 'id', 'tipo_caracteristica'),
			                 'value' => function ($data) {
			                    return is_object($data->idEstadoMaterial)?$data->idEstadoMaterial->tipo_caracteristica:''; // $data['name'] for array data, e.g. using SqlDataProvider.
			                },
			            ],
			            'valor1',
			             'valor2',

			            ['class' => 'yii\grid\ActionColumn'],
			        ],
			    ]); 
				 
			    ?> <?php Pjax::end(); ?>


				</div>

				<div class="panel-footer clearfix">
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo Url::toRoute(['caracteristica-marca/clasificacion-materiales']);?>">Nuevo</a>
					</div>
				</div>

		</div>
	</div>

</div>

<style type="text/css">
	.content_subtipo_metal{
		margin-left: 30px;
	}
</style>

<?php
	$this->registerJs('
	$(document).on("ready",function(){

		var bandera = true;
		$(".tipo_metal").change(function(){
			id_tipo = $(this).attr("id_tipo");
			if($(this).is(":checked")) {
				$(".tipo"+id_tipo).prop("checked", true);
			}else{
				$(".tipo"+id_tipo).prop("checked", false);
			}
		});

		$("#btn-filtro2").click(function(e){
			if($("#TratamientoTermico").is(\':checked\')){
				$(".tratamientoTermicoMin").each(function(i,e){ 
					min = $(e); 
					max = $(this).parent().parent().find("[max=\'"+$(e).attr("min")+"\']" );

					if(min.val().length != 0 || max.val().length != 0){
						$("#propiedadesMetales .filters").append(min.clone());
						$("#propiedadesMetales .filters").append(max.clone()); 
					}
				});
			}

			if($("#ComposicionQuimica").is(\':checked\')){
				$(".chkComposicionQuimica").each(function(i,elemento){
					if($(elemento).is(":checked")){
						min = $(elemento).parent().parent().parent().parent().find(".min");
						max = $(elemento).parent().parent().parent().parent().find(".max");

						if(min.val().length != 0 || max.val().length != 0){
							$("#propiedadesMetales .filters").append(min.clone());
							$("#propiedadesMetales .filters").append(max.clone()); 
						}
					}
				});
			}

			$(".chkestadoMaterial").each(function(i,elemento){ 
				if( $(elemento).is(":checked") ){
					$("#propiedadesMetales .filters").append($(elemento).clone());
				}
			});

			setTimeout(function(){ 
				if(bandera){
					jQuery(\'#propiedadesMetales\').yiiGridView(\'applyFilter\');
					$("#panel2").animate({width:"toggle"},350,function(){
				    	$("#panel3").animate({ width: "toggle" }); 
					});
				}	
				bandera = false;

			}, 500);

		});
		
		$("#btn-filtro1").click(function(e){
		    
			$.post("'.Url::toRoute(['caracteristica-marca/busqueda-clasificacion-materiales']).'",$("#panel1 form").serialize(),function(data){
				$("#tratamientoTermico .panel-body").html("");
				$.each(data.campoCaracteristicas,function(i,elemento){
					$("#tratamientoTermico .panel-body").append(\'<div class="row"><div class="col-xs-5"><div class="checkbox content_subtipo_metal"><label>\'+elemento+\'</label></div></div>  <div class="col-xs-3"> <input type="text" max="\'+i+\'" name="TratamientoTermico[\'+i+\'][max]" placeholder="Máximo" class="form-control"/> </div> <div class="col-xs-3"><input class="form-control tratamientoTermicoMin" type="text" min="\'+i+\'" name="TratamientoTermico[\'+i+\'][min]" placeholder="Minimo"/>  </div>  </div>\');
				});	

				$(\'.subtipo_metal:checked\').each(function(i,e){
					$("#propiedadesMetales .filters").append($(e).clone());
				});

				$("#composicionQuimica .panel-body").html("");
				$.each(data.camposComposicionQuimica,function(i,elemento){
					$("#composicionQuimica .panel-body").append(\'<div class="row"><div class="col-xs-5"><div class="checkbox content_subtipo_metal"><label><input type="checkbox" class="chkComposicionQuimica" name="ComposicionQuimica[id_campo_composicion] value=\'+i+\'"> \'+elemento+\'</label></div></div>  <div class="col-xs-3"> <input type="text" max="\'+i+\'" class="max form-control" name="ComposicionQuimica[\'+i+\'][max]" placeholder="Máximo" class="tratamiento_simple form-control"/> </div> <div class="col-xs-3"><input class="form-control min" type="text" min="\'+i+\'" class="tratamientoTermico" name="ComposicionQuimica[\'+i+\'][min]" placeholder="Minimo"/>  </div>  </div>\');
				});	

			    $("#panel1").animate({width:"toggle"},350,function(){
			    	$("#panel2").animate({ width: "toggle" }); 
			    });
		 	},"json");	
		    e.preventDefault();
		});

		$(".subtipo_metal").change(function(){
			if($(this).is(":checked")) {
			//	$("#propiedadesMetales .filters").append($(this).clone());
			}else{
			}
		});

		$("#propiedadesMetales").on("beforeFilter", function(event) { 
			return true;

		 });

		 $(document).on(\'pjax:send\', function() {
		  		$("#btn-filtro2").trigger("click");
		});

	});',  View::POS_READY);
?>
