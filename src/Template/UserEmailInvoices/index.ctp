<?php
// pr($users);
?>
<div class="row">
  <div class="col">
    <ol class="breadcrumb breadcrumb-default icon-grid icon-angle-double-right">
      <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">Dashboard</a>
      <li><a href="<?= $this->Url->build(['controller' => 'UserEmailInvoices', 'action' => 'index'])?>">Email Invoices</a>
    </ol>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="widget">
      <div class="row">
        <div class="col">
          <div class="title">Email Invoices</div>
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
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($userEmailInvoices as $key => $userEmailInvoice) {?>
                <tr>
                  <td><?= ($key)?></td>
                  <td><?= ($userEmailInvoice->customer_name)?></td>
                  <td><?= ($userEmailInvoice->customer_email)?></td>
                  <td><?= ($userEmailInvoice->customer_phone)?></td>
                  <td><?= ($userEmailInvoice->amount)?></td>
                  <td><?= ($userEmailInvoice->status)?'completed':'pending' ?></td>
                  <td><?= ($userEmailInvoice->created)?></td>
                  <td class="actions">
                    <?= '<a href='.$this->Url->build(['controller'=>'UserEmailInvoices','action' => 'view', $userEmailInvoice->id]).' class="btn btn-sm btn-success">' ?>
                      <i class="fa fa-eye fa-fw"></i>
                    </a>
                    </td>
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
