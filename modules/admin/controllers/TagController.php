<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 16/7/30
 * Time: 下午7:41
 */
namespace app\modules\admin\controllers;

use app\modules\admin\models\Tag;
use yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

Class TagController extends Controller
{
    public $layout = 'main';

    public $defaultAction = 'tag-list';

    public function actionTagList()
    {
        $tags = Tag::find();
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $tags->count(),
        ]);

        $tagsList = $tags->select(['id', 'name'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();

        return $this->render('tag_list', [
            'tagsList' => $tagsList,
            'pagination' => $pagination,
        ]);
    }
    
    public function actionTagEdit()
    {
        $session = Yii::$app->session;
        $request = Yii::$app->request;

        if ($request->get('id')) {
            $tag = Tag::findOne($request->get('id'));
        } else {
            $tag = new Tag();
        }

        if ($request->isPost) {
            if ($tag->load($request->post()) && $tag->save()) {
                $session->setFlash('success', '操作成功!');
                return $this->redirect('tag-list');
            }
        }
        
        return $this->render('tag_edit',[
            'tag' => $tag,
        ]);
    }

    public function actionTagDelete($id)
    {
        $session = Yii::$app->session;
        $tag = Tag::findOne($id);
        if ($tag != null) {
            $tag->delete();
            $session->setFlash('success', '删除成功!');
            return $this->redirect('tag-list');
        } else {
            throw new NotFoundHttpException('找不到这个分类,无法删除');
        }
    }
}