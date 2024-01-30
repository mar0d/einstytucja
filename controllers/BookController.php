<?php

namespace app\controllers;

use app\models\Book;
use app\repositories\BookRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class BookController extends Controller
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider(
            [
                'query' => (new BookRepository())->getAllQuery(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView(int $id): string
    {
        return $this->render(
            'view',
            ['book' => (new BookRepository())->findById($id)]
        );
    }

    public function actionCreate(): string|Response
    {
        $bookId = (new BookRepository())->save(Yii::$app->request->post());
        if ($bookId) {
            Yii::$app->session->setFlash('success', 'Dodano książkę');

            return $this->redirect(['view', 'id' => $bookId]);
        }

        return $this->render('form', ['book' => new Book()]);
    }

    public function actionUpdate(int $id): string|Response
    {
        $bookRepository = new BookRepository();
        if ($bookRepository->save(Yii::$app->request->post(), $id)) {
            Yii::$app->session->setFlash('success', 'Edytowano książkę');

            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('form', ['book' => $bookRepository->findById($id)]);
    }

    public function actionDelete(int $id): Response
    {
        if ((new BookRepository())->deleteById($id)) {
            Yii::$app->session->setFlash('success', 'Usunięto książkę');
        }

        return $this->redirect(['index']);
    }

    public function actionExportToJson(): Response
    {
        $books = (new BookRepository())->getAll();
        if (empty($books)) {
            Yii::$app->session->setFlash(
                'info',
                'Brak książek - nie eksportowano danych do JSON'
            );

            return $this->redirect(['index']);
        }

        $tempFilePath = tempnam(sys_get_temp_dir(), 'tmp_file');
        file_put_contents($tempFilePath, Json::encode($books));

        return Yii::$app->response->sendFile($tempFilePath, 'books.json');
    }
}
