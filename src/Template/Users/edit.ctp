<?php
$userProfile = $userData;
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
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="tab" data-target="#default-tabs-0-2">Business</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="tab" data-target="#default-tabs-0-3">Bank</a>
          </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="default-tabs-0-1">
              <?= $this->Form->create(null,['url'=>'#']); ?>
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('first_name', __('First Name'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('first_name', ['value'=>$userProfile->first_name,'class' => 'col-md-8', 'required'=>'required']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('last_name', __('Last Name'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('last_name', ['value'=>$userProfile->last_name,'class' => 'col-md-8','label' => false, 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('email', __('Email'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('email', ['value'=>$userProfile->email,'class' => 'col-md-8', 'required'=>'required']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('phone', __('Phone'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('phone', ['value'=>$userProfile->phone,'class' => 'col-md-8','label' => false, 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('pan_number', __('Pan Number'), ['class' => [ 'control-label col-md-3']]); ?>
                  <?= $this->Form->text('pan_number', ['value'=>$userProfile->pan_number,'class' => 'col-md-8', 'required'=>'required']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('adhaar_number', __('Adhaar Number'), ['class' => [ 'control-label col-md-4']]); ?>
                  <?= $this->Form->text('adhaar_number', ['value'=>$userProfile->adhaar_number,'class' => 'col-md-7','label' => false, 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <?= $this->Form->label('address1', __('Address'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('address1', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Address', 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <?= $this->Form->Input('address2', ['class' => 'form-control col-md-12', 'label' => false]); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <?= $this->Form->label('pin_code', __('Pin Code'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('pin_code', ['class' => '', 'label' => false, 'placeholder' => 'Please enter First Name', 'required'=>'required']); ?>
                </div>
                <div class="col-md-3">
                  <?= $this->Form->label('country', __('Country'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('country', ['class' => '', 'label' => false, 'placeholder' => 'Please enter Last Name']); ?>
                </div>
                <div class="col-md-3">
                  <?= $this->Form->label('city', __('City'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('city', ['class' => '', 'label' => false, 'placeholder' => 'Please enter Middle Name']); ?>
                </div>
                <div class="col-md-3">
                  <?= $this->Form->label('state', __('State'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('state', ['class' => '', 'label' => false, 'placeholder' => 'Please enter Last Name']); ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
