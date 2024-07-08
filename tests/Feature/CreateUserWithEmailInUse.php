<?php

test('create user with email already used', function () {

    $response = $this->post(
        '/api/user/register',
        [
            "name" => "test",
            "email" => "test@mail.com",
            "password" => "123",
            "password_confirmation" => "123"
        ]
    );

    $response->assertStatus(200);
});
