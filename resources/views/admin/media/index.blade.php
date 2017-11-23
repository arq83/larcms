@extends('layouts.admin') @section('content')

<h1>Media</h1>
@if($photos)

<form class="form-inline" action="delete/media" method="post">
	{{csrf_field()}} {{method_field('delete')}}
	<div class="form-group">
		<select name="checkBoxArray" class="form-control">
			<option value="">Usuń</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="delete_all" value="Zastosuj" class="btn btn-primary">
	</div>


	<table class="table">
		<thead>
			<tr>
				<th>
					<input type="checkbox" id="options">
				</th>
				<th>Id</th>
				<th>Nazwa</th>
				<th>Utworzone</th>
			</tr>
		</thead>
		<tbody>

			@foreach($photos as $photo)
			<tr>
				<td>
					<input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}">
				</td>
				<td>{{$photo->id}}</td>
				<td>
					<img src="{{$photo->file}}" alt="" height="50">
				</td>
				<td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
				<td>
					<input type="hidden" name="photo" value="{{$photo->id}}">
					<div class="form-group">
						<input type="submit" value="Usuń" name="delete_single" class="btn btn-danger">
					</div>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
</form>

@endif @stop @section('scripts')

<script>
	$(document).ready(function(){
      $('#options').click(function(){
        if (this.checked) {
          $('.checkBoxes').each(function(){
            this.checked = true;
          });
        }else{
          $('.checkBoxes').each(function(){
            this.checked = false;
          });
        }
      });
    });

</script>

@stop
