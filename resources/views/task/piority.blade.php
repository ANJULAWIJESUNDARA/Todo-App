<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Piority</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-weight: bold">Piority *</label>
                <select name="piority_id"  class="form-control" id="piority_id" required>
                    @if($task->piority_id == 1)
                    <option value="1">Top (Only For A Task)</option>
                    <option value="2">High</option>
                    <option value="3">Medium</option>
                    <option value="4"> Low</option>
                    @elseif($task->piority_id == 2)
                    <option value="2">High</option>
                    <option value="1">Top (Only For A Task)</option>
                    <option value="3">Medium</option>
                    <option value="4"> Low</option>

                    @elseif($task->piority_id == 3)
                    <option value="3">Medium</option>
                    <option value="4"> Low</option>
                    <option value="2">High</option>
                    <option value="1">Top (Only For A Task)</option>
                    @else
                    <option value="4"> Low</option>
                    <option value="3">Medium</option>
                    <option value="2">High</option>
                    <option value="1">Top (Only For A Task)</option>
                    @endif

                </select>
            </div>
            <input type="hidden" id="piority_task_id" value="{{$task->id}}">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save-piority" data-href="" >Save changes</button>
      </div>
    </div>
  </div>
