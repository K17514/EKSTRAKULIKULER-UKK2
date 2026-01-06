<div class="container py-5">
  <div class="row mb-4">
    <h3 class="fw-bold">Admin Dashboard</h3>
    <p class="text-muted">Ringkasan aktivitas klub</p>
  </div>

  <!-- STAT CARDS -->
  <div class="row g-4 mb-5">
    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-muted">Total Tugas</h6>
          <h2 class="fw-bold">42</h2>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-muted">Selesai</h6>
          <h2 class="fw-bold text-success">28</h2>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-muted">Pending</h6>
          <h2 class="fw-bold text-warning">14</h2>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-muted">Anggota Aktif</h6>
          <h2 class="fw-bold text-primary">12</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- CHART SECTION -->
  <div class="row g-4">

    <!-- BAR CHART -->
    <div class="col-md-8">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Aktivitas Tugas (Bulanan)</h5>
          <canvas id="taskChart" height="100"></canvas>
        </div>
      </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Priority Tugas</h5>
          <canvas id="priorityChart"></canvas>
        </div>
      </div>
    </div>

  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // BAR CHART - Aktivitas Bulanan
  const taskCtx = document.getElementById('taskChart');

  new Chart(taskCtx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
      datasets: [{
        label: 'Tugas Dibuat',
        data: [5, 8, 6, 10, 7, 6],
        backgroundColor: '#6c63ff'
      }, {
        label: 'Tugas Selesai',
        data: [3, 6, 5, 8, 4, 2],
        backgroundColor: '#2ecc71'
      }]
    },
    options: {
      responsive: true,
      borderRadius: 10,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });

  // PIE CHART - Priority
  const priorityCtx = document.getElementById('priorityChart');

  new Chart(priorityCtx, {
    type: 'doughnut',
    data: {
      labels: ['High', 'Medium', 'Low'],
      datasets: [{
        data: [12, 18, 12],
        backgroundColor: [
          '#e74c3c',
          '#f1c40f',
          '#3498db'
        ]
      }]
    },
    options: {
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
</script>
