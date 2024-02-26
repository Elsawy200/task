<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<html>
<div style="margin-top: 250px" class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header text-center">step 1</h3>
                <div class="card-body">
                    <form action="{{ route('store_step1') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input value="{{ $userFirstName ?? old('firstName') }}" type="text" placeholder="firstName" id="first_name" class="form-control"
                                   name="firstName" >
                            @error('firstName')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">next</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</html>
