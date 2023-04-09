<?php 

use PHPUnit\Framework\TestCase;

require_once('../config/app.php');
require_once('functionstestdata.php');


// ./vendor/bin/phpunit functionsTest.php --testdox-text functiontestresult.txt

class FunctionsTest extends TestCase{
    
    public function testSanitize()
    {
        $tests = [
            ['input' => 'Test 1', 'expected' => 'Test 1'],
            ['input' => 'Test <script>alert("xss");</script>', 'expected' => 'Test alert(&#34;xss&#34;);'],
            ['input' => 123, 'expected' => '123'],
            ['input' => '', 'expected' => ''],
            ['input' => null, 'expected' => ''],
            ['input' => false, 'expected' => '']
        ];

        foreach ($tests as $test) {
            $input = $test['input'];
            $expected = $test['expected'];

            $this->assertEquals($expected, sanitize($input));
        }
    }

    public function testIsPost()
    {
        // Define test data as an array of HTTP methods and expected results
        $testData = [
            ['method' => 'POST', 'expected' => true],
            ['method' => 'GET', 'expected' => false],
            ['method' => 'PUT', 'expected' => false],
            ['method' => 'DELETE', 'expected' => false],
            // Add more test cases here
        ];

        // Loop through the test data array and test the is_post() function for each case
        foreach ($testData as $data) {
            $_SERVER['REQUEST_METHOD'] = $data['method'];
            $this->assertEquals($data['expected'], is_post());
        }
    }

    public function testIsGet()
    {
        // Define test data as an array of HTTP methods and expected results
        $testData = [
            ['method' => 'POST', 'expected' => false],
            ['method' => 'GET', 'expected' => true],
            ['method' => 'PUT', 'expected' => false],
            ['method' => 'DELETE', 'expected' => false],
            // Add more test cases here
        ];

        // Loop through the test data array and test the is_post() function for each case
        foreach ($testData as $data) {
            $_SERVER['REQUEST_METHOD'] = $data['method'];
            $this->assertEquals($data['expected'], is_get());
        }
    }

    public function testIsUserAuthenticated() {
        $testCases = array(
            array('session' => array(), 'expected' => false),
            array('session' => array('id' => 1), 'expected' => true),
            array('session' => array('name' => 'John'), 'expected' => false),
            array('session' => null, 'expected' => false)
        );

        foreach ($testCases as $testCase) {
            $_SESSION = $testCase['session'];
            $expectedResult = $testCase['expected'];
            $this->assertEquals($expectedResult, is_user_authenticated());
        }
    }


  /**
     * @dataProvider FunctionsTestData::userDataProvider
     */
    public function testAuthenticateUser($email, $password, $expected)
    {
        $result = authenticate_user($email, md5($password));
        $this->assertEquals($expected, $result);
    }
    

     /**
     * @dataProvider FunctionsTestData::userSessionProvider
     */
    public function testGetLoggedInUser($userId)
    {
        $_SESSION['id'] = $userId;
        $this->assertEquals($userId, get_logged_in_user());
    }


     /**
     * @dataProvider FunctionsTestData::emailProvider
     */
    public function testIsUserExists($email, $expected)
    {
        $this->assertEquals($expected, is_user_exists($email));
    }


/**
     * @dataProvider FunctionsTestData::loginValidationProvider
     */
    public function testValidateLoginInputs($emailLogin, $passwordLogin, $expectedErrors)
    {
        $this->assertEquals($expectedErrors, validate_login_inputs($emailLogin, $passwordLogin));
    }


    
    /**
     * @dataProvider FunctionsTestData::signupValidationProvider
     */
    public function testValidateSignupInputs($name, $email, $password, $expectedErrors)
    {
        $errors = validate_signup_inputs($name, $email, $password);
        $this->assertEquals($expectedErrors, $errors);
    }

    /**
     * @dataProvider FunctionsTestData::phoneNumbersProvider
     */
    public function testIsIraqiPhoneNumber($phone, $expectedResult)
    {
        $this->assertEquals($expectedResult, is_iraqi_phone_number($phone));
    }


    /**
     * @dataProvider FunctionsTestData::emailValidationProvider
     */
    public function testEmailValidation($email, $expected) {
        $this->assertEquals($expected, is_valid_email($email));
    }

}