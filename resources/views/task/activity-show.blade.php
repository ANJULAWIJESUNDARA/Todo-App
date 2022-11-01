<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
            <th style="width: 30%;">Task</th>
            <th style="width: 40%">Description</th>
            <th>Assaignee</th>
            <th>Planed to Complete </th>
            <th>Piority</th>
            <tbody>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->user->name}}</td>
                <td>{{ Carbon\Carbon::parse($task->planned_end_date)->format('H:i') }}   {{ Carbon\Carbon::parse($task->planned_end_date)->format('M-d ') }}</td>
                <td>
                @if ($task->piority_id == 1)
                <span class="badge badge-danger">Top</span>
                @elseif ($task->piority_id == 2)
                <span class="badge badge-warning">High</span>
                @elseif($task->piority_id == 3)
                <span class="badge badge-info">Medium</span>
                @else
                <span class="badge badge-success">Low</span>
                @endif
            </td>

            </tbody>
       </table>
       <hr>
       <h3>Activities</h3>
       <table  style="width: 80%">
            <th style="width: 60%;">Activity</th>
            <th style="width: 20%">Data & Time</th>
            <th>User</th>
            <tbody>
                @foreach ($task_activities as $activity )
                <tr>
                    <td>
                        {{$activity->activity}}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($activity->created_at)->format('H:i') }}   {{ Carbon\Carbon::parse($activity->created_at)->format('M-d ') }}
                    </td>
                    <td>
                        {{$activity->user->name}}
                    </td>
                </tr>

                @endforeach

            </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
