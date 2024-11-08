@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}?v={{ \Carbon\Carbon::now()->timestamp }}">

@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">
  <!-- Congratulations card -->
  <div class="col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-1">En çok çalışan makine</h4>
        <p>En çok çalışan makine: 1.Makine!</p>
        <h4 class="text-primary mb-1">16 Saat</h4>
        <p class="mb-2 pb-1">78% Performans</p>
        <a href="javascript:;" class="btn btn-sm btn-primary">Makinaları Görüntüle</a>
      </div>
      <img src="{{asset('assets/img/icons/misc/triangle-light.png')}}" class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background">
    </div>
  </div>
  <!--/ Congratulations card -->

  <!-- Transactions -->
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Makine Performansı!</h5>
          
        </div>
        <p class="mt-3"><span class="fw-medium">48.5% Performans!</span></p>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-4 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow">
                  <i class="mdi mdi-trending-up mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Performans Yüzdesi</div>
                <h5 class="mb-0">48.5%</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow">
                  <i class="mdi mdi-account-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Aktif Çalıştığı Saat</div>
                <h5 class="mb-0">16 Saat</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-warning rounded shadow">
                  <i class="mdi mdi-cellphone-link mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Duruş Süresi</div>
                <h5 class="mb-0">8 Saat</h5>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->

  <!-- Weekly Overview Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Günlük Performans Grafiği</h5>
        </div>
      </div>
      <div class="card-body">
        <div id="weeklyOverviewChart"></div>
        <div class="mt-1 mt-md-3">
          <div class="d-grid mt-3 mt-md-4">
            <button class="btn btn-primary" type="button">Makineleri Görüntüle</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Weekly Overview Chart -->

  <!-- Total Earnings -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Makina Durumları</h5>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-md-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/misc/zipcar.png')}}" alt="zipcar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">1.makine</h6>
              </div>
              <div>
                <h6 class="mb-2">85%</h6>
                <div class="progress bg-label-primary" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </li>


          <li class="d-flex mb-4 pb-md-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/brands/dribbble.png')}}" alt="zipcar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">2.makine</h6>
              </div>
              <div>
                <h6 class="mb-2">85%</h6>
                <div class="progress bg-label-primary" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </li>


          <li class="d-flex mb-4 pb-md-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/misc/bitbank.png')}}" alt="bitbank" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">3.makine</h6>
              </div>
              <div>
                <h6 class="mb-2">65%</h6>
                <div class="progress bg-label-info" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-info" style="width: 65%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </li>
          <li class="d-flex mb-md-3">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/misc/aviato.png')}}" alt="aviato" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">4.makine</h6>
              </div>
              <div>
                <h6 class="mb-2">35%</h6>
                <div class="progress bg-label-secondary" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-secondary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Total Earnings -->

  <!-- Four Cards -->
      <!--/ Total Profit line chart -->
      <!-- Total Profit Weekly Project -->
      

  <!-- Sales by Countries -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">En Performanlı Makineler</h5>
        
      </div>
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <div class="avatar-initial bg-label-success rounded-circle">1.M</div>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">1.Makine</h6>
              </div>
              <small>1.Sıra</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">16 Saat</h6>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-danger rounded-circle">2.M</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">2.Makine</h6>
              </div>
              <small>2.Sıra</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">14 Saat</h6>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-warning rounded-circle">3.M</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">3.Makine</h6>
              </div>
              <small>3.Sıra</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">11 Saat</h6>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-secondary rounded-circle">4.M</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">4.Makine</h6>
              </div>
              <small>4.Sıra</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">10 Saat</h6>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-danger rounded-circle">5.M</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">5.Makine</h6>
              </div>
              <small>5.Sıra</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">8 Saat</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Sales by Countries -->

  <!-- Deposit / Withdraw -->
  

  <!-- Data Tables -->
  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">Makine Adı</th>
              <th class="text-truncate">Parça Adı</th>
              <th class="text-truncate">Son Değişim Tarihi</th>
              <th class="text-truncate">Oparetör Adı</th>
              <th class="text-truncate">Durum</th>
              <th class="text-truncate">Aktiflik</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                    <!-- Data Tables 
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                    -->
                  <div>
                    <h6 class="mb-0 text-truncate">1.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">1.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Oktan</td>

              <td class="text-truncate">
              <div>
                <h6 class="mb-2">35%</h6>
                <div class="progress bg-label-warning" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-warning" style="width: 35%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div>
              </td>

              <td><span class="badge bg-label-warning rounded-pill">Duruşta</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">2.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">3.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Furkan</td>
              <td class="text-truncate"><div>
                <h6 class="mb-2">75%</h6>
                <div class="progress bg-label-success" style="height: 0.3rem; width: 5rem;">
                  <div class="progress-bar bg-success" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div></td>
              <td><span class="badge bg-label-success rounded-pill">Çalışıyor</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">2.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">2.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Furkan</td>
              <td class="text-truncate"><div>
                <h6 class="mb-2">100%</h6>
                <div class="progress bg-label-success" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-success" style="width: 100%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div></td>
              <td><span class="badge bg-label-success rounded-pill">Çalışıyor</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">3.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">4.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Oktan</td>
              <td class="text-truncate">
              <div>
                <h6 class="mb-2">10%</h6>
                <div class="progress bg-label-danger" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-danger" style="width: 10%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div>
              </td>
              <td><span class="badge bg-label-danger rounded-pill">Arızalı</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">3.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">3.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Oktan</td>
              <td class="text-truncate">
              <div>
                <h6 class="mb-2">90%</h6>
                <div class="progress bg-label-success" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-success" style="width: 90%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div>
              </td>
              <td><span class="badge bg-label-success rounded-pill">Çalışıyor</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">2.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">3.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Furkan</td>
              <td class="text-truncate">
              <div>
                <h6 class="mb-2">70%</h6>
                <div class="progress bg-label-success" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-success" style="width: 70%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div>
              </td>
              <td><span class="badge bg-label-success rounded-pill">Çalışıyor</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">5.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">5.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Oktan</td>
              <td class="text-truncate"><div>
                <h6 class="mb-2">60%</h6>
                <div class="progress bg-label-warning" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-warning" style="width: 60%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div></td>
              <td><span class="badge bg-label-warning rounded-pill">Duruşta</span></td>
            </tr>
            <tr class="border-transparent">
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 text-truncate">5.Makine</h6>
                  </div>
                </div>
              </td>
              <td class="text-truncate">4.Parça</td>
              <td class="text-truncate">12/12/2024</td>
              <td class="text-truncate">Furkan</td>
              <td class="text-truncate">
              <div>
                <h6 class="mb-2">15%</h6>
                <div class="progress bg-label-danger" style="height: 0.3rem; width: 5rem">
                  <div class="progress-bar bg-danger" style="width: 15%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
              </div>
              </td>
              <td><span class="badge bg-label-danger rounded-pill">Arızalı</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Data Tables -->
</div>
@endsection
