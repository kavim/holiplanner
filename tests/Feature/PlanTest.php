<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlanTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public Collection $users;
    public Collection $plans;

    public function setUp(): void
    {
        parent::setUp();

        $this->users = User::factory()->count(4)->create();
        $this->plans = Plan::factory()->withParticipants($this->users->pluck('id')->toArray())->count(10)->create();

        $this->actingAs($this->users->first());
    }

    public function test_plan_show(): void
    {
        $this->getJson(route('plans.show', $this->plans->first()->id))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'date',
                    'location',
                    'participants',
                ]
            ]);
    }

    public function test_plan_index(): void
    {
        $response = $this->getJson(route('plans.index'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'date',
                        'location',
                        'participants',
                    ]
                ]
            ]);
    }

    public function test_plan_create(): void
    {
        $data = [
            'title'=> 'Test Plan',
            'description'=> 'Test Description',
            'date'=> '2021-10-10 10:00:00',
            'location'=> 'Test Location',
            'participants'=> $this->users->pluck('id')->toArray(),
        ];

        $this->postJson(route('plans.store', $data))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'date',
                    'location',
                    'participants',
                ]
            ]);

        $this->assertDatabaseHas('plans', [
            'title' => $data['title'],
            'description'=> $data['description'],
            'date'=> $data['date'],
            'location'=> $data['location'],
        ]);

        $this->assertDatabaseHas('plan_user', [
            'plan_id' => Plan::latest()->first()->id,
            'user_id' => $this->users->first()->id,
        ]);
    }

    public function test_plan_update_just_plan_data(): void
    {
        $data = [
            'title'=> 'Just the title will be updated',
        ];

        $this->putJson(route('plans.update', $this->plans->first()->id), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'date',
                    'location',
                    'participants',
                ]
            ]);

        $this->assertDatabaseHas('plans', [
            'title' => $data['title'],
        ]);
    }

    public function test_plan_update_the_participants(): void
    {
        $data = [
            'title'=> 'Also the title will be updated',
            'participants'=> [$this->users->first()->id],
        ];

        $this->putJson(route('plans.update', $this->plans->first()->id), $data)
            ->assertStatus(200);

        $this->assertDatabaseHas('plan_user', [
            'plan_id' => $this->plans->first()->id,
            'user_id' => $this->users->first()->id,
        ]);

        $this->assertDatabaseMissing('plan_user', [
            'plan_id' => $this->plans->first()->id,
            'user_id' => $this->users->last()->id,
        ]);
    }

    public function test_plan_delete(): void
    {
        $this->deleteJson(route('plans.destroy', $this->plans->first()->id))
            ->assertStatus(204);

        $this->assertDatabaseMissing('plans', [
            'id' => $this->plans->first()->id,
        ]);
    }

    public function test_generate_pdf(): void
    {
        $this->getJson(route('plans.pdf', $this->plans->first()->id))
            ->assertStatus(200)->assertHeader('Content-Type', 'application/pdf');
    }
}
