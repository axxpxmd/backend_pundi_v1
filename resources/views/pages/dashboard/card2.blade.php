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
                                <div class="">
                                    <div style="height: 300px">
                                        <canvas data-chart="chartJs"
                                                data-chart-type="pie"
                                                data-dataset="[[75, 50], [25, 50]]"
                                                data-labels="[['Disk'],['Database']]"
                                                data-dataset-options="[
                                                    {
                                                        label: 'Disk',
                                                        backgroundColor: ['#4285F4', '#7DC855']
                                                    },
                                                    {
                                                        label: 'Database',
                                                        backgroundColor: ['#FFEB3B', '#36A2EB']
                                                    },
                                                ]">
                                        </canvas>
                                    </div>
                                </div>
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
    <div class="col-md-4">
        <div class="white">
            <div class="card">
                <div class="card-header bg-primary text-white b-b-light">
                    <div class="row justify-content-end">
                        <div class="col">
                            <ul id="myTab4" role="tablist"
                                class="nav nav-tabs card-header-tabs nav-material nav-material-white float-right">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="tab1" data-toggle="tab" href="#v-pills-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">View Artikel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#v-pills-tab2" role="tab" aria-controls="tab2" aria-selected="false">Total Artikel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body no-p">
                    <div class="tab-content">
                        <div class="tab-pane animated fadeIn show active" id="v-pills-tab1" role="tabpanel"
                            aria-labelledby="v-pills-tab1">
                            <div class="bg-primary text-white lighten-2">
                                <div class="pt-5 pb-2 pl-5 pr-5">
                                    <h5 class="font-weight-normal s-14">Total artikel dilihat</h5>
                                    <span class="s-48 font-weight-lighter text-primary sc-counter">{{ $countArtikel }}</span>
                                    <div class="float-right">
                                        <span class="icon icon-eye s-48"></span>
                                    </div>
                                </div>
                                <canvas width="378" height="94" data-chart="spark" data-chart-type="line" data-dataset="[[28,530,200,430]]" data-labels="['a','b','c','d']" data-dataset-options="[{ borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},]"></canvas>
                            </div>
                            <div class="card-body p-0 bg-light slimScroll" data-height="370">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr class="no-b">
                                            <th></th>
                                            <th>Judul</th>
                                            <th>View</th>
                                            <th>Penulis</th>
                                        </tr>
                                        <?php $no = 0;?>
                                        @foreach ($listArtikel as $i)
                                        <?php $no++ ;?>
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>
                                                <a href="#">{{  substr( $i->judul,0,30) }} <strong>...</strong></a>
                                            </td>
                                            <td>{{ $i->artikel_view }}</td>
                                            <td class="text-uppercase">{{ $i->penulis->nama_depan }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeIn" id="v-pills-tab2" role="tabpanel"
                            aria-labelledby="v-pills-tab2">
                            <div class="bg-primary text-white lighten-2">
                                <div class="pt-5 pb-2 pl-5 pr-5">
                                    <h5 class="font-weight-normal s-14">Total semua artikel</h5>
                                    <span class="s-48 font-weight-lighter text-primary">{{ $totalArtikel }}</span>
                                    <div class="float-right">
                                        <span class="icon icon-document2 s-48"></span>
                                    </div>
                                </div>
                                <canvas width="378" height="94" data-chart="spark" data-chart-type="line" data-dataset="[[620,20,700,50]]" data-labels="['a','b','c','d']" data-dataset-options="[ { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},]"></canvas>
                            </div>
                            <div class="card-body p-0 bg-light slimScroll" data-height="370">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr class="no-b">
                                            <th></th>
                                            <th>User</th>
                                            <th>Jumlah Artikel</th>
                                            <th>Total View</th>
                                        </tr>
                                        <?php $no = 0;?>
                                        @foreach ($totalUserArtikel as $i)
                                        <?php $no++ ;?>
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>
                                                <a href="{{ route('master-user.user.show', $i->user_id) }}" class="text-uppercase">{{ $i->name }}</a>
                                            </td>
                                            <td>{{ $i->total_artikel }}</td>
                                            <td>{{ $i->total_view }}</td>
                                        </tr>
                                        @endforeach
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
</div>
