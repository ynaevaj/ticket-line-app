<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Account;

class AccountTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_register(){
        $response = $this->post('api/auth/register', [
            'name' => $name = 'Yukari Hirai',
            'email' => $email = 'yukarihirai15@gmail.com',
            'username' => $username = 'yukarihirai',
            'password' => $password = 'Test12345',
            'password_confirmation' => $password_confirmation = 'Test12345',
        ]);

        $user = User::where('username', '=', $username)->first();
        $response->assertJson([
           "user" =>[
            'account_id' => $user->account_id,
            'name' => $name,
            'email' => $email,
            'id' => $user->id,
           ],
           "message" => "Registration Successful",

        ])->assertStatus(200);
    }

    public function test_user_can_login(){
        $user = User::factory()->create();

        $response = $this->post('api/auth/login',[
            'username' => $username = $user->username,
            'password' => 'Test12345',
        ]);

       $response->assertJson([
        "user" => [
            'account_id' => $user->account_id,
            'email' => $user->email,
            "id" => $user->id,
        ],
        "message" => "Login Successful"
       ])->assertStatus(200);
    }

    public function test_user_can_logout(){
        $user = User::factory()->create();
        $account = Account::where('account_id', '=', $user->account_id)->first();
        $token = $account->createToken('API Token')->accessToken;
        
        //dd($account);
        $response = $this->withHeaders([
            'Authorization' => "Bearer:{$token}",
            'Accept' => 'application/json',

        ])->actingAs($account)->get('api/auth/logout');

        //dd($response);

        $response->assertJson([
            "message" => "User logged out successfully"
        ])->assertStatus(200);

    }

}
