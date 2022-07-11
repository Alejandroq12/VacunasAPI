<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PopulationTest extends TestCase
{

    //verify routes
    public function test_if_route_exists_and_exact_cuantity()
    {

        $this->get("/api/populations")
            ->assertOk(); //200
        //->assertJsonCount(14);
        $this->get("/api/non-exiting-route")->assertNotFound(); //404

    }

    public function test_if_given_data_is_equal()
    {

        $this->get("/api/population/1")
            ->assertOk() //correct status
            ->assertJsonCount(8) //number of data
            ->assertJson(function (AssertableJson $json) {
                return $json
                    ->where("states", "Ahuachapán") //in states it has ahuachapan
                    ->where("total_population", 360380) //in total_population has 360380
                    ->etc();
            });
    }

    // public function test_if_data_is_created()
    // {
    //     $formField = [
    //         "states" => "False_State",
    //         "total_population" => 300,
    //         "unvaccinated_population" => 200,
    //         "vaccinated_population" => 100,
    //     ];

    //     $this->postJson("/api/population", $formField)
    //         ->assertCreated() //201
    //         ->assertJsonCount(3)
    //         ->assertJson(function (AssertableJson $json) {
    //             return $json->where("details.states", "False_State") //in states it has False_State
    //                 ->where("details.total_population", 300) //in total_population has 300
    //                 ->etc();
    //         });
    // }

    // public function test_if_data_is_modified(){

    //     $formField = [
    //         "states" => "False_State_Modified",
    //         "total_population" => 3000,
    //         "unvaccinated_population" => 2000,
    //         "vaccinated_population" => 1000,
    //     ];

    //     $this->putJson("/api/population/25",$formField)
    //     ->assertStatus(202)
    //     ->assertJsonCount(3)
    //     ->assertJson(function(AssertableJson $json){
    //         return $json->where("details.states","False_State_Modified") //in states it has False_State
    //         ->where("details.total_population",3000) //in total_population has 300
    //         ->etc();
    //     });

    //  }


    // public function test_if_data_is_deleted_successfully(){
    //     $this->deleteJson("/api/population/25")
    //     ->assertOk() //200
    //     ->assertJsonCount(2)
    //     ->assertJson([
    //         "status" => 200,
    //         "response" => "Register was succesfully deleted"
    //     ]);

    // }

    // public function test_if_data_cannot_be_deleted_assert_true(){
    //     $this->deleteJson("/api/population/24")
    //         ->assertNotFound() //404
    //         ->assertJsonCount(2)
    //         ->assertJson([
    //             "status" => 404,
    //             "response" => "Register was not found"
    //         ]);
    // }

    public function test_if_filter_data_was_found_assert_true()
    {
        $this->getJson("/api/population/states/Cabañas")
            ->assertOk() //200
            ->assertJsonCount(8, 0)
            ->assertJson(function (AssertableJson $json) {
                return $json
                    ->where("0.id", 9)
                    ->where("0.total_population", 153985)
                    ->etc();
            });
    }
}
