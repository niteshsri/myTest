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
                ['action' => 'delete', $userEmailInvoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailInvoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Email Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmailInvoices form large-9 medium-8 columns content">
    <?= $this->Form->create($userEmailInvoice) ?>
    <fieldset>
        <legend><?= __('Edit User Email Invoice') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('amount');
            echo $this->Form->control('transcation_identifier');
            echo $this->Form->control('expiry_date');
            echo $this->Form->control('description');
            echo $this->Form->control('customer_name');
            echo $this->Form->control('customer_email');
            echo $this->Form->control('customer_phone');
            echo $this->Form->control('status');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
