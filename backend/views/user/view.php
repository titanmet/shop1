<?php
use shop\helpers\UserHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                        'id',
                        'username',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'value' => UserHelper::statusLabel($model->status),
                        'format' => 'raw',
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                   ],
             ]) ?>
              </div>
        </div>

</div>