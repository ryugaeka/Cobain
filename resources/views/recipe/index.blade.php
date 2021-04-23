@extends('layouts.app')
@section('content')
<div class="container" style="padding-left: 1000px">
<a href="/foods/{{ auth::user()->usertype }}" class="btn btn-primary">Kembali</a>
</div>
<div class="container" style="padding-top: 40px">
<div class="row">
<div class="col-sm-12 py-2">
@foreach ($foods as $food)
<h2>
Daftar Recipe {{ $food->name }}
</h2>
@if(auth::user()->usertype == 'admin')
<a href="/recipe/{{ auth::user()->usertype }}/{{ $food-> id }}/new" class="btn btn-primary">Tambah Recipe</a>
@endif
</div>
<div class="col-sm-12 py-2">
<table class="table table-striped book-table">
<thead>
<tr>
<th>Banyak</th>
<th>Nama</th>
<th></th>
</tr>
</thead>
<tbody>
@if (count($recipes) == 0)
<tr>
<td colspan="5" style="text-align: center">Tidak ada data</td>
</tr>
</div>
@endif
@foreach ($recipes as $recipe)
<tr>

<td>
{{ $recipe->qty }}
</td>
<td>
@foreach ($ingredients as $ingredient)
    @if($recipe->ingredient_id == $ingredient->id)
        {{ $ingredient->name }}
    @endif
@endforeach
</td>
<td>
@if(auth::user()->usertype == 'admin')
<a href="/recipe/update/{{ $recipe->id }}/{{ $food->id }}/{{ $ingredient->id }}" class="btn btn-primary">Update</a>
@endif
</td>
<td>
@if(auth::user()->usertype == 'admin')
<form action="/recipe/delete/{{ $recipe->id }}/{{ $food->id }}" method="POST">
{{ csrf_field() }}
{{ method_field('DELETE') }}
<button class="btn
btn-danger">Hapus</button>
</form>
@endif
</td>
</tr>
@endforeach
@endforeach
</tbody>
</table>
</div>
</div>
@endsection