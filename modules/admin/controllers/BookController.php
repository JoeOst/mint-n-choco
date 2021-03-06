<?php

namespace app\modules\admin\controllers;

use app\models\Author;
use app\models\Genre;
use app\models\ImageUpload;
use Yii;
use app\models\Book;
use app\models\BookSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetImage($id) {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost) {

            $book = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');

            if ($book->saveImage($model->uploadFile($file, $book->image))) {
                return $this->redirect(['view', 'id'=>$book->id]);
            }

        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionSetAuthor($id) {

        $book = $this->findModel($id);

        $selectedAuthor = ($book->author) ? $book->author->id : 0;

        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'name');

        if (Yii::$app->request->isPost) {

            $author = Yii::$app->request->post('author');

            if ($book->saveAuthor($author)){
                return $this->redirect(['view', 'id' => $book->id]);
            }

        }

        return $this->render('author', [
            'book' => $book,
            'selectedAuthor' => $selectedAuthor,
            'authors' => $authors
        ]);
    }

    public function actionSetGenres($id) {

        $book = $this->findModel($id);

        $selectedGenres = $book->getSelectedGenres();

        $genres = ArrayHelper::map(Genre::find()->all(), 'id', 'title');

        if (Yii::$app->request->isPost) {

            $genres = Yii::$app->request->post('genres');
            $book->saveGenres($genres);
            return $this->redirect(['view', 'id' => $book->id]);
        }

        return $this->render('genres', [
            'selectedGenres' => $selectedGenres,
            'genres' => $genres,
        ]);
    }
}
