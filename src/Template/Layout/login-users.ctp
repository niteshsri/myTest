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

$cakeDescription = 'Uday';
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
  <?= $this->Html->meta('icon') ?>

  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons-wind.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <?= $this->Html->meta('icon') ?>
  <?= $this->Html->css("main.css") ?>
  <?= $this->Html->css("area-chart-widgets/area-chart-widget-1.css") ?>
  <?= $this->Html->css("text-widgets/text-widget-1.css") ?>
  <?= $this->Html->css("timeline-widgets/timeline-widget-1.css") ?>
  <?= $this->Html->css("activity-widgets/activity-widget-1.css") ?>
  <?= $this->Html->css("finance-widgets/finance-widget-1.css") ?>
  <?= $this->Html->css("table-widgets/table-widget-1.css") ?>
  <?= $this->Html->css("table-widgets/table-widget-2.css") ?>
  <?= $this->Html->css("table-widgets/table-widget-4.css") ?>
  <?= $this->Html->css("layouts/off-canvas-1.css") ?>
  <?= $this->Html->css("layouts/default-sidebar-1.css") ?>
  <?= $this->Html->css("elements/left-sidebar-1.css") ?>
  <?= $this->Html->css("elements/navbar-1.css") ?>
  <?= $this->Html->css("layouts/collapsed-sidebar-1.css") ?>
  <?= $this->Html->css("elements/collapsed-left-sidebar-1.css") ?>
  <?= $this->Html->css("elements/collapsed-sidebar-heading-1.css") ?>
  <?= $this->Html->css("layouts/top-navigation-1.css") ?>
  <?= $this->Html->css("elements/top-navigation-1.css") ?>
  <?= $this->Html->css("layouts/top-navigation-2.css") ?>
  <?= $this->Html->css("elements/top-navigation-2.css") ?>
  <?= $this->Html->css("layouts/empty-view-1.css") ?>
  <?= $this->Html->css("elements/widget.css") ?>
  <?= $this->Html->css("elements/backdrops.css") ?>
  <?= $this->Html->css("elements/sidebar-heading-1.css") ?>
  <?= $this->Html->css("elements/sidebar-widget-1.css") ?>
  <?= $this->Html->css("elements/sidebar-widget-2.css") ?>
  <?= $this->Html->css("elements/logo.css") ?>
  <?= $this->Html->css("elements/dropdown-grid.css") ?>
  <?= $this->Html->css("elements/dropdown-tasks.css") ?>
  <?= $this->Html->css("elements/dropdown-messages.css") ?>
  <?= $this->Html->css("elements/dropdown-flags.css") ?>
  <?= $this->Html->css("elements/dropdown-user.css") ?>
  <?= $this->Html->css("elements/right-sidebar.css") ?>
  <?= $this->Html->css("elements/jumbotron-1.css") ?>
  <?= $this->Html->css("elements/jumbotron-2.css") ?>
  <?= $this->Html->css("dashboards/dashboard.css") ?>
  <?= $this->Html->css("apps/calendar.css") ?>
  <?= $this->Html->css("ui-elements/buttons.css") ?>
  <?= $this->Html->css("ui-elements/images.css") ?>
  <?= $this->Html->css("ui-elements/lists.css") ?>
  <?= $this->Html->css("ui-elements/typography.css") ?>
  <?= $this->Html->css("ui-elements/social-media-buttons.css") ?>
  <?= $this->Html->css("ui-elements/badges.css") ?>
  <?= $this->Html->css("ui-elements/progress-bars.css") ?>
  <?= $this->Html->css("ui-elements/tabs.css") ?>
  <?= $this->Html->css("ui-elements/breadcrumbs.css") ?>
  <?= $this->Html->css("ui-elements/dropdowns.css") ?>
  <?= $this->Html->css("ui-elements/pagination.css") ?>
  <?= $this->Html->css("notifications/tooltips.css") ?>
  <?= $this->Html->css("notifications/popovers.css") ?>
  <?= $this->Html->css("notifications/modals.css") ?>
  <?= $this->Html->css("notifications/alerts.css") ?>
  <?= $this->Html->css("notifications/sweet-alert-2.css") ?>
  <?= $this->Html->css("notifications/toastr.css") ?>
  <?= $this->Html->css("icons/font-awesome.css") ?>
  <?= $this->Html->css("icons/flags.css") ?>
  <?= $this->Html->css("icons/material-design-icons.css") ?>
  <?= $this->Html->css("icons/weather-icons.css") ?>
  <?= $this->Html->css("icons/simple-line-icons.css") ?>
  <?= $this->Html->css("icons/ionicons.css") ?>
  <?= $this->Html->css("forms/default-forms.css") ?>
  <?= $this->Html->css("forms/file-uploads.css") ?>
  <?= $this->Html->css("forms/steps.css") ?>
  <?= $this->Html->css("forms/sliders.css") ?>
  <?= $this->Html->css("tables/default-tables.css") ?>
  <?= $this->Html->css("tables/datatable.css") ?>
  <?= $this->Html->css("tables/jquery-treegrid.css") ?>
  <?= $this->Html->css("charts/peity.css") ?>
  <?= $this->Html->css("charts/chartist.css") ?>
  <?= $this->Html->css("charts/nvd3.css") ?>
  <?= $this->Html->css("charts/easy-pie-chart.css") ?>
  <?= $this->Html->css("charts/morris-js.css") ?>
  <?= $this->Html->css("pages/user-profile.css") ?>
  <?= $this->Html->css("documentation/code-structure.css") ?>
  <?= $this->Html->css("documentation/customization.css") ?>
  <?= $this->Html->css("documentation/layout.css") ?>
  <?= $this->Html->css("documentation/styles.css") ?>
  <?= $this->Html->css("documentation/credits.css") ?>
  <?= $this->Html->css("maps/google-maps.css") ?>
  <?= $this->Html->css("maps/vector-maps.css") ?>
  <?= $this->Html->css("pages/coming-soon.css") ?>
  <?= $this->Html->css("pages/contact-us.css") ?>
  <?= $this->Html->css("pages/create-account.css") ?>
  <?= $this->Html->css("pages/error-page.css") ?>
  <?= $this->Html->css("pages/login.css") ?>
  <?= $this->Html->css("pages/reset-password.css") ?>
  <?= $this->Html->css("pages/subscribe.css") ?>
  <?= $this->Html->css("pages/under-maintenance.css") ?>
  <?= $this->Html->css("pages/unlock-account.css") ?>
  <?= $this->Html->script('bower_components/jquery-1.9.1/index.js') ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body data-layout="empty-view-1" data-background="lighter">

  <?= $this->Flash->render() ?>
  <?= $this->Flash->render('auth', ['element' => 'Flash/error']) ?>
  <?= $this->fetch('content'); ?>
  <footer>
    <?= $this->Html->script('colors.js') ?>
    <?= $this->Html->script('functions.js') ?>
    <?= $this->Html->script('charts/functions.js') ?>
    <?= $this->Html->script('maps/functions.js') ?>
    <?= $this->Html->script('icons/functions.js') ?>
    <?= $this->Html->script('custom-events.js') ?>
    <?= $this->Html->script('app.js') ?>
    <?= $this->Html->script('mousetrap.js') ?>
    <?= $this->Html->script('elements/right-sidebar.js') ?>
    <?= $this->Html->script('elements/navbar.js') ?>
    <?= $this->Html->script('elements/backdrops.js') ?>
    <?= $this->Html->script('bower_components/toastr/toastr.min.js') ?>
    <?= $this->Html->script('dashboards/dashboard.js') ?>
    <?= $this->Html->script('apps/calendar.js') ?>
    <?= $this->Html->script('ui-elements/progress-bars.js') ?>
    <?= $this->Html->script('notifications/tooltips.js') ?>
    <?= $this->Html->script('notifications/popovers.js') ?>
    <?= $this->Html->script('notifications/sweet-alert-2.js') ?>
    <?= $this->Html->script('notifications/toastr.js') ?>
    <?= $this->Html->script('icons/font-awesome.js') ?>
    <?= $this->Html->script('icons/flags.js') ?>
    <?= $this->Html->script('icons/material-design-icons.js') ?>
    <?= $this->Html->script('icons/weather-icons.js') ?>
    <?= $this->Html->script('icons/simple-line-icons.js') ?>
    <?= $this->Html->script('icons/ionicons.js') ?>
    <?= $this->Html->script('forms/file-uploads.js') ?>
    <?= $this->Html->script('forms/steps.js') ?>
    <?= $this->Html->script('forms/validation.js') ?>
    <?= $this->Html->script('forms/sliders.js') ?>
    <?= $this->Html->script('tables/default-tables.js') ?>
    <?= $this->Html->script('tables/datatable.js') ?>
    <?= $this->Html->script('tables/table-export.js') ?>
    <?= $this->Html->script('tables/jquery-treegrid.js') ?>
    <?= $this->Html->script('charts/peity.js') ?>
    <?= $this->Html->script('charts/chartist.js') ?>
    <?= $this->Html->script('charts/nvd3.js') ?>
    <?= $this->Html->script('charts/easy-pie-chart.js') ?>
    <?= $this->Html->script('charts/morris-js.js') ?>
    <?= $this->Html->script('maps/google-maps.js') ?>
    <?= $this->Html->script('maps/vector-maps.js') ?>
    <?= $this->Html->script('plugins/moment-js.js') ?>
    <?= $this->Html->script('plugins/accounting-js.js') ?>
    <?= $this->Html->script('pages/coming-soon.js') ?>
    <?= $this->Html->script('pages/error-page.js') ?>

    <?= $this->Html->script('bower_components/tether/dist/js/tether.min.js') ?>
    <?= $this->Html->script('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
    <?= $this->Html->script('bower_components/lodash/dist/lodash.min.js') ?>
    <?= $this->Html->script('bower_components/js-storage/js.storage.min.js') ?>
    <?= $this->Html->script('bower_components/mousetrap/mousetrap.js') ?>
    <?= $this->Html->script('bower_components/d3/d3.js') ?>
    <?= $this->Html->script('bower_components/moment/moment.js') ?>
    <?= $this->Html->script('bower_components/fakeLoader/fakeLoader.min.js') ?>
    <?= $this->Html->script('bower_components/jquery-fullscreen/jquery.fullscreen-min.js') ?>
    <?= $this->Html->script('bower_components/PACE/pace.min.js') ?>
    <?= $this->Html->script('bower_components/fullcalendar/dist/fullcalendar.min.js') ?>
    <?= $this->Html->script('bower_components/sweetalert2/dist/sweetalert2.min.js') ?>
    <?= $this->Html->script('bower_components/dropzone/dist/min/dropzone.min.js') ?>
    <?= $this->Html->script('bower_components/approvejs/dist/approve.min.js') ?>
    <?= $this->Html->script('bower_components/nouislider/distribute/nouislider.min.js') ?>
    <?= $this->Html->script('bower_components/datatables/media/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('bower_components/datatables/media/js/dataTables.bootstrap4.min.js') ?>
    <?= $this->Html->script('bower_components/table-export/tableExport.js') ?>
    <?= $this->Html->script('bower_components/table-export/jquery.base64.js') ?>
    <?= $this->Html->script('bower_components/table-export/jspdf/libs/sprintf.js') ?>
    <?= $this->Html->script('bower_components/table-export/jspdf/jspdf.js') ?>
    <?= $this->Html->script('bower_components/table-export/jspdf/libs/base64.js') ?>
    <?= $this->Html->script('bower_components/jquery-treegrid/js/jquery.treegrid.min.js') ?>
    <?= $this->Html->script('bower_components/peity/jquery.peity.min.js') ?>
    <?= $this->Html->script('bower_components/chartist/dist/chartist.min.js') ?>
    <?= $this->Html->script('bower_components/nvd3/build/nv.d3.min.js') ?>
    <?= $this->Html->script('bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') ?>
    <?= $this->Html->script('bower_components/raphael/raphael.min.js') ?>
    <?= $this->Html->script('bower_components/morris.js/morris.min.js') ?>
    <?= $this->Html->script('bower_components/topojson/topojson.min.js') ?>
    <?= $this->Html->script('bower_components/datamaps/dist/datamaps.all.min.js') ?>
    <?= $this->Html->script('bower_components/accounting.js/accounting.min.js') ?>
    <?= $this->Html->script('bower_components/jquery.countdown/dist/jquery.countdown.min.js') ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=weather,visualization,panoramio&key=AIzaSyDRuAzjz4dLpeQnvW4D8qZ7mX-G0pAZEcI"></script>
  </footer>
</body>

</html>
