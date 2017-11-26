<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons-wind.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <?= $this->Html->meta('icon') ?>
  <?= $this->Html->css("payment_style.css") ?>
  <?= $this->Html->css("area-chart-widgets/area-chart-widget-1.css") ?>
  <?= $this->Html->script('bower_components/jquery-1.9.1/index.js') ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body class="pace-done" data-layout="default-sidebar-1" data-background="light" data-sidebar="dark" data-navbar="dark" data-top-navigation="dark" data-controller="dashboards" data-view="dashboard" data-collapsed="false" data-fullscreen="false" data-logo="dark">

  <div class="col main">
    <?php // $this->element('titleband')?>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>
  <footer>
    <?= $this->Html->script('easyResponsiveTabs.js') ?>
    </footer>
    </body>
    </html>
