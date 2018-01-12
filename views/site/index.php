<?php

use scotthuangzl\googlechart\GoogleChart;
use app\models\Container;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<div class="site-index">

    <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

                <?php

                          // $model = Container::find()
                          // ->select([
                          // '{{tipes}}.lookup_value', // select all customer fields
                          // 'COUNT({{countainer}}.id) AS counted' // calculate orders count
                          // ])
                          // ->joinWith('tipes') // ensure table junction
                          // ->groupBy('{{tipes}}.lookup_value') // group the result to ensure aggregation function works
                          // ->asArray()
                          // ->all();


                          //$model = Container::find()->select(['tipe_con' => 'tipe', 'counted' => 'count(*)'])->groupBy('tipe')->asArray()->all();
                          $model = (new \yii\db\Query())
                                    ->select(['tipe_container', 'jumlah'])
                                    ->from('v_stock_container')
                                    ->all();

							            //echo json_encode(array_values($data));

                          // $array = array(1, 2, 3, 4, 5);
                          // print_r($array);

                          $arr = array('tipe_con'=>array(),
                                        'counted'=>array());

                          $graph_data = [];
                          $graph_data[] = array('Container', 'Stock');

                          for($i = 0, $modEm = $model; $i < sizeof($model); $i++){
                          $arr['tipe_con'] = (string) $modEm[$i]['tipe_container'];
                          $arr['counted'] = (int) $modEm[$i]['jumlah'];
                          $graph_data[] = array($arr['tipe_con'],$arr['counted']); //add the values you require as set in the order of Year, Sales , Expenses
                          } //loop ends here

                          echo GoogleChart::widget(array('visualization' => 'PieChart',
                          // 'data' => array(
                          //     array('Task', 'Hours per Day'),
                          //     array('Work', 11),
                          //     array('Eat', 2),
                          //     //array('Commute', 2),
                          //     //array('Watch TV', 2),
                          //     //array('Sleep', 7)
                          // ),
                          'data' => $graph_data,
                          'options' => array('title' => 'Stok Container')));
                 ?>
            </div>
            <div class="col-lg-8">
                <?php

                      $model = (new \yii\db\Query())
                                ->select(['ammount_dry', 'ammount_mod'])
                                ->from('v_sum_dry_mod_selling_12month')
                                ->all();

                      $data_dry = [];
                      $data_mod = [];

                      for($i = 0, $modEm = $model; $i < sizeof($model); $i++){
                        $data_dry[] = ((int) $modEm[$i]['ammount_dry']) / 1000000;
                        $data_mod[] = ((int) $modEm[$i]['ammount_mod']) / 1000000;
                      }

                      //echo json_encode($data_dry);
                      //echo json_encode($data_mod);

                      echo Highcharts::widget([
                      'options' => [
                      'title' => ['text' => 'Penjualan'],
                      'xAxis' => [
                         'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                      ],
                      'yAxis' => [
                         'title' => ['text' => 'Total Pendapatan Gross (Dalam juta Rupiah)']
                      ],
                      'series' => [
                         ['name' => 'Dry (CW)', 'data' => $data_dry],
                         ['name' => 'Modifikasi', 'data' => $data_mod]
                         // ['name' => 'Dry (CW)', 'data' => [200, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]],
                         // ['name' => 'Modifikasi', 'data' => [300, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]]
                      ]
                      ]
                      ]);
                 ?>
            </div>
            <!-- <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div> -->
        </div>

    </div>
</div>
