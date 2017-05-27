<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use app\models\Genre;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Book::getNew(2);

        $rating = Book::getTop();
        $genres = Genre::getAll();

        return $this->render('index', [
            'books'=>$data['books'],
            'pagination'=>$data['pagination'],
            'rating'=>$rating,
            'genres'=>$genres,
        ]);
    }

    /**
     * Displays one page.
     *
     * @return string
     */
    public function actionView($id)
    {
        $book = Book::findOne($id);

        $rating = Book::getTop();
        $genres = Genre::getAll();

        return $this->render('book', [
            'book'=>$book,
            'rating'=>$rating,
            'genres'=>$genres,
        ]);
    }

    public function actionAuthors() {
        $letters = Author::getAllLetter();

        $data = Author::getAll();

        $rating = Book::getTop();
        $genres = Genre::getAll();

        return $this->render('authors', [
            'authors'=>$data['authors'],
            'pagination'=>$data['pagination'],
            'letters'=>$letters,
            'rating'=>$rating,
            'genres'=>$genres,
        ]);
    }

    public function actionPerson($id) {
        $author =  Author::findOne($id);
        $data = Author::getBooksByAuthor($id);
        $rating = Book::getTop();
        $genres = Genre::getAll();

        return $this->render('person', [
            'author'=>$author,
            'books'=>$data['books'],
            'pagination'=>$data['pagination'],
            'rating'=>$rating,
            'genres'=>$genres
        ]);
    }

    public function actionGenre($id)
    {
        $data = Genre::getBooksByGenre($id);

        $rating = Book::getTop();
        $genres = Genre::getAll();
        $currentGenre = Genre::getCurrentGenre($id);

        return $this->render('genre', [
            'books'=>$data['books'],
            'pagination'=>$data['pagination'],
            'rating'=>$rating,
            'genres'=>$genres,
            'currentGenre'=>$currentGenre,
        ]);
    }

    public function actionAllbooks() {
        $data = Book::getAll();

        $rating = Book::getTop();
        $genres = Genre::getAll();

        return $this->render('allbooks', [
            'books'=>$data['books'],
            'pagination'=>$data['pagination'],
            'rating'=>$rating,
            'genres'=>$genres,
        ]);
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
