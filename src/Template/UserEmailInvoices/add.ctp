<?php
/**
* @var \App\View\AppView $this
*/
?>
<div class="container-fluid" >
      <div class="alert alert-secondary" role="alert">
        <p><strong>New Email Invoice</strong></p>
        <small>Fill details below to create an invoice </small>
      </div>
      </div>
  <div class="row">
    <div class="col">
      <!-- pages/create-account -->
      <div class="sample-form-1 create-account" style="height:420px;">

        <div class="side-bg-1"></div>
        <?= $this->Form->create($userEmailInvoice); ?>

        <div class="form-group row">
          <div class="col-md-4">
            <?= $this->Form->label('amount', __('Amount in Rs *'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('amount', ['id'=>'amount','class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Amount', 'required'=>'required']); ?>
          </div>
          <div class="col-md-4">
            <?= $this->Form->label('expiry', __('Expiry Date(optional)'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('expiry', ['id'=>'expiryDate','class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter expiry date']); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <?= $this->Form->label('description', __('Item Description'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Text('description', ['id'=>'description','class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter description', 'required'=>'required']); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <?= $this->Form->label('customer_details', __('Customer Details'), ['class' => [ 'control-label']]); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <?= $this->Form->label('customer_name', __('Name'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('customer_name', ['id'=>'customer_name','class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter name', 'required'=>'required']); ?>
          </div>
          <div class="col-md-6">
            <?= $this->Form->label('customer_email', __('Email'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('customer_email', ['id'=>'customer_email','class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Email', 'required'=>'required']); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <?= $this->Form->label('customer_phone', __('Phone'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('customer_phone', ['id'=>'customer_phone','class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter phone number', 'required'=>'required']); ?>
          </div>
        </div>
        <div class="text-center">
          <input id="new-invoice" type = "button" class="btn btn-success">Submit</button>
          <a class="btn btn-default" href="<?= $this->Url->build(['action'=>'index']);?>">Cancel</a>
        </div>
</div>
      </form>
      
    <!-- end pages/create-account -->
  </div>
</div>
</div>
</div>
 <div class="modal fade" id="newInvoiceModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Use the below link to collect payment for this invoice.</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <span style="color:red;" id="payment_link"></span>
        </div>
        <div class="modal-footer">
          <span>Press <button type="button" class="btn btn-default" data-dismiss="modal">Send Email</button> to send mail directly to the customer's email id.</span>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
    $(document).ready(function(){
      host = 'http://localhost/myTestCode/';
      $('#new-invoice').on('click',function(){

        $.ajax({
          url: host+"api/user_email_invoices/add/",
          headers:{"accept":"application/json"},
          dataType: 'json',
          data:{
            "amount" :$('#amount').val(),
            "transcation_identifier" : $('#transcation_identifier').val(),
            "expiry_date" : $('#expiry').val(),
            "description" : $('#description').val(),
            "customer_name" : $('#customer_name').val(),
            "customer_email" : $('#customer_email').val(),
            "customer_phone" : $('#customer_phone').val()
          },
          type: "post",
          success:function(data){
            console.log(data);
            $('#payment_link').html(data.data);
            $('#newInvoiceModal').modal('show');
          },
          error:function(data){
            console.log(data);
            alert('not able to update');
          },
          beforeSend: function() {
             alert('updating..');
          }
        });
      });
    });
  </script>