<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TypeOfVaccineTest extends TestCase
{

    public function test_if_routes_exists_assert_ok()
    {
        $this->get("/api/vaccines")
            ->assertOk(); //200
    }

    public function test_if_specific_data_is_received()
    {
        $this->getJson("/api/vaccines/2")
            ->assertOk() //200
            ->assertJsonCount(8)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->whereContains("vaccine_name", "Pfizer") //where
                    ->whereContains("vaccine_type", "ARN") //where
                    ->etc()
            );
    }

    // public function test_if_vaccine_is_created_successfully()
    // {

    //     $formField = [
    //         "vaccine_name" => "False_vaccine_name",
    //         "available_quantity" => 4000,
    //         "vaccine_type" => "ARN",
    //         "vaccine_creator" => "faker_kevin"
    //     ];

    //     $this->postJson("/api/vaccines", $formField)
    //         ->assertCreated() //201
    //         ->assertJsonCount(3) //the first array has 3 elements
    //         ->assertJsonCount(7, "details") //the nested array in details key has 8 elements
    //         ->assertJson(
    //             fn (AssertableJson $json) =>
    //             $json
    //                 ->whereContains("status", 201)
    //                 ->whereContains("details.vaccine_name", "False_vaccine_name") //where
    //                 ->whereContains("details.vaccine_type", "ARN") //where
    //                 ->whereContains("details.vaccine_creator", "faker_kevin") //where
    //                 ->whereContains("details.available_quantity", 4000)
    //                 ->etc()
    //         );
    // }

    // public function test_if_vaccine_has_been_modified()
    // {
    //     $formField = [
    //         "vaccine_name" => "False_vaccine_name_Modified",
    //         "available_quantity" => 2000,
    //         "vaccine_type" => "Muerta",
    //         "vaccine_creator" => "faker_kevin_modified"
    //     ];

    //     $this->putJson("/api/vaccines/16", $formField)
    //         ->assertStatus(202) //202
    //         ->assertJsonCount(3)
    //         ->assertJson(
    //             fn (AssertableJson $json) =>
    //             $json
    //                 ->whereContains("status", 202)
    //                 ->whereContains("details.vaccine_name", "False_vaccine_name_Modified") //where
    //                 ->whereContains("details.vaccine_type", "Muerta") //where
    //                 ->whereContains("details.vaccine_creator", "faker_kevin_modified") //where
    //                 ->whereContains("details.available_quantity", 2000)
    //                 ->etc()
    //         );
    // }

    // public function test_if_vaccine_is_deleted_successfully()
    // {
    //     $this->deleteJson("/api/vaccines/16")
    //         ->assertOk() //200
    //         ->assertJsonCount(2)
    //         ->assertJson([
    //             "status" => 200,
    //             "response" => "Register was succesfully deleted"
    //         ]);
    // }

    // public function test_if_vaccine_cannot_be_deleted_or_found()
    // {
    //     $this->deleteJson("/api/vaccines/15")
    //         ->assertNotFound() //404
    //         ->assertJsonCount(2)
    //         ->assertJson([
    //             "status" => 404,
    //             "response" => "Register was not found"
    //         ]);
    // }

    // public function test_if_filter_returns_a_vaccine()
    // {
    //     $this->getJson("/api/vaccines/types/Moderna")
    //         ->assertOk() //200
    //         ->assertJsonCount(8, 0)
    //         ->assertJson(
    //             fn (AssertableJson $json) =>
    //             $json
    //                 ->where("0.id", 4)
    //                 ->where("0.available_quantity", 250000)
    //                 ->where("0.vaccine_type", "ARN")
    //                 ->where("0.vaccine_creator", "Moderna")
    //         );
    // }
}
