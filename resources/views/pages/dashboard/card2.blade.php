<div class="d-flex row row-eq-height my-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header white">
                <div class="row justify-content-end">
                    <div class="col">
                        <ul class="nav nav-tabs card-header-tabs nav-material">
                            <li class="nav-item">
                                <a class="nav-link active show" id="w1-tab1" data-toggle="tab" href="#v-pills-w1-tab1">Today</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body no-p">
                <div class="tab-content">
                    <div class="tab-pane animated fadeInRightShort show active" id="v-pills-w1-tab1" role="tabpanel"
                        aria-labelledby="v-pills-w1-tab1">
                        <div class="row p-3">
                            <div class="col-md-6">
                                @include('pages.dashboard.chart')
                            </div>
                            <div class="col-md-6">
                                <div class="card-body pt-0">
                                    <div class="my-3">
                                        <div class="float-right">
                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                            </a>
                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                <i class="icon-star p-0"></i>
                                            </a>
                                        </div>
                                        <div class="mr-3 float-left">
                                            <img width="50" class="img-fluid" src="{{ asset('images/logo-round.png') }}" alt="logo">
                                        </div>
                                        <div>
                                            <div>
                                                <strong>PUNDI</strong>
                                            </div>
                                            <small>kanal pendidikan tajam dan mencerahkan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.dashboard.subCard2-1')
</div>
