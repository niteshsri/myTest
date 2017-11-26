<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Email Invoice'), ['action' => 'edit', $userEmailInvoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Email Invoice'), ['action' => 'delete', $userEmailInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailInvoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Email Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userEmailInvoices view large-9 medium-8 columns content">
    <h3><?= h($userEmailInvoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userEmailInvoice->has('user') ? $this->Html->link($userEmailInvoice->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailInvoice->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($userEmailInvoice->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transcation Identifier') ?></th>
            <td><?= h($userEmailInvoice->transcation_identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Name') ?></th>
            <td><?= h($userEmailInvoice->customer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Email') ?></th>
            <td><?= h($userEmailInvoice->customer_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Phone') ?></th>
            <td><?= h($userEmailInvoice->customer_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userEmailInvoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry Date') ?></th>
            <td><?= h($userEmailInvoice->expiry_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userEmailInvoice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userEmailInvoice->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $userEmailInvoice->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $userEmailInvoice->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($userEmailInvoice->description)); ?>
    </div>
</div>
