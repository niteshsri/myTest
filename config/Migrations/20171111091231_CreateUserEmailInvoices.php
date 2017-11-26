<?php
use Migrations\AbstractMigration;

class CreateUserEmailInvoices extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('user_email_invoices');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('amount', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('user_transaction_id', 'integer', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('expiry_date', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('customer_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('customer_email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('customer_phone', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('status', 'boolean', [
            'default' => 1,
            'null' => true,
        ]);
        $table->addColumn('is_deleted', 'boolean', [
            'default' => 0,
            'null' => true,
        ]);
         $table->addColumn('is_expired', 'boolean', [
            'default' => 0,
            'null' => true,
        ]);
        $table->addColumn('uuid', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
