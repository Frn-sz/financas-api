
<?php test("create user", function () {
    $response = $this->post("/api/user/register", [
        "name" => "Fernando",
        "email" => "fernand2o@gmail.com",
        "password" => "fernando123",
        "password_confirmation" => "fernando123",
    ]);

    $response->assertStatus(201);
});
