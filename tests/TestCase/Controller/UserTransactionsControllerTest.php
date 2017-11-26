<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UserTransactionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UserTransactionsController Test Case
 */
class UserTransactionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_transactions',
        'app.users',
        'app.roles',
        'app.business_bank_details',
        'app.user_business_basic_details',
        'app.business_types',
        'app.business_categories',
        'app.govt_documents',
        'app.user_business_contact_details',
        'app.reset_password_hash',
        'app.user_address'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
