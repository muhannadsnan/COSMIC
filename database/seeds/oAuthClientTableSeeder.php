<?php

use Illuminate\Database\Seeder;
use App\oAuthClient;
use App\User;

class oAuthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // oAuthClient::create([
        //     'user_id' => null,
        //     'name' => 'admin_client',
        //     'secret' => base64_encode(hash_hmac('sha256', 'admin@COSMIC', 'secret', true)),
        //     'redirect' => 'http:localhost:8000/callback',
        //     'personal_access_client' => 1,
        //     'password_client' => 1,
        //     'revoked' => 0,
        // ]);
        $user = User::where('name', 'admin')->first();
        User::create_oauth_client($user);
        User::createApiToken($user);
    }
}
