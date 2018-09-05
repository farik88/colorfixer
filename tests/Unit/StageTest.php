<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Stage;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StageTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->seed();
    }

    public function testFindForCustomerByNumberShouldReturnCorrectData()
    {
        $stageExpected = Stage::with('attachments', 'car')->first();

        $stage = Stage::findForCustomerByNumber(
            $stageExpected->number,
            (object) ['car_id' => $stageExpected->car->id]
        );

        $this->assertEquals($stageExpected->id, $stage->id);
        $this->assertEquals($stageExpected->number, $stage->number);
        $this->assertArrayHasKey('attachments', $stage->toArray());
    }
}
