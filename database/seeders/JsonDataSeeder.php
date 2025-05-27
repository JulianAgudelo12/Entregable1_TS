<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JsonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data extracted from JSON export
        $data = [
            'password_reset_tokens' => [
                [
                    'email' => 'agudelojulian4@gmail.com',
                    'token' => '$2y$12$Oy3anXIU9NllZCPo1W5hk.BSM91J1nzboZa/J32LX.JdLAmsixbNG',
                    'created_at' => '2025-05-26 07:44:14',
                ],
                [
                    'email' => 'jagudeloc@eafit.edu.co',
                    'token' => '$2y$12$IB9RPBAHAt2ibL03ZESaF.H/1ypQFE0ttjKxKYJVRoHjxT9s1wFUG',
                    'created_at' => '2025-05-26 07:47:31',
                ],
            ],
            'pc_components' => [
                [
                    'id'          => 1,
                    'reference'   => 'RTX5090-32GB-GDDR7',
                    'name'        => 'NVIDIA GeForce RTX 5090',
                    'brand'       => 'NVIDIA',
                    'quantity'    => 10,
                    'image'       => 'images/rtx5090.png',
                    'speed'       => '2625 MHz',
                    'capacity'    => '32 GB',
                    'generation'  => 'Blackwell',
                    'type'        => 'GPU',
                    'price'       => 1999.99,
                    'description' => 'Designed to Visual designers and Video Editors...',
                    'created_at'  => '2025-05-24 15:51:08',
                    'updated_at'  => '2025-05-24 15:51:08',
                ],
                [
                    'id'          => 2,
                    'reference'   => 'i9-10850K',
                    'name'        => 'Intel Core i9-10850K',
                    'brand'       => 'Intel',
                    'quantity'    => 20,
                    'image'       => 'components/i9-1748314469.jpg',
                    'speed'       => '3.6 GHz (base), 5.2 GHz (turbo)',
                    'capacity'    => '20 MB Intel Smart Cache',
                    'generation'  => '10ª generación',
                    'type'        => 'cpu',
                    'price'       => 449.00,
                    'description' => 'Perfect for computer science students and professionals... (students)',
                    'created_at'  => '2025-05-27 02:54:29',
                    'updated_at'  => '2025-05-27 02:54:29',
                ],
            ],
            'sessions' => [
                [
                    'id' => 'GLctvNnBWZQayUtNluU4C89yWrjhxNueV20NCbnf',
                    'user_id' => null,
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Mozilla/5.0 (...)',
                    'payload' => 'YTozOntzOjY6Il90b2tlbiI7...',
                    'last_activity' => 1748314519,
                ],
                [
                    'id' => 'i2cIi3HUqlPkRrxfdOH9NOXFlGjI2RDlpGEQ9Sfx',
                    'user_id' => 1,
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Mozilla/5.0 (...)',
                    'payload' => 'YTo1OntzOjY6Il90b2tlbiI7...',
                    'last_activity' => 1748314769,
                ],
            ],
            'users' => [
                [
                    'id' => 1,
                    'name' => 'Julian',
                    'email' => 'agudelojulian4@gmail.com',
                    'password' => '$2y$12$HO/jFjdIDN1A44As/GvN7uv7kE5..AUgifTBU05iO7PYXPLpl.yWe',
                    'is_admin' => 1,
                    'remember_token' => null,
                    'created_at' => '2025-05-25 01:13:37',
                    'updated_at' => '2025-05-25 01:13:37',
                ],
                [
                    'id' => 5,
                    'name' => 'Prueba',
                    'email' => 'Prueba@gmail.com',
                    'password' => '$2y$12$5YpRXAfaZrauSANAHfNwe728fwhzp92Wzp1dpzco7/Qa2QUv/cmG',
                    'is_admin' => 0,
                    'remember_token' => null,
                    'created_at' => '2025-05-26 07:39:31',
                    'updated_at' => '2025-05-26 07:39:31',
                ],
                [
                    'id' => 6,
                    'name' => 'Julian',
                    'email' => 'jagudeloc@eafit.edu.co',
                    'password' => '$2y$12$OEmCV4Y4tnSSl5ONzpII..5bpl81IiEJvqWLZ4x31OLrpDQc1dRKC',
                    'is_admin' => 0,
                    'remember_token' => 'z0nNNwFRkJZ9SzwO9s9JdLRsQxxtddEvddMF9XO252y1mVnnK1H0VXRHgxyX',
                    'created_at' => '2025-05-26 07:45:53',
                    'updated_at' => '2025-05-26 07:45:53',
                ],
            ],
        ];

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($data as $table => $rows) {
            if ($table === 'computers') {
                continue;
            }

            DB::table($table)->truncate();
            DB::table($table)->insert($rows);
            $this->command->info("Seeded {$table}: ".count($rows).' records');
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
