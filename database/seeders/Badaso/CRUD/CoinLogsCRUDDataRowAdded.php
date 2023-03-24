<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class CoinLogsCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'coin_logs')->first();

            \DB::table('coinbaz_data_rows')->insert(array (
                0 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'Id',
                    'required' => true,
                    'browse' => false,
                    'read' => false,
                    'edit' => false,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 1,
                ),
                1 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'coin_id',
                    'type' => 'relation',
                    'display_name' => 'Coin Id',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'relation' => '{"relation_type":"belongs_to","destination_table":"coins","destination_table_column":"id","destination_table_display_column":"symbol","destination_table_display_more_column":["token_address"]}',
                    'order' => 2,
                ),
                2 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'threshold_id',
                    'type' => 'relation',
                    'display_name' => 'Threshold Id',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'relation' => '{"relation_type":"belongs_to","destination_table":"thresholds","destination_table_column":"id","destination_table_display_column":"value"}',
                    'order' => 3,
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'last_updated',
                    'type' => 'datetime',
                    'display_name' => 'Last Updated',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 4,
                ),
                4 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'price',
                    'type' => 'number',
                    'display_name' => 'Price',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 5,
                ),
                5 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'percentage_change',
                    'type' => 'number',
                    'display_name' => 'Percentage Change',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 6,
                ),
                6 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'deleted_at',
                    'type' => 'datetime',
                    'display_name' => 'Deleted At',
                    'required' => false,
                    'browse' => false,
                    'read' => false,
                    'edit' => false,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 7,
                ),
                7 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'created_at',
                    'type' => 'datetime',
                    'display_name' => 'Created At',
                    'required' => false,
                    'browse' => false,
                    'read' => false,
                    'edit' => false,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 8,
                ),
                8 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'updated_at',
                    'type' => 'datetime',
                    'display_name' => 'Updated At',
                    'required' => false,
                    'browse' => false,
                    'read' => false,
                    'edit' => false,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 9,
                ),
                9 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'cmc_url',
                    'type' => 'url',
                    'display_name' => 'CmcUrl',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 10,
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

