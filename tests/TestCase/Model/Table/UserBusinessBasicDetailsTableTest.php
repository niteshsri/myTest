<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserBusinessBasicDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserBusinessBasicDetailsTable Test Case
 */
class UserBusinessBasicDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserBusinessBasicDetailsTable
     */
    public $UserBusinessBasicDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_business_basic_details',
        'app.business_types',
        'app.users',
        'app.roles',
        'app.business_bank_details',
        'app.reset_password_hash',
        'app.user_address',
        'app.user_business_contact_details',
        'app.business_categories',
        'app.govt_identifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserBusinessBasicDetails') ? [] : ['className' => 'App\Model\Table\UserBusinessBasicDetailsTable'];
        $this->UserBusinessBasicDetails = TableRegistry::get('UserBusinessBasicDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserBusinessBasicDetails);

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
