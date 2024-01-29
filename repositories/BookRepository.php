<?php

namespace app\repositories;

use app\models\Book;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class BookRepository
{
    public function getAllQuery(): ActiveQuery
    {
        return Book::find();
    }

    public function getAll(): array|ActiveRecord
    {
        return $this->getAllQuery()->all();
    }

    public function findById(int $id): Book
    {
        $bookModel = Book::findOne($id);
        if ($bookModel === null) {
            throw new NotFoundHttpException();
        }

        return $bookModel;
    }

    public function deleteById(int $id): bool
    {
        return (bool)$this->findById($id)->delete();
    }

    public function save(array $data, int|null $id = null): int|bool
    {
        $bookModel = $id ? $this->findById($id) : new Book();
        if ($bookModel->load($data) && $bookModel->validate() && $bookModel->save()) {
            return $bookModel->id;
        }

        return false;
    }
}
