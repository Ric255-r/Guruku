@extends('layouts.default2')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Edit Profile</strong>
        </div>
        <div class="card-body card-block">


            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            {{--{{ $path }}--}}
            <form action="{{ route('user.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                {{--<div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                    @if ($user->file == null)

                    @else
                        <img src="{{ asset('/storage/'.$user->file) }}" width="70px" height="70px" alt="-">
                    @endif
                </div>--}}
                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="nama" class="form-control-label">Email</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->email }}" disabled>
                </div>
                @if ($user->statustelp == false)
                    <div class="form-group mb-4">
                        <label for="telp" class="form-control-label">No.Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control" value="{{ $user->telp }}" disabled>
                        <a onclick="buatNomor(); return false" id="btnhp" class="btn btn-warning mt-1" style="float:right;">Edit Nomor HP ?</a>
                        <span id="buathp"></span>
                    </div>
                @else  
                    <div class="form-group">
                        <label for="telp" class="form-control-label">No.Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control" value="{{ $user->telp }}" disabled>
                    </div>
                @endif
                <div class="form-group">
                    <label for="bidang" class="form-control-label">Bidang</label>
                    <input type="text" name="bidang" id="bidang" class="form-control" value="{{ $user->bidang }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $user->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="instagram_profile" class="form-control-label">Instagram Profile</label>
                    <input type="text" name="instagram_profile" class="form-control" id="instagram_profile" value="{{ $user->instagram_profile }}">
                </div>
                <div class="form-group">
                    <label for="twitter_profile" class="form-control-label">Twitter Profile</label>
                    <input type="text" name="twitter_profile" id="twitter_profile" class="form-control" value="{{ $user->twitter_profile }}">
                </div>
                <div class="form-group">
                    <label for="github_profile" class="form-control-label">Github Profile</label>
                    <input type="text" name="github_profile" id="github_profile" class="form-control" value="{{ $user->github_profile }}">
                </div>
                <div class="form-group">
                    <label for="dribbble_profile" class="form-control-label">Dribbble Profile</label>
                    <input type="text" name="dribbble_profile" id="dribbble_profil" class="form-control" value="{{ $user->dribbble_profile }}">
                </div>
                <div class="form-group">
                    <label for="link_website">Link Website</label>
                    <input type="text" name="link_website" id="link_website" value="{{ $user->link_website }}" class="form-control">
                </div>
                {{--<div class="form-group">
                    <label for="bank" class="form-control-label">Bank</label>
                    <select name="bank" id="bank" class="form-control">
                        @foreach ($bank as $query)
                            <option value="{{ $query->id }}">{{ $query->namabank }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_rek" class="form-control-label">No Rekening</label>
                    <input type="number" name="no_rek" id="no_rek" class="form-control" value="{{ $user->no_rek }}">
                </div>--}}
                <button type="submit" class="btn btn-primary form-control">Update Profile</button>
            </form>
        </div>
    </div>
<script>
    var cek = 1;
    function buatNomor(){
        cek++;
        let btn = document.getElementById('btnhp');
        let telp = document.getElementById('telp');
        let spanstat = document.getElementById('buathp');
        let statustelp = "{{ $user->statustelp }}";
        if(cek %2 == 0){
            let confirm = window.confirm("Anda Yakin Ingin Mengubah No Telp? Hanya Bisa 1x?!");
            if(confirm == true){
                telp.removeAttribute("disabled");
                telp.placeholder = "xxxx-xxxx-xxxx || Hanya Bisa Mengubah 1x";
                // btn.style.display = "none";
                btn.textContent = "Batalkan Perubahan?";
                spanstat.innerHTML = `<input type="hidden" name="statustelp" value="${statustelp}">`;
            }
        }else{
            let confirm = window.confirm("Anda Yakin Ingin Membatalkan Perubahan?");
            if(confirm == true){
                telp.removeAttribute("placeholder");
                telp.value = "{{ $user->telp }}";
                telp.setAttribute("disabled", "disabled");
                btn.textContent = "Edit Nomor HP?";
                spanstat.innerHTML = ``;
            }
        }
    }
</script>



@endsection
