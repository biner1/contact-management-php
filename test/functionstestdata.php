<?php

class FunctionsTestData{


    
    static public function userDataProvider()
    {
        return [
            ['test1@example.com', '12345678', true], // valid user
            ['test1@example.com', 'password2', false], //valid email, not password
            ['test3@example.com', 'password3', false], // valid password, not email
            ['test4@example.com', 'password4', false], // invalid email and password
        ];
    }

    static public function userSessionProvider()
    {
        return [
            [1],
            [2],
            [3]
        ];
    }

    static public function emailProvider()
    {
        return [
            ['test1@example.com', true], // existing user
            ['jane@example.com', false], // non-existing user
            ['jane', false], // invalid email format
            ['', false], // empty email
        ];
    }

    static public function loginValidationProvider()
    {
        return [
            // Valid input
            ['john@example.com', 'password123', []],

            // Empty email
            ['', 'password123', ['email' => 'خانەی ئیمەیڵ بەتاڵە']],

            // Invalid email
            ['notanemail', 'password123', ['email' => 'ئیمەیڵ گونجاو نیە']],

            // Empty password
            ['john@example.com', '', ['password' => 'پاسۆۆرد بەتاڵە']],

            // Short password
            ['john@example.com', 'short', ['password' => 'پاسۆرد کەمترە لە ٨ پیت']],
        ];
    }

    static public function signupValidationProvider()
    {
        return [
            // Valid input
            [
                'John Doe',
                'john@example.com',
                'password123',
                []
            ],
            // Empty name
            [
                '',
                'jane@example.com',
                'password123',
                ['name' => 'خانەی ناو بەتاڵە']
            ],
            // Invalid email format
            [
                'Jane Doe',
                'janeexample.com',
                'password123',
                ['email' => 'ئیمەیڵ گونجاو نیە']
            ],
            // Empty password
            [
                'John Smith',
                'johnsmith@example.com',
                '',
                ['password' => 'پاسۆۆرد بەتاڵە']
            ],
            // Password less than 8 characters
            [
                'Mary Johnson',
                'mary@example.com',
                '1234567',
                ['password' => 'پاسۆرد کەمترە لە ٨ پیت']
            ]
        ];
    }

    static public function emailValidationProvider()
    {
        return [    ['user@example.com', true],
        ['user+test@example.com', true],
        ['user.test@example.com', true],
        ['user123@example.com', true],
        ['user@example.co.uk', true],
        ['user@example.io', true],
        ['user@subdomain.example.com', true],
        ['user@127.0.0.1', false],
        ['user@[IPv6:::1]', false],
        ['user@.com', false],
        ['user@.example.com', false],
        ['user@example..com', false],
        ['user@example.-com', false],
        ['user@example.com-', false],
        ['user@.com.', false],
        ['user@[127.0.0.1]', true],
        ['user@[IPv6:0:0:0:0:0:0:1]', false],
       ];

    }

    static public function phoneNumbersProvider()
    {
        return [
            ['07701234567', true],
            ['+9647701234567', true],
            ['009647701234567', true],
            ['07901234567', true],
            ['+9647901234567', true],
            ['009647901234567', true],
            ['07501234567', true],
            ['+9647501234567', true],
            ['009647501234567', true],
            ['07801234567', true],
            ['+9647801234567', true],
            ['009647801234567', true],
            ['0712345678', false],
            ['+963123456789', false],
            ['00963123456789', false],
            ['+96512345678', false],
            ['0096512345678', false],
            ['+966123456789', false],
            ['00966123456789', false],
            ['+964612345678', false],
            ['00964612345678', false],
            ['+964128756473', false],
            ['00964128756473', false],
            ['+96401234567', false],
            ['0096401234567', false],
            ['+9637701234567', false],
            ['009637701234567', false],
            ['+964771234567', false],
            ['00964771234567', false],
            ['+9640801234567', false],
            ['00964801234567', false],
            ['+96577123456', false],
            ['0096577123456', false],
        ];
    }


}