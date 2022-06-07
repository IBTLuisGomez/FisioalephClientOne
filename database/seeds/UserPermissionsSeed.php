<?php

use Illuminate\Database\Seeder;

class UserPermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'physiotherapyOffice.edit_diagnosis_plan',
            'description' => '(F Consulta) Editar pruebas y medidas',
        ]);

        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.edit_treatment_sessions',
        //     'description' => '(F Consulta) Editar sesiones de tratamiento',
        // ]);

        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyHomePhysitherapyProgram.edit',
        //     'description' => '(F) Editar programa fisioterapéutico en casa',
        // ]);

        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.edit_valorations',
        //     'description' => '(F Consulta) Editar valoraciones de fisioterapia',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.see_notas',
        //     'description' => '(F Consulta) Ver notas',
        // ]);

        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.edit_notas',
        //     'description' => '(F Consulta) Editar notas',
        // ]);

        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.see_clinical_history',
        //     'description' => '(F Consulta) Editar Historia Clínica',
        // ]);


        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.see_recetas',
        //     'description' => '(F Consulta) Editar recetas',
        // ]);

        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.see_laboratorios',
        //     'description' => '(F Consulta) Editar estudios de laboratorio',
        // ]);


        // DB::statement("SET foreign_key_checks=0");
        // DB::table('permissions')->truncate();
        // DB::table('permission_user')->truncate();
        // DB::statement("SET foreign_key_checks=1");

        // DB::table('permissions')->insert([
        //     'name' => 'laboralPhysiotherapyJobAnalysis.see',
        //     'description' => '(FL) Ver análisis de puesto',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'laboralPhysiotherapyNorse.see',
        //     'description' => '(FL) Ver nórdico',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'laboralPhysiotherapyLoads.see',
        //     'description' => '(FL) Ver Cargas',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'laboralPhysiotherapyEvaluations.see',
        //     'description' => '(FL) Ver Evaluaciones',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'laboralPhysiotherapyTests.see',
        //     'description' => '(FL) Ver Pruebas',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'laboralPhysiotherapyLMGProtocols.see',
        //     'description' => '(FL) Ver Protocolos LMG',
        // ]);


        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyOffice.see',
        //     'description' => '(F) Ver consulta fisioterapia',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyProtocols.see',
        //     'description' => '(F) Ver protocolos',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyTests.see',
        //     'description' => '(F) Ver Pruebas',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyHomePhysitherapyProgram.see',
        //     'description' => '(F) Ver programa fisioterapéutico en casa',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyTherapeuticPlan.see',
        //     'description' => '(F) Ver Plan Terapéutico',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyCie10.see',
        //     'description' => '(F) Ver cie 10',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'physiotherapyCie9MC.see',
        //     'description' => '(F) Ver Cie9-CM',
        // ]);


        // DB::table('permissions')->insert([
        //     'name' => 'administrativeUsers.see',
        //     'description' => '(F) Ver Usuarios',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'administrativeQuestions.see',
        //     'description' => '(F) Ver Preguntas',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'administrativeOrders.see',
        //     'description' => '(F) Ver Órdenes',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'administrativeNonClasifiedProducts.see',
        //     'description' => '(F) Ver Productos sin clasificar',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'administrativeAppoinmtents.see',
        //     'description' => '(F) Ver Citas',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'administrativeCenters.see',
        //     'description' => '(F) Ver Centros',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'administrativeProductCategories.see',
        //     'description' => '(F) Ver Categorías de Productos',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'agenda.see',
        //     'description' => 'Ver agenda',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'agenda.delete',
        //     'description' => 'Borrar eventos de la agenda',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'general_database.see',
        //     'description' => 'Bases de datos en general',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'general_database.edit',
        //     'description' => 'Editar bases de datos en general',
        // ]);
        // DB::table('permissions')->insert([
        //     'name' => 'general_database.delete',
        //     'description' => 'Borrar cualquier registro',
        // ]);
    }
}
