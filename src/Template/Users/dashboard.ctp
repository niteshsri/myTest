<?php 
// pr($totalTransations);die;
 ?>
<?= $this->Html->css("c3/c3.min.css") ?>
<div class="row">
  <div class="col-12 col-md-12 col-lg-3 m-b-10">
    <div class="text-widget-1 bg-danger color-white text-left">
      <div class="row flex-items-xs-middle">
        <div class="col">
          <div class="title">
            <?= $successfulTransations?> </div>
          </div>
        </div>
        <div class="row flex-items-xs-middle">
          <div class="col">
            <div class="subtitle">
              Successful Transactions</div>
            </div>
          </div>
          <div class="icon-right">
            <i class="sli-cursor"></i>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-3 m-b-10">
        <div class="text-widget-1 bg-warning color-white text-left">
          <div class="row flex-items-xs-middle">
            <div class="col">
              <div class="title">
                <?= $totalTransations?></div>
              </div>
            </div>
            <div class="row flex-items-xs-middle">
              <div class="col">
                <div class="subtitle">
                  Transaction Amount </div>
                </div>
              </div>
              <div class="icon-right">
                <i class="sli-energy"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-3 m-b-10">
            <div class="text-widget-1 bg-success color-white text-left">
              <div class="row flex-items-xs-middle">
                <div class="col">
                  <div class="title">
                    <?= $collectionTransations?> </div>
                  </div>
                </div>
                <div class="row flex-items-xs-middle">
                  <div class="col">
                    <div class="subtitle">
                      Collection Amount </div>
                    </div>
                  </div>
                  <div class="icon-right">
                    <i class="sli-bubbles"></i>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-3 m-b-10">
                <div class="text-widget-1 bg-info color-white text-left">
                  <div class="row flex-items-xs-middle">
                    <div class="col">
                      <div class="title">
                        <?= $pendingTransations?></div>
                      </div>
                    </div>
                    <div class="row flex-items-xs-middle">
                      <div class="col">
                        <div class="subtitle">
                          Pending Amount </div>
                        </div>
                      </div>
                      <div class="icon-right">
                        <i class="sli-cloud-upload"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-3 m-b-10">
                    <div class="text-widget-1 bg-info color-white text-left">
                      <div class="row flex-items-xs-middle">
                        <div class="col">
                          <div class="title">
                             <?= $refundTransations?></div>
                          </div>
                        </div>
                        <div class="row flex-items-xs-middle">
                          <div class="col">
                            <div class="subtitle">
                              Refunds </div>
                            </div>
                          </div>
                          <div class="icon-right">
                            <i class="sli-cloud-upload"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
  <div class="col">
    <div class="widget">
      <div class="row">
        <div class="col">
          <div class="title">All Transactions</div>
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
              <?php foreach ($userTransactions as $key => $userTransaction) {?>
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


