@if(session('status') )
<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          @if (session('modal_title'))
          {{session('modal_title')}}
          @else
          Modal title
          @endif

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (session('modal_content'))
        <p> {{session('modal_content')}}</p>
        @else
        <p>Modal body text goes here.</p>
        @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
        $('#myModal').modal('show');
    });
</script>
@endif