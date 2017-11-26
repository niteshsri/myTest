<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userTransaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userTransaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($userTransaction) ?>
    <fieldset>
        <legend><?= __('Edit User Transaction') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('user_email_invoice_id');
            echo $this->Form->control('amount');
            echo $this->Form->control('transcation_identifier');
            echo $this->Form->control('status');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
