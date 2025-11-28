<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $roles = [
            'superadmin',
            'tech manager',
            'user',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Bootstrap a superadmin user if not exists
        $superAdminEmail = env('SEED_SUPERADMIN_EMAIL', 'admin@yopmail.com');
        $superAdminPassword = env('SEED_SUPERADMIN_PASSWORD', 'secret');

        $superAdmin = User::firstOrCreate(
            ['email' => $superAdminEmail],
            [
                'name' => 'Super Admin',
                'password' => Hash::make($superAdminPassword),
            ]
        );

        if (!$superAdmin->hasRole('superadmin')) {
            $superAdmin->assignRole('superadmin');
        }

        // Seed a tech manager user
        $user = User::firstOrCreate(
            ['email' => 'tech@yopmail.com'],
            [
                'name' => 'Test tech manager',
                'password' => Hash::make('secret'),
            ]
        );
        if (!$user->hasRole('tech manager')) {
            $user->assignRole('tech manager');
        }

        // Seed a test user
        $user = User::firstOrCreate(
            ['email' => 'deskuser@yopmail.com'],
            [
                'name' => 'Test user',
                'password' => Hash::make('secret'),
            ]
        );
        if (!$user->hasRole('user')) {
            $user->assignRole('user');
        }

        $this->call([
            ClientSeeder::class,
            ContractCmsSeeder::class,
            CmsMasterSeeder::class,
            TranslationCmsSeeder::class,
            MiscCmsMasterSeeder::class,
            MiscGemMasterSeeder::class
        ]);
    }
}
