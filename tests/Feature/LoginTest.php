<?php

test('the application returns an error response if credentials are incorrect', function () {
    $response = $this->post('/api/login', [
        'email' => 'wrong@email.lv',
        'password' => 'wrong',
    ]);

    $response->assertStatus(401);
    $response->assertExactJson([
        'message' => 'Invalid credentials',
    ]);
})->only();
