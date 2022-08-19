@extends('master')

@section('content')
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3">Liên Hệ</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('lienhe.store') }}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nhân Viên</label>
                                <div class="col-md-6">
                                    <input type="text" name="fullname" class="form-control"
                                        value="{{ session('fullname') }}" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input type="number" name="phone" class="form-control" value="{{ session('phone') }}"
                                        readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" value="{{ session('email') }}"
                                        @if (session('email') != '') readonly="readonly" @endif>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Nội dung</label>
                                <div class="col-md-6">
                                    <textarea id="message" style="height:120px; resize: none;" class="form-control"
                                        name="message" required> </textarea>
                                </div>
                            </div>


                            <div class="offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Xác Nhận
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
