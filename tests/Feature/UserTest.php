<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test adding a new user.
     *
     * @return void
     */
    public function testAddUser()
    {
        // Assure la base de données est vide avant de commencer le test.
        $this->assertEmpty(User::all());

        // Les données du nouvel utilisateur à ajouter.
        $userData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123', // Vous pouvez utiliser un mot de passe approprié ici.
        ];

        // Appelle la route pour ajouter un nouvel utilisateur en utilisant le UserController.
        $response = $this->post('/api/users', $userData);

        // Vérifie que la réponse a un code de statut HTTP 201 (créé avec succès).
        $response->assertStatus(201);

        // Vérifie que l'utilisateur a bien été ajouté à la base de données.
        $this->assertCount(1, User::all());

        // Vérifie que les détails de l'utilisateur ajouté correspondent à ceux fournis.
        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
    }
}
