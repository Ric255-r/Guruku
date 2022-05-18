<table class="table table-bordered">
    <tr>
        <th>File</th>
        <td><img src="{{ asset('/storage/'.$blog->file) }}" width="250" height="200" alt=""></td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{ $blog->title }}</td>
    </tr>
    <tr>
        <th>Subtitle</th>
        <td>{{ $blog->subtitle }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $blog->kategori }}</td>
    </tr>
    <tr>
        <th>Topik</th>
        <td>{{ $blog->topik }}</td>
    </tr>
    <tr>
        <th>Jenis Blog</th>
        <td>{{ $blog->jenis }}</td>
    </tr>
    <tr>
        <th>Kelas ID</th>
        <td>
            @if ($blog->jenis == 'lainnya')
                -
            @elseif($blog->jenis == 'kelas')
                {{ $blog->kelas->kelas }}
            @endif
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($blog->status == 'PENDING')
                <span class="badge badge-info">PENDING</span>
            @else
                <span class="badge badge-success">SUCCESS</span>
            @endif
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-6">
        <form action="{{ route('amentor.blog.status',$blog->id) }}" method="POST" class="d-inline">
            @csrf
            @method('put')
            <div class="form-group" hidden>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" value="PUBLISH">
            </div>
            <div class="form-group" hidden>
                <label for="publish_date">Publish Date</label>
                <input type="text" name="publish_date" id="publish_date" value="{{ date('Y-m-d') }}">
            </div>
            <button type="submit" class="btn btn-success btn-block">
                <i class="fas fa-check"></i>
            </button>
        </form>
    </div>
    <div class="col-6">
        <form action="{{ route('amentor.blog.status',$blog->id) }}" method="POST" class="d-inline">
            @csrf
            @method('put')
            <div class="form-group" hidden>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" value="PENDING">
            </div>
            <button type="submit" class="btn btn-info btn-block">
                <i class="fas fa-spinner"></i>
            </button>
        </form>
    </div>
</div>
