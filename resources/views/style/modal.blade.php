<button type="button" class="btn btn-danger" data-bs-toggle="modal"
data-bs-target="#exampleModal{{$row->id}}"
>Delete</button>

<div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="color: black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('album.destroy',$row->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <p style="color: green">if you want move the picture to another album</p>
            <select name="album" class="form-select" aria-label="Default select example">
                <option selected value="">....Selected</option>
                @foreach ( $all_data as $value )

                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach 

              </select>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
      </div>
    </div>
  </div>
</div>
