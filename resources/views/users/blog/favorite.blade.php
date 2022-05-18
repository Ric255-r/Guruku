@extends('layouts.default2')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Favourite Blog</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Blog</th>
                                                <th>Link Blog</th>
                                                <th colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="refreshtable">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @forelse ($blog as $query)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $query->blog->title }}</td>
                                                    <td>
                                                        <a href="http://localhost:8000/blog/{{ $query->blog->slug }}" target="_blank">Link Blog</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('blog.update.favorite',$query->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="blog_id" value="{{ $query->blog->slug }}" hidden>
                                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                            <input type="text" name="status" value="0" hidden>
                                                            <button type="submit" class="btn btn-danger btn-sm tooltip-test" title="Hapus dari Favorit"
                                                                onclick="return confirm('Yakin ingin menghapus blog dari favorit?');">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Anda tidak memiliki blog Favorite</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
