<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'voucher-action-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model, 'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deleted_at'); ?>
		<?php echo $form->textField($model, 'deleted_at'); ?>
		<?php echo $form->error($model,'deleted_at'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('voucherHistories')); ?></label>
		<?php echo $form->checkBoxList($model, 'voucherHistories', GxHtml::encodeEx(GxHtml::listDataEx(VoucherHistory::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->