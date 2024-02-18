<?php
namespace umbalaconmeogia\simpledatasystem\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DefaultController implements the CRUD actions for SourceMessage model.
 */
class DefaultController extends Controller
{
    /**
     * Dispaly menu.
     * @return mixed
     */
    public function view($uuid)
    {
        return $this->render('view');
    }
}
