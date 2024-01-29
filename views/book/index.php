<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider ActiveDataProvider */
?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'title',
        'author',
        'country',
        'imageLink',
        'link',
        'pages',
        'year',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ],
]);
?>

<p><?= Html::a('Eksport do JSON', ['books/json'], ['class' => 'btn btn-secondary']) ?></p>