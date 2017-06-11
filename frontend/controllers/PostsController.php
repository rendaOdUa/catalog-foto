<?php
namespace frontend\controllers;

use Yii;
use app\models\Posts;
use app\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\Sort;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{

    public function actionPosts()
    {
        $sort = new Sort([
        'attributes' => [
        'date' => [
            'asc' => ['date' => SORT_ASC],
            'desc' => ['date' => SORT_DESC],
            'default' => SORT_ASC,
            'label' => 'date',
        ],
        ],
        'defaultOrder' => ['date'=>SORT_DESC],
        ]);

        $query = Posts::find();

        $pagination = new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy($sort->orders)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('posts', [
            'posts' => $posts,
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }

    public function actionPost($id)
    {
        $sort = new Sort([
        'attributes' => [
        'date' => [
            'asc' => ['date' => SORT_ASC],
            'desc' => ['date' => SORT_DESC],
            'default' => SORT_ASC,
            'label' => 'date',
        ],
        ],
        'defaultOrder' => ['date'=>SORT_DESC],
        ]);

        $query = Posts::find();

        $pagination = new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy($sort->orders)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->where(['id' => $id])
            ->all();

        return $this->render('post', [
            'posts' => $posts,
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }
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
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
