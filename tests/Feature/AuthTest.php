<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected array $userData;

    protected function setUp(): void
    {
        parent::setUp();
        $this->migrateUsing();
        $this->userData = [
            'name' => 'Test User',
            'email' => 'test@email.com',
            'password' => '1232421312421',
            'password_confirmation' => '1232421312421',
        ];
    }

    /**
     * @test authorizationTest
     * A basic feature authorization test.
     */
    public function authorizationTest(): void
    {
        /**
         * Тестирование регистрации
         */
        // Кидаем POST запрос на регистрацию
        $response = $this->post('/register', $this->userData);

        // Ожидаем, что..
        $response->assertStatus(200); // Статус ответа будет 200-ый
        $this->assertAuthenticated(); // Авторизация
        $this->assertDatabaseCount('users', 1); // В Базе данных появится юзер (не обязательная проверка, тк есть еще уточняющая проверка ниже)
        $this->assertDatabaseHas('users', ['email' => $this->userData['email']]); // В базе данных будет именно тот юзер, данные которого мы отправляли

        // Получаем созданного через регистрацию пользователя для дальнейшего тестирования...
        $user = User::query()
            ->where('email', $this->userData['email'])
            ->first();

        /**
         * Тестирование выхода
         */
        // Кидаем POST запрос на выход
        $response = $this->post('/logout');
        // Ожидаем, что..
        $response->assertStatus(204); // Статус ответа 204-ый
        $this->assertGuest(); // Авторизации нет (гость)

        /**
         * Тестирование входа
         */
        // Кидаем POST запрос на логин
        $response = $this->post('/login', $this->userData);

        // Ожидаем, что..
        $response->assertStatus(200); // Статус ответа 200-ый
        $this->assertAuthenticated(); // Есть авторизация
        $this->assertAuthenticatedAs($user); // Есть авторизация за определенного пользователя
    }
}
