<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function project_can_have_tasks()
    {
        $this->withoutExceptionHandling();

        
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $this->post($project->path() . "/tasks", ['body' => 'Test Task']);

        $this->get($project->path())
            ->assertSee('Test Task');

    }

    /** @test */
    public function only_owner_of_project_can_add_task()
    {

        // $this->withoutExceptionHandling();


        $this->signIn();

        $project = factory(Project::class)->create();

        $this->post($project->path() . "/tasks", ['body' => 'Test Task'])
            ->assertStatus(403);

        /** to be sure that the application did not created the task */
        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task']);
    }

    /** @test */
    public function task_requires_a_body()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            factory(Project::class)->raw()
        );


        $attributes = factory('App\Task')->raw(['body'=>'']);


        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            factory(Project::class)->raw()
        );

        $task = $project->addTask('test task');

        $this->patch($task->path(), [
            'body' => 'Changed',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'Changed',
            'completed' => true
        ]);

    }

    /** @test */
public function only_owner_of_project_can_update_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $task = $project->addTask('test task');

        $this->patch($task->path(), [
            'body' => 'Changed'
        ])->assertStatus(403);

    }

}
