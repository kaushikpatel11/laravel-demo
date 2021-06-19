<?php

namespace Tests;

// HTTP
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

// FACADES
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

// TRAITS
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

use Faker\Factory as Faker;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, InteractsWithDatabase;

    protected $token = '';

    protected $name      = 'First Lastname';
    protected $nameNew   = 'Second Newname';
    protected $firstName = null;             // set in setUp()
    protected $lastName  = null;             // set in setUp()


    protected $email             = 'phpunit.user.01@wereagile.com';
    protected $email2            = 'phpunit.user.02@wereagile.com';
    protected $emailNew          = 'phpunit.user.03@wereagile.com';
    protected $emailInvalid      = 'email@invalid';
    protected $emailDoesNotExist = 'none.exists.user@wereagile.com';

    protected $password          = '12345678';
    protected $passwordNew       = 'abcdefghi';
    protected $passwordInvalid   = '1234';
    protected $passwordIncorrect = 'INCORRECT-PASSWORD';


    protected $language    = 'es-ES';
    protected $languageNew = 'en-GB';

    /**
     * Creates the application.
     *
     * @return
     */
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Setup for a testcase.
     */
    public function setUp(): void
    {
        parent::setUp();
//        Artisan::call('passport:install');
    }

    /**
     * Cleanup after a testcase.
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Called from different tests.
     */
    protected function getCsrfToken():void
    {
        /*
         * First we have to get the CSRF token.
         */
//        $response = $this->call('GET', self::route('login'), [], [], [], []);
        $response = $this->get(route('login'));
        if (preg_match('/<meta name="csrf-token" content="(.*)">/m', $response->getContent(), $token)) {
            $this->token = $token[1];
        } else {
            $this->fail('did not receive expected CSRF token');
        }
    }

    /**
     * Follow redirects.
     *
     * @param \Illuminate\Testing\TestResponse $response
     * @param int $limit
     * @param int $expected_status
     * @return \Illuminate\Testing\TestResponse
     */
    protected function followRedirects($response, $limit = 10, $expected_status = 200)
    {
        $counter = 0;
        while ($response->isRedirect()) {
            if (-1 != $limit && ++$counter > $limit) {
                $this->fail('number of redirects exceeded maximum of ' . $limit);
            }
            $response = $this->get($response->headers->get('Location'));
        }
        $response->assertStatus($expected_status);

        return $response;
    }

    /**
     * @param bool $do_csrf_and_check_result
     * @param $followRedirect
     * @return \Illuminate\Testing\TestResponse
     */
    protected function loginUser($do_csrf_and_check_result = true)
    {
        if ($do_csrf_and_check_result) {
            // get the csrf token
            $this->getCsrfToken();
        }

        // Login user
        $response = $this->post(route('login'), [
            '_token'   => $this->token,
            'email'    => $this->email,
            'password' => $this->password,
        ]);
        if ($do_csrf_and_check_result) {
            $response->assertStatus(302)
                     ->assertRedirect(route('login'));
        }

        return $response;
    }

    /**
     * Allow simulate a laravel dd() command without interrupt the tests
     *
     * ```
     * Use:
     *
     * $this->ddNoEXit('USER: ',$this->email, ' PASSWORD: ',$this->password);
     *
     * Returns:
     *
     * 'USER:'
     * owner@gmail.com
     * 'PASSWORD:'
     * owner@gmail.com
     * ```
     * @param mixed ...$args
     * @return void
     */
    protected function ddNoExit(...$args): void
    {
        foreach ($args as $arg) {
//            (new Dumper)->dump($x);
//            https://stackoverflow.com/questions/7493102/how-to-output-in-cli-during-execution-of-php-unit-tests
            fwrite(STDERR, var_export($arg, FALSE));
            fwrite(STDERR, "\n--------------------------------\n");
        }
    }
}
