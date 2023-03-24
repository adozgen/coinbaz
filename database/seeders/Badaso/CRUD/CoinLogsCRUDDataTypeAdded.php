<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class CoinLogsCRUDDataTypeAdded extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        \DB::beginTransaction();

        try {

            $data_type = Badaso::model('DataType')->where('name', 'coin_logs')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'coin_logs')->delete();
            }

            \DB::table('coinbaz_data_types')->insert(array (
                'id' => 5,
                'name' => 'coin_logs',
                'slug' => 'coin-logs',
                'display_name_singular' => 'Coin Logs',
                'display_name_plural' => 'Coin Logs',
                'icon' => NULL,
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => NULL,
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => true,
                'is_maintenance' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[{"event":"onCreate","notification_message_title":null,"notification_message":null}]',
                'is_soft_delete' => true,
                'created_at' => '2023-03-18T14:00:46.000000Z',
                'updated_at' => '2023-03-24T17:54:49.000000Z',
            ));

            Badaso::model('Permission')->generateFor('coin_logs');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/coin-logs')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Coin Logs',
                    'target' => '_self',
                    'icon_class' => '',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_coin_logs',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/coin-logs';
                $menu_item->title = 'Coin Logs';
                $menu_item->target = '_self';
                $menu_item->icon_class = '';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_coin_logs';
                $menu_item->order = $order;
                $menu_item->save();
            }

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

           throw new Exception('Exception occur ' . $e);
        }
    }
}
