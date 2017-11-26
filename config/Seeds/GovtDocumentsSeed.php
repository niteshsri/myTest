<?php
use Phinx\Seed\AbstractSeed;

/**
 * Roles seed.
 */
class GovtDocumentsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    [ 'name'    => 'Certificate of Incorporation',
                      'label'   =>'registration_certificate',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),
                    ],
                    [ 'name'    => 'Shareholder\'s Agreement or Partnership Agreement',
                      'label'   =>'partnership_agreement',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),
                    ]
        ];

        $table = $this->table('govt_documents');
        $table->insert($data)->save();
    }
}
