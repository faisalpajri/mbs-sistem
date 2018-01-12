<?php
/* @var $this yii\web\View */
$this->title = 'Laporan MBS Sistem';
?>
<div class="site-index">

    <div>
        <?php
        $reportico = \Yii::$app->getModule('reportico');
        $engine = $reportico->getReporticoEngine();        // Fetches reportico engine
        $engine->access_mode = "ONEPROJECT";               // Allows access to all Reportico pages
        $engine->initial_execute_mode = "MENU";            // Starts user in administration page
        $engine->initial_project = "mbs-report";            // Name of report project folder
        $engine->bootstrap_styles = "3";                   // Set to "3" for bootstrap v3, "2" for V2 or false for no bootstrap
        $engine->force_reportico_mini_maintains = true;    // Often required
        $engine->bootstrap_preloaded = true;               // true if you dont need Reportico to load its own bootstrap
        $engine->clear_reportico_session = true;           // Normally required
        $engine->execute();
         ?>
    </div>
</div>
