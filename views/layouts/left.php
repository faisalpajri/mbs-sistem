<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Container Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Persediaan',
                        'icon' => 'archive',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Container', 'icon' => 'cubes', 'url' => ['/container/index'],],
                        ],
                    ],
                    [
                        'label' => 'Bisnis Proses',
                        'icon' => 'recycle',
                        'url' => '#',
                        'items' => [
                            // ['label' => 'Pesanan', 'icon' => 'file-code-o', 'url' => ['/container/index'],],
                            ['label' => 'Produksi', 'icon' => 'cogs', 'url' => ['/production/index'],],
                            ['label' => 'Jual', 'icon' => 'shopping-cart', 'url' => ['/selling-order/index'],],
                        ],
                    ],
                    ['label' => 'Kontraktor', 'icon' => 'user-secret', 'url' => ['/contractor/index']],
                    ['label' => 'Laporan', 'icon' => 'bar-chart', 'url' => ['/report/index']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                    ['label' => 'Logistik Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Shiping Order', 'icon' => 'road', 'url' => ['/ship-order/index']],
                    ['label' => 'Aramada', 'icon' => 'truck', 'url' => ['/armada/index']],
                    ['label' => 'Driver', 'icon' => 'id-card-o', 'url' => ['/driver/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
