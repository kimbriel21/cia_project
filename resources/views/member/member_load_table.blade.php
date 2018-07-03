<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Middle</th>
      <th scope="col">Last</th>
      <th scope="col">Birthday</th>
      <th scope="col">Number</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($members as $member)
    <tr member-id="{{$member->member_id}}" class="member-id-{{$member->member_id}}">
      <th scope="row">{{$member->member_id}}</th>
      <td>{{$member->first_name}}</td>
      <td>{{$member->middle_name}}</td>
      <td>{{$member->last_name}}</td>
      <td>{{$member->birthday}}</td>
      <td>{{$member->number}}</td>
      <td>{{$member->address}}</td>
      <td class="text-center">
        <div class="w3-dropdown-hover">
          <button class="w3-button w3-blue">Action</button>
          <div class="w3-dropdown-content w3-bar-block w3-border">
            <button class="w3-bar-item w3-button dropdown-item view-member global-modal" url='/view_member_modal/{{$member->member_id}}'>View</button>
            <button class="w3-bar-item w3-button delete-member" >Delete</button>
          </div>
        </div>
      </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
