<?php
// pr($govtDocs);die;
$userProfile = $userData;
$updateUserAddress = $this->Url->build('/update_user_address',true);
$updateBusinessDetails = $this->Url->build('/update_business_detail',true);
$updateBankDetails = $this->Url->build('/update_bank_detail',true);
$activeTab = 'address';
if($userData->user_address){
  if(!$userProfile->is_individual){
    $activeTab = 'business';
  }else{
    $activeTab = 'bank';
  }
}
if($userData->user_business_basic_details){
  $activeTab = 'bank';
}
?>
<div class="row">
  <div class="col">
    <!-- jumbotron-1 -->
    <div class="jumbotron jumbotron-1">
      <div class="container-fluid">
        <div class="row">
          <div class="alert alert-secondary col-md-12 text-center" role="alert">
          We require some more information to process your application, Kindly provide valid information.
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($activeTab == 'address')?'active':'';?>" data-toggle="tab" data-target="#default-tabs-0-1">Address</a>
        </li>
         <?php if( !$userProfile->is_individual ){?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php echo ($activeTab == 'business')?'active':'';?>" data-toggle="tab" data-target="#default-tabs-0-2">Business</a>
          </li>
          <?php } ?> 
            <li class="nav-item">
              <a href="#" class="nav-link <?php echo ($activeTab == 'bank')?'active':'';?>" data-toggle="tab" data-target="#default-tabs-0-3">Bank</a>
            </li>
          </ul>
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane <?php echo ($activeTab == 'address')?'active':'';?>" id="default-tabs-0-1">
                <?= $this->Form->create(null,['url'=>$updateUserAddress,'enctype'=>"multipart/form-data"]); ?>
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
                  <div class="col-md-6">
                    <?= $this->Form->input('pan_image_name',['accept'=>"image/*",'label'=>['text'=>'Pan Image','class'=>'col-sm-3'],'class' => ['col-sm-8'],'type' => "file",'required'=>'required'] ); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->input('adhaar_image_name', ['accept'=>"image/*",'label' => ['text'=>'Pan Image','class'=>'col-sm-3'],'class' => ['col-sm-8'],'type' => "file",'required'=>'required'] ); ?>
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

                <div class="text-center">
                  <button class="btn btn-success">Register</button>
                  <button class="btn btn-default">Cancel</button>
                </div>
              </form>
            </div>
            <?php if( !$userProfile->is_individual ){?>
              <div role="tabpanel" class="tab-pane <?php echo ($activeTab == 'business')?'active':'';?>" id="default-tabs-0-2">
                <?= $this->Form->create(null,['url'=>$updateBusinessDetails,'enctype'=>"multipart/form-data"]); ?>
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('business_type', __('business Type'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->select('business_type', $businessType, ['default' => 'individual', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('business_category', __('Business Category'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->select('business_category', $businessCat, ['default' => 'individual', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 col-md-offset-2">
                    <?= $this->Form->label('entity_name', __('Legal Entity Name'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('entity_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Legal Entity Name', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->label('website_url', __('Website Url'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('website_url', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Website Url', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <?= $this->Form->label('govt_document_id', __('Business Document'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->select('govt_document_id', $govtDocs, ['required'=>'required']); ?>
                  </div>
                  <div class="col-md-2">
                    &nbsp;
                  </div>
                  <div class="col-md-4">
                      <?= $this->Form->input('govt_id_img_name',['accept'=>"image/*",'label'=>['text'=>'Upload Document','class'=>'col-sm-6'],'class' => ['col-sm-8'],'type' => "file",'required'=>'required'] ); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <?= $this->Form->label('business_pan_card', __('Pan Card Number'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_pan_card', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Pan Card Number', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-2">
                    &nbsp;
                  </div>
                  <div class="col-md-4">
                      <?= $this->Form->input('pan_img_name',['accept'=>"image/*",'label'=>['text'=>'Business Pan Image','class'=>'col-sm-6'],'class' => ['col-sm-8'],'type' => "file",'required'=>'required'] ); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->label('business_address1', __('Business Address'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_address1', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Business Address', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->Input('business_address2', ['class' => 'form-control col-md-12', 'label' => false]); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                    <?= $this->Form->label('business_pin_code', __('Pin Code'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_pin_code', ['class' => '', 'label' => false, 'placeholder' => 'Please enter First Name', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('business_country', __('Country'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_country', ['class' => '', 'label' => false, 'placeholder' => 'Please enter Country', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('business_city', __('City'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_city', ['class' => '', 'label' => false, 'placeholder' => 'Please enter City', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('business_state', __('State'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_state', ['class' => '', 'label' => false, 'placeholder' => 'Please enter State', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-success">Register</button>
                  <button class="btn btn-default">Cancel</button>
                </div>
              </form>
            </div>
            <?php }?>
            <?php if(!$userData->business_bank_details){?>
              <div role="tabpanel" class="tab-pane <?php echo ($activeTab == 'bank')?'active':'';?>" id="default-tabs-0-3">
                <?= $this->Form->create(null,['url'=>$updateBankDetails,'enctype'=>"multipart/form-data"]); ?>
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('name', __('Account holder Name'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('name', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Account Holder Name', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('bank_name', __('Bank Name'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('bank_name', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Bank Name', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <?= $this->Form->label('account_type', __('Account Type'), ['class' => [ 'control-label col-md-3']]); ?>
                  <label class="custom-control custom-radio">
                    <input id="radio1" name="account_type" type="radio" class="custom-control-input" value="savings" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Savings</span>
                  </label>
                  <label class="custom-control custom-radio">
                    <input id="radio2" name="account_type" type="radio" value="current" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Current</span>
                  </label>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('account_number', __('Account Number'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('account_number', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Account Number', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('ifsc', __('IFSC Code'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('ifsc', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter IFSC Code', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->label('bank_branch', __('Bank Branch'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('bank_branch', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Branch Name', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <?= $this->Form->input('cheque_img_name',['accept'=>"image/*",'label'=>['text'=>'Cancelled Cheque','class'=>'col-sm-5'],'class' => ['col-sm-8'],'type' => "file",'required'=>'required'] ); ?>
                </div>
                <div class="text-center">
                  <button class="btn btn-success">Save</button>
                  <button class="btn btn-default">Cancel</button>
                </div>
              </form>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      $('document').ready(function(){
        $('#pin-code').on('blur',function(){
          var locality = getPinCodeDetails($('#pin-code').val(),'');
        });
        $('#business-pin-code').on('blur',function(){
          var locality = getPinCodeDetails($('#business-pin-code').val(),'business-');
        })
      });
      function getPinCodeDetails(pincode,base_var){
        xhrJustPosted = $.ajax({
          type: 'GET',
          url: "//maps.googleapis.com/maps/api/geocode/json?address="+pincode+"&sensor=true",
          dataType: 'json',
          success: function(r) {
            if(r.status == "OK"){
              var locality = [];
              if(r.results.length){
                if(r.results[0].address_components.length){
                  var isLocalityAvailable = false;
                  for(x in r.results[0].address_components ){
                    if(r.results[0].address_components[x].types[0] == 'locality'){
                      isLocalityAvailable = r.results[0].address_components[x].long_name;
                    }
                    if(r.results[0].address_components[x].types[0] == 'administrative_area_level_1'){
                      $('#'+base_var+'state').val(r.results[0].address_components[x].long_name);
                    }
                    if(r.results[0].address_components[x].types[0] == 'country'){
                      $('#'+base_var+'country').val(r.results[0].address_components[x].long_name);
                    }
                    if(r.results[0].address_components[x].types[0] == 'administrative_area_level_2'){
                      if(!isLocalityAvailable){
                        isLocalityAvailable = r.results[0].address_components[x].long_name;
                      }
                    }
                  }
                  $('#'+base_var+'city').val(isLocalityAvailable);
                }
                return locality;
              }
            }else{
              alert('bhkk');
            }

          },
          beforeSend: function() {
            $('#loading').show();
          },
          complete: function() {
            $('#loading').hide();
          }
        });
      }
      </script>
