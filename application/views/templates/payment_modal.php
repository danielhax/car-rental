<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select type of payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="paymentCont">
              <div class="headingWrap">
                <h3 class="headingTop text-center">Select Your Payment Method</h3>
              </div>
              <div class="paymentWrap">
                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                  <label class="btn paymentMethod active">
                    <div class="method visa"></div>
                    <input type="radio" value="visa" name="options" checked> 
                  </label>
                  <label class="btn paymentMethod">
                    <div class="method master-card"></div>
                    <input type="radio" value="master-card" name="options"> 
                  </label>
                  <label class="btn paymentMethod">
                    <div class="method bank-transfer"></div>
                    <input type="radio" value="bank-transfer" name="options"> 
                  </label>
                </div>        
              </div>
              <div class="footerNavWrap clearfix">
                <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CANCEL</div>
                <button type="button" class="btn btn-success pull-right btn-fyi">CHECKOUT<span class="glyphicon glyphicon-chevron-right"></span></button>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> Close</button>
        <button type="submit" class="btn btn-success pull-right btn-fyi">Confirm<span class="glyphicon glyphicon-chevron-right"></span></button>
      </div>
    </div>
  </div>
</div>