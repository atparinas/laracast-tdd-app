<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /** @test */
    public function guest_cannot_create_project()
    {

        // $attributes = factory('App\Project')->raw(['owner_id' => null]);

        // $this->post('/projects', $attributes)->assertSessionHasErrors('owner_id');

        /**
         * Tweaking the above code. Instead of requiring owner_id,
         * requires redirect if the user is not signin and tries to create a project
         */

        $attributes = factory('App\Project')->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');


    }

    /** @test */
    public function guest_cannot_view_projects()
    {

        $this->get('/projects')->assertRedirect('login');

    }

    /** @test */
    public function guest_cannot_view_single_project()
    {

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertRedirect('login');

    }

    /** @test */
    public function a_user_can_create_a_project()
    {

        /**
         * will disable Laravel graceful error handling.
         * Good to disable in the Test Class
         */
        $this->withoutExceptionHandling();

        /**
         * This will simulate an authenticated user
         */

        $user =factory('App\User')->create();
        $this->actingAs($user);
 

        $attributes = factory('App\Project')->raw(['owner_id' => $user->id]);
        
        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);

    }

    /** @test */
    public function a_user_can_view_their_project()
    {
        // $this->withoutExceptionHandling();
        $user = factory('App\User')->create();
        $this->actingAs($user);


        $project = factory('App\Project')->create(['owner_id' => $user->id]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }


    /** @test */
    public function a_user_cannot_view_projects_of_others()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());


        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
       
    }


     /** @test */
     public function a_project_requires_a_title()
     {
          /**
         * This will simulate an authenticated user
         */
        $this->actingAs(factory('App\User')->create());


         /**
          * Raw will build the attribute but store in array
          */
         $attributes = factory('App\Project')->raw(['title'=>'']);

         $this->post('/projects', $attributes)->assertSessionHasErrors('title');
     }

       /** @test */
       public function a_project_requires_a_description()
       {

            /**
             * This will simulate an authenticated user
             */
            $this->actingAs(factory('App\User')->create());


            $attributes = factory('App\Project')->raw(['description'=>'']);


            $this->post('/projects', $attributes)->assertSessionHasErrors('description');
       }

        
}
