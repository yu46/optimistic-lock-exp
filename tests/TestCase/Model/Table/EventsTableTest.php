<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Entity\Event;
use App\Model\Table\EventsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsTable Test Case
 */
class EventsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsTable
     */
    protected $Events;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Events',
        'app.EventDates',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Events') ? [] : ['className' => EventsTable::class];
        $this->Events = $this->getTableLocator()->get('Events', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Events);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EventsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testPatchAdminAddEntity(): void
    {
        $entity = new Event();
        $data = [
            'name' => 'event_name',
            'event_dates' => [
                ['date' => 'a'],
            ],
        ];
        $patchEntity = $this->Events->patchEntity($entity, $data, ['validate' => false]);
        $this->assertNotSame(null, $patchEntity->event_dates);

        $entity = new Event();
        $patchEntity = $this->Events->patchAdminAddEntity($entity, $data);
        $this->assertSame(null, $patchEntity->event_dates);
    }
}
