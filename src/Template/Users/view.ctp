<?php
$userProfile = $userData;
$userAddress = $userData->user_address[0];
?>
<div class="row">
  <div class="col">
    <ol class="breadcrumb breadcrumb-default icon-grid icon-angle-double-right">
      <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard'])?>">Dashboard</a>
        <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit'])?>">Profile</a>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="#" class="nav-link active" data-toggle="tab" data-target="#default-tabs-0-1">Profile</a>
          </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="default-tabs-0-1">
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('first_name', __('First Name'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('first_name', ['value'=>$userProfile->first_name,'class' => 'col-md-8', 'disabled'=>'disabled']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('last_name', __('Last Name'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('last_name', ['value'=>$userProfile->last_name,'class' => 'col-md-8','label' => false, 'disabled'=>'disabled']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('email', __('Email'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('email', ['value'=>$userProfile->email,'class' => 'col-md-8', 'disabled'=>'disabled']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('phone', __('Phone'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('phone', ['value'=>$userProfile->phone,'class' => 'col-md-8','label' => false, 'disabled'=>'disabled']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('pan_number', __('Pan Number'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('pan_number', ['value'=>$userProfile->pan_number,'class' => 'col-md-8', 'disabled'=>'disabled']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('adhaar_number', __('Adhaar Number'), ['class' => [ 'control-label col-md-4']]); ?>
                  <?= $this->Form->text('adhaar_number', ['value'=>$userProfile->adhaar_number,'class' => 'col-md-7','label' => false, 'disabled'=>'disabled']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <?= $this->Form->label('address1', __('Address'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('address1', ['value'=>$userAddress->address1,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Address', 'disabled'=>'disabled']); ?>
                </div>
              </div>
              <?php  if($userAddress->address2){?>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->Input('address2', ['value'=>$userAddress->address2,'class' => 'form-control col-md-12', 'label' => false,'disabled'=>'disabled']); ?>
                  </div>
                </div>
              <?php }?>

              <div class="form-group row">
                <div class="col-md-3">
                  <?= $this->Form->label('pin_code', __('Pin Code'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('pin_code', ['value'=>$userAddress->zip,'class' => '', 'label' => false, 'placeholder' => 'Please enter Pin Code', 'disabled'=>'disabled']); ?>
                </div>
                <div class="col-md-3">
                  <?= $this->Form->label('country', __('Country'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('country', ['value'=>$userAddress->country,'class' => '', 'label' => false, 'placeholder' => 'Please enter Country','disabled'=>'disabled']); ?>
                </div>
                <div class="col-md-3">
                  <?= $this->Form->label('city', __('City'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('city', ['value'=>$userAddress->city,'class' => '', 'label' => false, 'placeholder' => 'Please enter City','disabled'=>'disabled']); ?>
                </div>
                <div class="col-md-3">
                  <?= $this->Form->label('state', __('State'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('state', ['value'=>$userAddress->state,'class' => '', 'label' => false, 'placeholder' => 'Please enter State','disabled'=>'disabled']); ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
