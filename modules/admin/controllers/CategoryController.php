<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 16/7/30
 * Time: 下午7:41
 */
namespace app\modules\admin\controllers;

use app\modules\admin\models\Category;
use yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

Class CategoryController extends Controller
{
    public $layout = 'main';

    public $defaultAction = 'category-list';

    public function actionCategoryList()
    {
        $categories = Category::find();
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $categories->count(),
        ]);

        $categoriesList = $categories->select(['id', 'name'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();

        return $this->render('category_list', [
            'categoriesList' => $categoriesList,
            'pagination' => $pagination,
        ]);
    }
    
    public function actionCategoryEdit()
    {
        $session = Yii::$app->session;
        $request = Yii::$app->request;

        if ($request->get('id')) {
            $category = Category::findOne($request->get('id'));
        } else {
            $category = new Category();
        }

        if ($request->isPost) {
            if ($category->load($request->post()) && $category->save()) {
                $session->setFlash('success', '操作成功!');
                return $this->redirect('category-list');
            }
        }
        
        return $this->render('category_edit',[
            'category' => $category,
        ]);
    }

    public function actionCategoryDelete($id)
    {
        $session = Yii::$app->session;
        $category = Category::findOne($id);
        if ($category != null) {
            $category->delete();
            $session->setFlash('success', '删除成功!');
            return $this->redirect('category-list');
        } else {
            throw new NotFoundHttpException('找不到这个分类,无法删除');
        }
    }
}