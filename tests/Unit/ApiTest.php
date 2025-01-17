<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;
use Tests\TestCase;


class ApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     *  Testisting function create an Author
     * @return void
     */
    public function test_it_can_get_a_list_of_authors():void
    {
        Author::factory()->count(3)->create();

        $response = $this->getJson('authors');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }
    public function test_it_can_create_a_new_author():void
    {
        $data = [
            'name' => 'Pablo Neruda',
            'nationality' => 'Chileno',
            'birthdate' => '1904-07-12',
        ];

        $response = $this->postJson('authors', $data);

        $response->assertStatus(200)
                 ->assertJsonPath('data.name', 'Pablo Neruda');

        $this->assertDatabaseHas('authors', $data);
    }

    public function test_it_can_update_an_author():void
    {
        $author = Author::factory()->create();

        $updatedData = [
            'name' => 'Pablo Neruda - Ricardo Eliécer Neftalí Reyes Basoalto'
        ];

        $response = $this->putJson("authors/{$author->id}", $updatedData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('authors', $updatedData);
    }

    public function test_it_can_delete_an_author():void
    {
        $author = Author::factory()->create();

        $response = $this->deleteJson("authors/{$author->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    /**
     * A basic unit test example.
     */
    /*
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
        */

}
