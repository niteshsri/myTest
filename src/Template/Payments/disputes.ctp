<div class="row">
  <div class="col">
    <ol class="breadcrumb breadcrumb-default icon-grid icon-angle-double-right">
      <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard'])?>">Dashboard</a>
      <li><a href="<?= $this->Url->build(['controller' => 'Payments', 'action' => 'disputes'])?>">Disputes</a>
    </ol>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="widget">
      <div class="row">
        <div class="col">
          <div class="title">Disputes</div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table id="invoices-list" class="table table-responsive table-hover table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Amount</th>
                <th>Transactions Id</th>
                <th>Status</th>
                <th>Created</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($userTransactions as $key => $userTransaction) { ?>
                <tr>
                  <td><?= ($key)?></td>
                  <td><?= ($userTransaction->user_email_invoice->customer_name)?></td>
                  <td><?= ($userTransaction->user_email_invoice->customer_email)?></td>
                  <td><?= ($userTransaction->user_email_invoice->customer_phone)?></td>
                  <td><?= ($userTransaction->user_email_invoice->amount)?></td>
                  <td><?= ($userTransaction->user_email_invoice->user_transaction_id)?></td>
                   <td><?php if($userTransaction->transcation_identifier == 0){
                              // echo $userTransaction->transcation_identifier;
                              echo 'Failed';
                          }else if($userTransaction->transcation_identifier == 1){
                              echo 'SuccessFul';
                          }else if($userTransaction->transcation_identifier == 2){
                              echo 'Pending';
                          }else if($userTransaction->transcation_identifier == 3){
                              echo 'Refund';  
                          }else if($userTransaction->transcation_identifier == 4){
                              echo 'Collection';
                          }else{
                            echo 'warning';
                          }  
                  ?></td>
                  <td><?= ($userTransaction->created)?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#invoices-list').DataTable({
        responsive: true
      });
    })
    </script>


