<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center myColor ">LOGIN</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger" id="message"></div>
          <form id="formLogin">
           <div class="form-group">
            <label for="email">JUDGE ID</label>
            <input type="text" name="judge_id" class="form-control form" id="judge_id">
          </div>
          <div class="form-group">
            <label for="pwd">JUDGE CODE</label>
            <input type="password" name="judge_code" class="form-control form" id="judge_code">
          </div>
          <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary btn-block form">Login</button>
        </form> 
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>