<?php
Yii::import('application.controllers.BaseController');
class DistributionController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Distribution'),
		));
	}

	public function actionCreate() {
		$model = new Distribution;
                                    
		if (isset($_POST['Distribution'])) {
			$model->setAttributes($_POST['Distribution']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Distribution');


		if (isset($_POST['Distribution'])) {
			$model->setAttributes($_POST['Distribution']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Distribution')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Distribution');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Distribution('search');
		$model->unsetAttributes();

		if (isset($_GET['Distribution']))
			$model->setAttributes($_GET['Distribution']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionPrint($id) {
            $subdistributions = Subdistribution::model()->findAll("distribution_id = :distribution_id", array(":distribution_id" => $id));
            Yii::import('application.controllers.SubdistributionController');
            $obj = new SubdistributionController("");
            $html = "";
            foreach ($subdistributions as $subdistribution ) {
                $html .= $obj->actionPrint($subdistribution->id);
            }
            return $html;
        }

        public function actionSavePdf($id) {
            $distribution = Distribution::model()->findByPk($id);
            $html = $this->actionPrint($id);
            //echo $html;
            $mPDF1 = Yii::app()->ePdf->mpdf('ar', 'A4');
            $mPDF1->WriteHTML($html);
            $mPDF1->Output($distribution->name . '_vouchers.pdf', "D");
            Yii::app()->end();
        }
}