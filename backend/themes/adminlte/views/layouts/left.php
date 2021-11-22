<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

                <?= Html::img('uploads/person/'.Yii::$app->user->identity->person->photo,
                [
                    'class' => 'img-circle', 
                    'alt' => Yii::$app->user->identity->person->firstname.' '.Yii::$app->user->identity->person->lastname
                ]);?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->person->firstname.' '.Yii::$app->user->identity->person->lastname ?>
                </p>
                <?php  if(!empty(Yii::$app->user->identity->id)){ ?>
                <a href="#"><i class="fa fa-circle" style="color: #06f50a"></i> Online</a>
                <?php } ?>
            </div>

        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'หน้าบ้าน', 'options' => ['class' => 'header']],
                    ['label' => 'ปฎิทินการจอง', 'icon' => 'fa fa-calendar', 'url'=> Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/index'])],
                    ['label' => 'หลังบ้าน', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าหลัก', 'icon' => 'fa fa-file-code-o', 'url' => ['/site/index']],
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'ระบบจองห้องประชุม',
                        'icon' => 'fa fa-calendar',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ปฏิทินการจอง', 'icon' => 'fa fa-calendar', 
                             'url' => ['/meeting/default/index'],
                            ],
                            ['label' => 'จองห้องประชุม', 'icon' => 'fa fa-calendar-check-o', 
                             'url' => ['/meeting/meeting/create'],
                            ],
                            ['label' => 'รายการจองห้องประชุม', 'icon' => 'fa fa-list',
                             'url' => ['/meeting/meeting/index'],
                            ],
                            [
                                'label' => 'รายงาน',
                                'icon' => 'fa fa-book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'รายงาน1', 'icon' => 'fa fa-bar-chart-o', 
                                      'url' => ['/meeting/report/report1'],
                                    ],
                                    ['label' => 'รายงาน2', 'icon' => 'fa fa-line-chart', 
                                      'url' => ['/meeting/report/report2'],
                                    ],
                                    ['label' => 'รายงาน3', 'icon' => 'fa fa-file-pdf-o', 
                                      'url' => ['/meeting/report/report3'],
                                    ],
                                ],
                            ],
                            [
                                'label' => 'ข้อมูลพื้นฐาน',
                                'icon' => 'fa fa-cogs',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'ห้องประชุม', 'icon' => 'fa fa-building-o', 
                                      'url' => ['/meeting/room/index'],
                                    ],
                                    ['label' => 'อุปกรณ์', 'icon' => 'fa fa-cogs', 
                                      'url' => ['/meeting/equipment/index'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'ระบบงานบุคลล',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'items' => [
                            ['label' => 'หน้าลหัก', 'icon' => 'fa fa-home', 
                             'url' => ['/personal/default/index'],
                            ],
                            ['label' => 'เพิ่มบุคคล', 'icon' => 'fa fa-user', 
                             'url' => ['/personal/person/create'],
                            ],
                            ['label' => 'รายการบุคคล', 'icon' => 'fa fa-list',
                             'url' => ['/personal/person/index'],
                            ],                            
                        ],
                    ],
                    [
                        'label' => 'ข้อมูลพื้นฐาน',
                        'icon' => 'fa fa-cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ฝ่าย', 'icon' => 'fa fa-building-o', 
                              'url' => ['/department/department/index'],
                            ],                                    
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>