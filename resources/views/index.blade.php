@extends("layouts.app")

@section("title") Articles @endsection
@section("content")

<div class="row mb-4">
    <div class="col-xl-6">
        <h2>Articles</h2>
    </div>

    <div class="col-xl-6 text-right">
        <a href="{{route('articles.create')}}" class="btn btn-success "> Add New </a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <th> Id </th>
        <th> Title </th>
        <th> Description </th>
        <th> Action </th>
    </thead>

    <tbody>

        @if(!empty($articles))
            @foreach($articles ?? '' as $article)
                <tr>
                    <td> {{$article->id}} </td>
                    <td> {{$article->title}} </td>
                    <td> {{$article->description}} </td>
                    <td>
                        <form action="{{route('articles.destroy', $article->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('articles.show', $article->id)}}" class="btn btn-sm btn-info"> View </a>
                            <a href="{{route('articles.edit', $article->id)}}" class="btn btn-sm btn-success"> Edit </a>

                            <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@endsection