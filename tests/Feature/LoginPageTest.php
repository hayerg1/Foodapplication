<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp():void
    {

        parent::setUp();
        $this->artisan('db:seed');

    }
    /**
     * @test
     */
    public function testLoginPost(){
        Session::start();
        $response = $this->followingRedirects()->call('POST', '/login', [
            'email' => 'badUsername@gmail.com',
            'password' => 'badPass',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('auth.login', $response->original->name());
    }
    public function tearDown():void
    {
        DB::rollback();
        parent::tearDown();
    }
    public function testSuccessfulLogin()
    {
        Session::start();

        $user = User::create([
            'name' => 'Testing',
            'email' => 'testing@testing.com',
            'password' => bcrypt('testpass123')
        ]);

        $response = $this
            ->post('/login', ['email' => 'testing@testing.com', 'password' => 'testpass123', '_token' => csrf_token() ])
            ->assertStatus(302);
        $user->delete();
    }

    /**
     *
     * This test will perform a post in /login
     * to see if the invalid login information
     * see 'These credentials do not match our records.'
     *
     */

    public function testUnsuccessfulLogin()
    {
        Session::start();

        $response = $this
            ->post('/login', ['email' => 'random@random.com', 'password' => 'random', '_token' => csrf_token()])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');
    }

    /**
     *
     * This test will perform a post in /login
     * to see if a missing email field will
     * see 'The email field is required.'
     *
     */

    public function testMissingEmail()
    {
        Session::start();

        $response = $this
            ->post('/login', ['email' => '', 'password' => 'random', '_token' => csrf_token()])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');
    }

    /**
     *
     * This test will perform a post in /login
     * to see if a missing password field will
     * see 'The password field is required.'
     *
     */


    public function testMissingPassword()
    {
        Session::start();

        $response = $this
            ->post('/login', ['email' => 'random@random.com', 'password' => '', '_token' => csrf_token()])
            ->assertStatus(302)
            ->assertSessionHasErrors('password');
    }

    /**
     *
     * This test will perform a post in /login
     * to see if a missing email field and
     * a missing password field will see
     * both 'The email field is required.'
     * and 'The password field is required.'
     *
     */


    public function testMissingBothEmailAndPassword()
    {
        Session::start();

        $response = $this
            ->post('/login', ['email' => '', 'password' => '', '_token' => csrf_token()])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');

    }

}
