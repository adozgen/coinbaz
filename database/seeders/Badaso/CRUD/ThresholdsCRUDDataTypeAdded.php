<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class ThresholdsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'thresholds')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'thresholds')->delete();
            }

            \DB::table('coinbaz_data_types')->insert(array (
                'id' => 1,
                'name' => 'thresholds',
                'slug' => 'thresholds',
                'display_name_singular' => 'Thresholds',
                'display_name_plural' => 'Thresholds',
                'icon' => NULL,
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => NULL,
                'order_column' => 'value',
                'order_display_column' => 'value',
                'order_direction' => 'ASC',
                'generate_permissions' => true,
                'server_side' => true,
                'is_maintenance' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => true,
                'created_at' => '2023-03-18T16:51:17.000000Z',
                'updated_at' => '2023-03-18T16:54:02.000000Z',
            ));

            Badaso::model('Permission')->generateFor('thresholds');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/thresholds')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Thresholds',
                    'target' => '_self',
                    'icon_class' => '',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_thresholds',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/thresholds';
                $menu_item->title = 'Thresholds';
                $menu_item->target = '_self';
                $menu_item->icon_class = '';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_thresholds';
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
