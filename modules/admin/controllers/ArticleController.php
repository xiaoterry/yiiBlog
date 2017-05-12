<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 16/8/2
 * Time: 下午11:41
 */
namespace app\modules\admin\controllers;

use app\modules\admin\models\Article;
use app\modules\admin\models\Category;
use app\modules\admin\models\Tag;
use app\modules\admin\models\ArticleTag;
use yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller {
    public $layout = 'main';

    public $defaultAction = 'article-list';

    public function actionArticleList()
    {
        $articles = Article::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $articles->count(),
        ]);
        $articleList = $articles->select(['id', 'title', 'created_at', 'updated_at'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('id asc')
            ->asArray()
            ->all();

        return $this->render('article_list', [
            'articles' => $articleList,
            'pagination' => $pagination,
        ]);
    }
    
    public function actionArticleEdit()
    {
        $session = Yii::$app->session;
        $request = Yii::$app->request;

        if ($request->get('id')) {
            $article = Article::find()->where(['id' => $request->get('id')])->one();
            $article->tag_id = $article->tags;
        } else {
            $article = new Article();
        }
//        $article->tag_id = yii\helpers\ArrayHelper::map($article->getTags()->asArray()->all(), 'id', 'name');

        if ($request->isPost) {
            if ($article->load($request->post()) && $article->validate()) {
                if ($article->save()) {
                    $id = $article->primaryKey;
                    ArticleTag::deleteAll(['article_id' => $id]);
                    $tags = [];
                    foreach ($article->tag_id as $k => $v) {
                        $tags[$k][] = $id;
                        $tags[$k][] = $v;
                    }
                    Yii::$app->db->createCommand()
                        ->batchInsert(ArticleTag::tableName(), ['article_id', 'tag_id'], $tags)
                        ->execute();
                }
                $session->setFlash('success', '操作成功!');
                return $this->redirect('article-list');
            }
        }

        // 获取分类
        $categories = Category::find()->asArray()->all();
        $categories = yii\helpers\ArrayHelper::map($categories, 'id', 'name');
        
        // 获取标签
        $tags = Tag::find()->asArray()->all();
        $tags = yii\helpers\ArrayHelper::map($tags, 'id', 'name');

        return $this->render('article_edit', [
            'article' => $article,
            'tags' => $tags,
            'categories' => $categories,
        ]);
    }
    
    public function actionArticleDelete($id)
    {
        $article = Article::findOne($id);
        if ($article) {
            $article->delete();
            Yii::$app->session->setFlash('success', '文章删除成功');
            return $this->redirect('article-list');
        } else {
            throw new NotFoundHttpException('没有这篇文章!');
        }
    }
}