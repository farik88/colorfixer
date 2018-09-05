<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (env('APP_ENV') === 'production') {
            die('Can\'t seed data on production!');
        }

        Model::unguard();

        $tables = [
            'users',
            'customers',
            'cars',
            'stages',
            'attachments'
        ];

        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        } catch (Illuminate\Database\QueryException $e) {}

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        } catch (Illuminate\Database\QueryException $e) {}

        Model::reguard();

        foreach ($tables as $table) {
            $this->call(ucfirst($table) . 'TableSeeder');
        }
    }
}
