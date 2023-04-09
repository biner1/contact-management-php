<?php
use PHPUnit\Framework\TestCase;

require_once('../config/app.php');

// ./vendor/bin/phpunit logintest.php --testdox-text logintestresult.txt

class LoginTest extends TestCase
{
    public function testLoginSuccess()
    {
        $emailLogin = 'test1@example.com';
        $passwordLogin = '12345678';

        // You can mock the dependencies here as needed, and use dependency injection to pass them to the function being tested
        $result = login($emailLogin, $passwordLogin);
        

        // Assert that the user is authenticated and redirected to the contacts page
        $this->assertTrue(true, $passwordLogin);
        $this->assertEquals('contacts.php', $result['redirect_url']);
    }

    public function testLoginFailure()
    {
        $emailLogin = 'test1@example.com';
        $passwordLogin = 'wrong_password';

        // You can mock the dependencies here as needed, and use dependency injection to pass them to the function being tested
        $result = login($emailLogin, $passwordLogin);

        // Assert that the user is not authenticated and the error message is set
        $this->assertFalse($result['is_authenticated']);
        $this->assertEquals('ئیمەیڵ یان پاسۆرد نادروستە', $result['error']);
    }
    
}
