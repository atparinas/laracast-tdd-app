<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facades\Tests\Setup\ProjectFactory;

class ActivityFeedTest extends TestCase
{

    use RefreshDatabase;
    
    /** @test */
    public function creating_a_project_records_activity()
    {
        $project = ProjectFactory::create();

        $this->assertCount(1, $project->activity);

        $this->assertEquals('project_created', $project->activity[0]->description);
    }


    /** @test */
    public function updating_a_project_records_activity()
    {
        $project = ProjectFactory::create();

        $project->update(['title' => 'updated']);

        $this->assertCount(2, $project->activity);
    }

      /** @test */
      public function creating_a_new_task_records_activity()
      {
          $project = ProjectFactory::create();
  
          $project->addTask('Some Task');
  
          $this->assertCount(2, $project->activity);
          $this->assertEquals('task_created', $project->activity->last()->description);
      }

      
      /** @test */
      public function completing_a_new_task_records_activity()
      {
            $project = ProjectFactory::withTasks(1)->create();
            
            $this->actingAs($project->owner)
                    ->patch($project->tasks[0]->path(), [
                        'body' => 'update',
                        'completed' => true
                    ]);
                
            // dd($project->activity);

            $this->assertCount(3, $project->activity);
      }
}
