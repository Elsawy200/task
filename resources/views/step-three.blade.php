<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<html>
<div style="margin-top: 250px" class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header text-center">step 3</h3>
                <div class="card-body">
                    <form action="{{route('store_step3')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input value="{{ $phone ?? old('phone') }}" type="text" placeholder="phone" id="phone" class="form-control"
                                   name="phone" >
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="display: flex">
                            <div class="d-grid mx-auto">
                                <a  href="{{route('step2')}}"  class="btn btn-dark btn-block">previous</a>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">next</button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</html>
