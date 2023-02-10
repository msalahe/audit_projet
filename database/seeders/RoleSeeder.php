<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Admin', 'Auditor', 'BizDev'] as $role) {
            DB::table('roles')->updateOrInsert(
                [
                    'name' => $role,
                ],
                [
                    'id' => Str::orderedUuid(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
