<?php include('headerdll/sidebar.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Sistem Kasir</title>
  <style>
    { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
    body {
      margin: 0;
      display: flex;
      height: 100vh;
      background: linear-gradient(to right, #e7ecf5, #cbd6e9);
    }

    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    .top-bar {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .content {
      display: flex;
      gap: 20px;
      flex: 1;
    }

    .pesanan, .menu {
      background-color: #f7faff;
      padding: 20px;
      border-radius: 10px;
    }

    .pesanan {
      width: 60%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ccc;
    }

    .total {
      text-align: right;
      font-size: 18px;
      margin-top: 10px;
      font-weight: bold;
    }

    .bayar-btn {
      margin-top: 10px;
      padding: 12px;
      background-color: #5b9bd5;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }

    .menu {
      width: 40%;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
    }

    .produk-card {
      background-color: #a0b6d4;
      color: white;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      cursor: pointer;
    }

    .produk-card:hover {
      background-color: #90a8c2;
    }

    .footer-right {
      text-align: right;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <!-- Main Content -->
  <div class="main">
    <div class="top-bar">PESANAN</div>
    <div class="content">

      <!-- Pesanan -->
      <div class="pesanan">
        <div>
          <table id="pesananTable">
            <thead>
              <tr>
                <th>Item</th>
                <th>Jml</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div class="total" id="totalHarga">TOTAL: Rp 0</div>
        </div>
        <div class="footer-right">
          <button class="bayar-btn">B a y a r</button>
        </div>
      </div>

      <!-- Menu Produk -->
      <div class="menu">
        <!-- Produk akan di-generate dengan JavaScript -->
      </div>

    </div>
  </div>

  <script>
    const produkList = [
      { nama: "Chicken Wings", harga: 32000 },
      { nama: "Chicken Stick", harga: 20000 },
      { nama: "Chicken Popcorn", harga: 23000 },
      { nama: "Dino Nugget", harga: 12000 },
      { nama: "Chocolate Frappe", harga: 39000 },
      { nama: "French Fries", harga: 15000 },
      { nama: "Hot Cappuccino", harga: 18000 },
      { nama: "Mie Goreng", harga: 17000 },
      { nama: "Lemon Tea", harga: 10000 }
    ];

    const menuDiv = document.querySelector('.menu');
    const tbody = document.querySelector('#pesananTable tbody');
    const totalHargaDiv = document.getElementById('totalHarga');

    const pesanan = {};

    function updateTable() {
      tbody.innerHTML = '';
      let total = 0;
      for (const [nama, data] of Object.entries(pesanan)) {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${nama}</td>
          <td>${data.jumlah}x</td>
          <td>Rp ${data.harga * data.jumlah}</td>
        `;
        tbody.appendChild(tr);
        total += data.harga * data.jumlah;
      }
      totalHargaDiv.textContent = `TOTAL: Rp ${total.toLocaleString()}`;
    }

    produkList.forEach(prod => {
      const div = document.createElement('div');
      div.className = 'produk-card';
      div.innerHTML = `${prod.nama}<br><small>Rp ${prod.harga.toLocaleString()}</small>`;
      div.addEventListener('click', () => {
        if (pesanan[prod.nama]) {
          pesanan[prod.nama].jumlah++;
        } else {
          pesanan[prod.nama] = { harga: prod.harga, jumlah: 1 };
        }
        updateTable();
      });
      menuDiv.appendChild(div);
    });
  </script>

</body>
</html>
