<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\NotificationComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\NotificationComponent Test Case
 */
class NotificationComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\NotificationComponent
     */
    protected $Notification;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Notification = new NotificationComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Notification);

        parent::tearDown();
    }
}
