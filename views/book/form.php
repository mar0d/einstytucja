<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $book app\models\Book */

$this->title = $book->id === null
    ? 'Dodaj książkę' : 'Edycja książki "' . $book->title . '"';
?>
    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => 'invalid-feedback',
            'hint' => '',
        ],
    ],
]); ?>
<?= $form->errorSummary($book) ?>
<?= $form->field($book, 'author') ?>
<?= $form->field($book, 'country') ?>
<?= $form->field($book, 'imageLink') ?>
<?= $form->field($book, 'link') ?>
<?= $form->field($book, 'pages') ?>
<?= $form->field($book, 'title') ?>
<?= $form->field($book, 'year') ?>
<?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary']) ?>
&nbsp;
<?= Html::a('Anuluj', ['/'], ['class' => 'btn btn-secondary']) ?>
<?php ActiveForm::end(); ?>