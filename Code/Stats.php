<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Statistik Jajanan Bang Deva</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="Stats.css" />
    <style></style>
  </head>
  <body>
  
  <?php include 'sidebar.php'; ?>

    <div class="content">
      <h1 class="header">Statistik</h1>
      <div class="subheader">Statistik Pemasukan dan Pengeluaran usaha Jajanan Bang Deva</div>

      <div class="chart-container">
        <div class="chart-title">Statistik Pemasukan</div>
        <div class="chart-canvas-container">
          <canvas id="incomeChart"></canvas>
        </div>
      </div>

      <div class="chart-container">
        <div class="chart-title">Statistik Pengeluaran</div>

        <div class="expense-item">
          <div class="expense-icon kitchen">🍳</div>
          <div class="expense-bar">
            <div>
              <div class="progress-container">
                <div class="progress-bar kitchen"></div>
              </div>
              <div class="expense-label">Operasional Dapur</div>
            </div>
            <div class="percentage">50%</div>
          </div>
        </div>

        <div class="expense-item">
          <div class="expense-icon transport">🚗</div>
          <div class="expense-bar">
            <div>
              <div class="progress-container">
                <div class="progress-bar transport"></div>
              </div>
              <div class="expense-label">Transportasi</div>
            </div>
            <div class="percentage">30%</div>
          </div>
        </div>

        <div class="expense-item">
          <div class="expense-icon other">⬜</div>
          <div class="expense-bar">
            <div>
              <div class="progress-container">
                <div class="progress-bar other"></div>
              </div>
              <div class="expense-label">Lainnya</div>
            </div>
            <div class="percentage">20%</div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Data untuk chart pemasukan
        const incomeData = {
          labels: ["Maret", "April", "Mei", "Juni"],
          datasets: [
            {
              type: "bar",
              label: "Jumlah Pemasukan minggu 1",
              backgroundColor: "#4472C4",
              data: [350000, 150000, 400000, 450000],
              order: 2,
            },
            {
              type: "bar",
              label: "Jumlah Pemasukan minggu 2",
              backgroundColor: "#ED7D31",
              data: [250000, 500000, 350000, 400000],
              order: 2,
            },
            {
              type: "bar",
              label: "Jumlah Pemasukan minggu 3",
              backgroundColor: "#A5A5A5",
              data: [300000, 600000, 500000, 500000],
              order: 2,
            },
            {
              type: "bar",
              label: "Jumlah Pemasukan minggu 4",
              backgroundColor: "#FFC000",
              data: [400000, 350000, 600000, 600000],
              order: 2,
            },
          ],
        };

        // Konfigurasi chart pemasukan
        const incomeConfig = {
          data: incomeData,
          options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
              duration: 0, // Disable animations to prevent performance issues
            },
            scales: {
              x: {
                grid: {
                  display: false,
                },
              },
              y: {
                beginAtZero: true,
                max: 700000,
                title: {
                  display: true,
                  text: "Rupiah",
                },
                ticks: {
                  callback: function (value) {
                    return value.toLocaleString();
                  },
                },
              },
              y1: {
                position: "right",
                beginAtZero: true,
                max: 2500000,
                grid: {
                  drawOnChartArea: false,
                },
                ticks: {
                  callback: function (value) {
                    return value.toLocaleString();
                  },
                },
              },
            },
            plugins: {
              legend: {
                position: "bottom",
              },
            },
          },
        };

        // Render chart pemasukan
        try {
          const incomeCtx = document.getElementById("incomeChart").getContext("2d");
          const incomeChart = new Chart(incomeCtx, incomeConfig);
        } catch (error) {
          console.error("Error creating chart:", error);
          document.getElementById("incomeChart").parentNode.innerHTML = '<div style="text-align: center; padding: 20px;">Tidak dapat memuat grafik</div>';
        }
      });
    </script>
  </body>
</html>
