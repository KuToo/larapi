<?php

namespace App\Console\Commands;

use App\Models\ClientMenu;
use App\Models\ClientUserMenu;
use Illuminate\Console\Command;

class InitApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化应用数据';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //初始化菜单
        $menus_arr = [
            ['id' => 1, 'parent_id' => 0, 'order' => 1, 'title' => '首页', 'icon' => 'icon', 'uri' => '/pages/index/index', 'target' => 1],
            ['id' => 2, 'parent_id' => 0, 'order' => 2, 'title' => '通讯录管理', 'icon' => 'icon', 'uri' => '/pages/echart/page1', 'target' => 1],
            ['id' => 3, 'parent_id' => 0, 'order' => 3, 'title' => '短信管理', 'icon' => 'icon', 'uri' => '/pages/echart/page2', 'target' => 1],
            ['id' => 4, 'parent_id' => 0, 'order' => 4, 'title' => '账户管理', 'icon' => 'icon', 'uri' => '/pages/admin/list', 'target' => 1],
        ];
        foreach ($menus_arr as $menu) {
            ClientMenu::firstOrCreate($menu);
        }

        $role_menus_arr = [
            //主账号
            [
                'role_id' => 1,
                'menu_id' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 2,
            ],
            [
                'role_id' => 1,
                'menu_id' => 3,
            ],
            [
                'role_id' => 1,
                'menu_id' => 4,
            ],

            //子账号
            [
                'role_id' => 1,
                'menu_id' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 2,
            ],
            [
                'role_id' => 1,
                'menu_id' => 3,
            ],
        ];
        foreach ($role_menus_arr as $role_menu) {
            ClientUserMenu::firstOrCreate($role_menu);
        }
        $this->info('菜单数据初始化完成');
    }
}
