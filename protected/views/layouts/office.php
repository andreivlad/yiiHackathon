<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/css/dark-hive/jquery-ui-1.9.2.custom.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/css/base.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/css/skeleton.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/css/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/img/apple-touch-icon-114x114.png">
	
	<!-- JS -->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/js/lib/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/js/lib/jquery-ui-1.9.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/js/lib/Chart.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.$this->getAssetsUrl(); ?>/js/main.js"></script>
</head>

<body>
	<div class="container">
		<?php echo $content; ?>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			off.init();
		});
	</script>
</body>
</html>
