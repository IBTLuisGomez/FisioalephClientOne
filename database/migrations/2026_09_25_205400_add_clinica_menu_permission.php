<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddClinicaMenuPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!DB::table('permissions')->where('name', 'clinica_menu.see')->exists()) {
            DB::table('permissions')->insert([
                'name' => 'clinica_menu.see',
                'description' => 'Administración/Ver pestaña Clínica (FisioalephDocker)',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'clinica_menu.see')->delete();
    }
}
