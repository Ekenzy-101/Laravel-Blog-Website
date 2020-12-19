@if(session("error"))
  <center>
    <div class="alert alert-danger alert-dismissible fade show" style="width: fit-content;" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <strong>{{session("error")}}</strong>
    </div>
  </center>
@endif
@if(session("success"))
  <center>
    <div class="alert alert-success alert-dismissible fade show" style="width: fit-content;" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <strong>{{session("success")}}</strong>
    </div>
  </center>
@endif
