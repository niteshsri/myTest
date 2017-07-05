<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
    $table = $this->table('users');
    $table->addColumn('first_name', 'string', [
      'default' => null,
      'limit' => 255,
      'null' => false,
    ]);
    $table->addColumn('last_name', 'string', [
      'default' => null,
      'limit' => 255,
      'null' => true,
    ]);
    $table->addColumn('email', 'string', [
      'default' => null,
      'limit' => 255,
      'null' => false,
    ]);
    $table->addColumn('username', 'string', [
      'default' => null,
      'limit' => 255,
      'null' => false,
    ]);
    $table->addColumn('role_id', 'integer', [
      'default' => 2,
      'limit' => 11,
      'null' => false,
    ]);
    $table->addColumn('phone', 'string', [
      'default' => null,
      'limit' => 15,
      'null' => true,
    ]);
    $table->addColumn('password', 'string', [
      'default' => null,
      'limit' => 255,
      'null' => false,
    ]);
    $table->addColumn('status', 'boolean', [
      'default' => null,
      'null' => true,
    ]);
    $table->addColumn('is_individual', 'boolean', [
      'default' => 0,
      'null' => false,
    ]);
    $table->addColumn('is_verified', 'boolean', [
      'default' => null,
      'null' => true,
    ]);
    $table->addColumn('is_approved', 'boolean', [
      'default' => null,
      'null' => true,
    ]);
    $table->addColumn('is_deleted', 'datetime', [
      'default' => null,
      'null' => true,
    ]);
    $table->addColumn('remark', 'text', [
      'default' => null,
      'null' => true,
    ]);
    $table->addColumn('approved_by', 'integer', [
      'default' => null,
      'limit' => 11,
      'null' => true,
    ]);
    $table->addColumn('last_modified_by', 'integer', [
      'default' => null,
      'limit' => 11,
      'null' => true,
    ]);
    $table->addColumn('account_number', 'string', [
        'default' => null,
        'limit' => 10,
        'null' => true,
    ]);
    $table->addColumn('profile_img_name', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => true,
    ]);
    $table->addColumn('profile_img_path', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => true,
    ]);
    $table->addColumn('pan_number', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => false,
    ]);
    $table->addColumn('adhaar_number', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => false,
    ]);
    $table->addColumn('pan_img_name', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => true,
    ]);
    $table->addColumn('pan_img_path', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => true,
    ]);
    $table->addColumn('adhaar_img_name', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => true,
    ]);
    $table->addColumn('adhaar_img_path', 'string', [
        'default' => null,
        'limit' => 255,
        'null' => true,
    ]);
    $table->addColumn('uuid', 'uuid', [
      'default' => null,
      'null' => true,
    ]);
    $table->addColumn('created', 'datetime', [
      'default' => null,
      'null' => false,
    ]);
    $table->addColumn('modified', 'datetime', [
      'default' => null,
      'null' => false,
    ]);
    $table->addIndex([
      'email',
    ], [
      'name' => 'UNIQUE_EMAIL',
      'unique' => true,
    ]);
    $table->addIndex([
      'username',
    ], [
      'name' => 'UNIQUE_USERNAME',
      'unique' => true,
    ]);
    $table->create();
  }
}
