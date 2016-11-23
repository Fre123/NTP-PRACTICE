<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
    Create Post
    </button>

    <!-- Modal -->
    <div class="modal modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"> <strong>Politics about the Post</strong> </h4>
          </div>
          <div class="modal-body">
        <h>
          Estimado usuario su post creado será revisado por el administrador para su posterior aprobación, gracias por su comprensión.
        </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <?= Html::a('Next', ['create'], ['class' => 'btn btn-success']) ?>
          </div>

        </div>
      </div>
    </div>

</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Titulo',
            //'Texto:ntext',
            //'Publicar',
            'Fecha_creacion',
            // 'Fecha_edicion',
            // 'idAutor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
