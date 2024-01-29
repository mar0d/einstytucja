<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $book app\models\Book */

$this->title = 'Podgląd książki "' . $book->title . '"';
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <strong><?= $book->getAttributeLabel('author') ?>:</strong>
        <?= Html::encode($book->author) ?>
    </p>
    <p>
        <strong><?= $book->getAttributeLabel('country') ?>:</strong>
        <?= Html::encode($book->country) ?>
    </p>
    <p>
        <strong><?= $book->getAttributeLabel('imageLink') ?>:</strong>
        <?= Html::encode($book->imageLink) ?>
    </p>
    <p>
        <strong><?= $book->getAttributeLabel('link') ?>:</strong>
        <?= Html::encode($book->link) ?>
    </p>
    <p>
        <strong><?= $book->getAttributeLabel('pages') ?>:</strong>
        <?= Html::encode($book->pages) ?>
    </p>
    <p>
        <strong><?= $book->getAttributeLabel('year') ?>:</strong>
        <?= Html::encode($book->year) ?>
    </p>
    <p><?= Html::a('Wróć', ['/'], ['class' => 'btn btn-secondary']) ?></p>