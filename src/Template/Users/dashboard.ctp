
<?= $this->Html->css("c3/c3.min.css") ?>
<div class="row">
  <div class="col-12 col-md-12 col-lg-3 m-b-10">
    <div class="text-widget-1 bg-danger color-white text-left">
      <div class="row flex-items-xs-middle">
        <div class="col">
          <div class="title">
            45 </div>
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
                $3,231 </div>
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
                    $1,667 </div>
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
                        $398 </div>
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
                            $398 </div>
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
                      <div class="col-12 col-xl-6">
                        <div class="widget">
                          <div class="row">
                            <div class="col">
                              <div class="dropdown pull-right">
                                <button type="button" class="btn btn-default btn-rounded btn-outline dropdown-toggle" data-toggle="dropdown">
                                This month
                                </button>
                                <div class="dropdown-menu dropdown-menu-right from-right">
                                  <a class="dropdown-item">This week</a>
                                  <a class="dropdown-item">This month</a>
                                  <a class="dropdown-item">This year</a>
                                  <a class="dropdown-item">Today</a>
                                </div>
                              </div>
                              <div class="title">Successful and Failed Transactions</div>
                              <!-- <div class="description">Most important markets</div> -->
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div id="lineChart"></div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?= $this->Html->script('c3/c3.min.js') ?>
                      <?= $this->Html->script('d3/d3.min.js') ?>
                      <script type="text/javascript">
                      var chart = c3.generate({
                        bindto: '#lineChart',
                        data: {
                          xs: {
                            'Failed': 'x1',
                            'Successful': 'x2',
                          },
                          colors: {
                            'Failed': '#ff0000',
                            'Successful': '#00ff00'
                          },
                          color: function (color, d) {
                            // d will be 'id' when called for legends
                            return color;
                          },
                          columns: [
                            ['x1',  10, 30, 45, 50, 70, 100],
                            ['x2', 30, 50, 75, 100, 120],
                            ['Failed', 30, 200, 100, 400, 150, 250],
                            ['Successful', 20, 180, 240, 100, 190]
                          ]
                        }
                      });
                      </script>
