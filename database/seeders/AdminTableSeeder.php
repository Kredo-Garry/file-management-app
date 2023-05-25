<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'admin user1',
                'email' => 'adminuser1@gmail.com',
                'password' => Hash::make('admin12345'),
                'role_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'admin user2',
                'email' => 'adminuser2@gmail.com',
                'password' => Hash::make('admin12345'),
                'role_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ];

        $this->user->insert($admins);
    }
}
