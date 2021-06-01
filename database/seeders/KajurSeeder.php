<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Role;

class KajurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kajur = User::create([
            'name'=>'Ketua Jurusan',
            'email'=>'kajurjti@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $kajur -> assignRole("kajur");
    }
}
