<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Transaction'), ['action' => 'edit', $userTransaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Transaction'), ['action' => 'delete', $userTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTransaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userTransactions view large-9 medium-8 columns content">
    <h3><?= h($userTransaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userTransaction->has('user') ? $this->Html->link($userTransaction->user->id, ['controller' => 'Users', 'action' => 'view', $userTransaction->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($userTransaction->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transcation Identifier') ?></th>
            <td><?= h($userTransaction->transcation_identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userTransaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Email Invoice Id') ?></th>
            <td><?= $this->Number->format($userTransaction->user_email_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userTransaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userTransaction->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $userTransaction->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $userTransaction->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
