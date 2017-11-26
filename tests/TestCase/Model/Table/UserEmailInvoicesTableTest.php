<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserEmailInvoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserEmailInvoicesTable Test Case
 */
class UserEmailInvoicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserEmailInvoicesTable
     */
    public $UserEmailInvoices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_email_invoices',
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserEmailInvoices') ? [] : ['className' => 'App\Model\Table\UserEmailInvoicesTable'];
        $this->UserEmailInvoices = TableRegistry::get('UserEmailInvoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserEmailInvoices);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
