<form action="{{ route('change_password') }}" method="POST" autocomplete="off">
    @csrf

    <div class="row mb-3">
        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password
            Sekarang</label>
        <div class="col-md-8 col-lg-9">
            <input name="current_password" type="password" class="form-control" id="current_password" />
        </div>
    </div>

    <div class="row mb-3">
        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password
            Baru</label>
        <div class="col-md-8 col-lg-9">
            <input name="new_password" type="password" class="form-control" id="new_password" />
        </div>
    </div>

    <div class="row mb-3">
        <label for="new_confirm_password" class="col-md-4 col-lg-3 col-form-label">Konfirmasi
            Password Baru</label>
        <div class="col-md-8 col-lg-9">
            <input name="new_confirm_password" type="password" class="form-control" id="new_confirm_password" />
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">
            Simpan Password
        </button>
    </div>
</form>
