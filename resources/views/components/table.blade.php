<a href="{{ route('album.create') }}" class="btn btn-gradient-info btn-rounded btn-fw">Add Album</a>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Album Table</h4>
        </p>
        <table class="table table-dark">
          <thead>
            <tr>
              <th> # </th>
              <th> First name </th>
              <th> Image </th>
              <th>Edite/Delete</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($all_data as $key=> $row)
            <tr>
              <td> {{ ++$key }} </td>
              <td> {{ $row->name }} </td>
              <td>
                 @foreach ($row['images'] as $img)
                <img src="{{ asset('storage/images/'.$img['file']) }}" alt="">
              @endforeach
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('album.edit',$row->id) }}">Edite</a>
                @include('style.modal')
            </td>
            </tr>

            @empty

            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
