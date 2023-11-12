<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use App\Model\Table\UsersTable;
use App\Test\Factory\UserFactory;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use CakephpTestSuiteLight\Fixture\TruncateDirtyTables;

/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;
    use TruncateDirtyTables;

    private UsersTable $Users;

    public function setup(): void
    {
        parent::setUp();

        $this->Users = $this->getTableLocator()->get('Users');

        $this->enableCsrfToken();
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\UsersController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\UsersController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\UsersController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\UsersController::edit()
     */
    public function testEdit(): void
    {
        $user = UserFactory::make()->persist();
        $expectedName = 'name1';
        $data = [
            'name' => $expectedName,
        ];
        $this->post("/users/edit/{$user->id}", $data);
        $this->assertRedirect('/users');
        $actualUser = $this->Users->get($user->id);
        $this->assertSame($expectedName, $actualUser->name);
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\UsersController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
