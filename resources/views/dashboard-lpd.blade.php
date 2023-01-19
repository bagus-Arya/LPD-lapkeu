@extends('layouts.user_type.auth')

@section('content')
  <div class="col-lg-12">
      <div class="card text-center p-3" style="height:500px">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover " style="height:500px;background-image: url('../assets/img/money.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column p-3" style="margin-top:150px">
            <h5 class="text-white font-weight-bolder mb-4 pt-2">LAPORIN</h5>
            <p class="text-white">         
                LAPORIN adalah Sistem Informasi Laporan Keuangan pada LPD Desa Adat Nyanglan Kaja
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">  
    <div class="col-lg-6">
      <div class="card z-index-2">
        <div class="card-header pb-0">
          <h6>Pendapatan</h6>
          <!-- <p class="text-sm">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2021
          </p> -->
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card z-index-2">
        <div class="card-header pb-0">
          <h6>Pengeluaran</h6>
          <!-- <p class="text-sm">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2021
          </p> -->
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-pengeluaran" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('dashboard-lpd')
  <script>
    window.onload = function() {

      var ctx1 = document.getElementById("chart-pengeluaran").getContext("2d");

      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      $P_Jan = {{$P_Jan}};
      $P_Feb = {{$P_Feb}};
      $P_Mar = {{$P_Mar}};
      $P_Apr = {{$P_Apr}};
      $P_Mei = {{$P_Mei}};
      $P_Jun = {{$P_Jun}};
      $P_Jul = {{$P_Jul}};
      $P_Aug = {{$P_Aug}};
      $P_Sep = {{$P_Sep}};
      $P_Oct = {{$P_Oct}};
      $P_Nov = {{$P_Nov}};
      $P_Des = {{$P_Des}};

      new Chart(ctx1, {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Maret", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Pengeluaran",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c35",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [$P_Jan, $P_Feb, $P_Mar, $P_Apr, $P_Mei, $P_Jun, $P_Jul, $P_Aug, $P_Sep, $P_Oct, $P_Nov, $P_Des],
              maxBarThickness: 6

            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#0f0f0f',
                font: {
                  size: 12,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#0f0f0f',
                padding: 20,
                font: {
                  size: 12,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });

      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      $Jan = {{$Jan}};
      $Feb = {{$Feb}};
      $Mar = {{$Mar}};
      $Apr = {{$Apr}};
      $Mei = {{$Mei}};
      $Jun = {{$Jun}};
      $Jul = {{$Jul}};
      $Aug = {{$Aug}};
      $Sep = {{$Sep}};
      $Oct = {{$Oct}};
      $Nov = {{$Nov}};
      $Des = {{$Des}};

      new Chart(ctx2, {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Maret", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Pendapatan",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#46ab2b",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [$Jan, $Feb, $Mar, $Apr, $Mei, $Jun, $Jul, $Aug, $Sep, $Oct, $Nov, $Des],
              maxBarThickness: 6

            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#0f0f0f',
                font: {
                  size: 12,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#0f0f0f',
                padding: 20,
                font: {
                  size: 12,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush