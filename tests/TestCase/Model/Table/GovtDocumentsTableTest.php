<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GovtDocumentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GovtDocumentsTable Test Case
 */
class GovtDocumentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GovtDocumentsTable
     */
    public $GovtDocuments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.govt_documents',
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
        $config = TableRegistry::exists('GovtDocuments') ? [] : ['className' => 'App\Model\Table\GovtDocumentsTable'];
        $this->GovtDocuments = TableRegistry::get('GovtDocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GovtDocuments);

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
}
