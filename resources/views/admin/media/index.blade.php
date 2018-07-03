@extends('layouts.admin')



@section('content')

    <form action="media/delete" method="post">

        <div class="form-group col-sm-3">

            <select class="form-control" name="options" id="">
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>


    <table class="table table-hover table-dark">
      <thead>
        <tr>
            {{csrf_field()}}
            <th><input id="all_photos" type="checkbox" name="all_photo_id"></th>
          <th scope="col">Id</th>
          <th scope="col">Photo</th>
          <th scope="col">Created Time</th>
        </tr>
      </thead>
      <tbody>
      @if($media)
          @foreach($media as $photo)
        <tr>
            <td><input class="checkBoxes"  type="checkbox" name="checkboxArray[]" value="{{$photo->id}}"></td>
          <td>{{$photo->id}}</td>
          <td><img height="35" src="{{$photo->file}}" alt=""></td>
          <td>{{$photo->created_at->diffForHumans()}}</td>


        </tr>

        @endforeach
        @endif
      </tbody>
    </table>
    </form>





@endsection


@section('scripts')

    <script>
        $('#all_photos').click(function () {
            if(this.checked){
                $('.checkBoxes').each(function () {
                    this.checked = true;
                });
            }
            else {
                $('.checkBoxes').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>

@endsection