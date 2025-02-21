<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon</title>
    <style>
        .calculator {
            width: 520px;
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-weight: bold;
            color: #555;
        }
        .input-group input {
            width: 100%;
            height: 35px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1em;
            text-align: right;
            background: #f9f9f9;
        }
        .button {
            width: 100%;
            height: 45px;
            font-size: 1.2em;
            background: #4a90e2;
            color: pink;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .result {
            margin-top: 15px;
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
            background: #f1f1f1;
            padding: 10px;
            border-radius: 10px;
            text-align: left;
        }
        .history {
            margin-top: 20px;
            text-align: left;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 10px;
            max-height: 200px;
            overflow-y: auto;
        }
        .history h3 {
            margin: 0 0 10px;
            font-size: 1.1em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Diskon</h2>
        <div class="input-group">
            <label for="harga">Harga Barang (Rp):</label>
            <input type="text" id="harga" placeholder="Masukkan harga" oninput="formatInput(this)">
        </div>
        <div class="input-group">
            <label for="diskon">Diskon (%):</label>
            <input type="number" id="diskon" placeholder="Masukkan diskon" step="0.01" min="0" max="100">
        </div>
        <button class="button" onclick="hitungDiskon()">Hitung</button>
        <div class="result" id="hasil"></div>
        <div class="history" id="history">
            <h3>Riwayat Perhitungan:</h3>
            <ul id="history-list"></ul>
        </div>
    </div>
    <script>
        function formatInput(input) {
            let value = input.value.replace(/\./g, ''); 
            if (!isNaN(value) && value !== '') {
                input.value = parseInt(value).toLocaleString('id-ID'); 
            } else {
                input.value = '';
            }
        }

        function hitungDiskon() {
            let harga = document.getElementById('harga').value.replace(/\./g, ''); 
            let diskon = parseFloat(document.getElementById('diskon').value);
            harga = parseFloat(harga);

            if (isNaN(harga) || isNaN(diskon) || harga < 0 || diskon < 0) {
                document.getElementById('hasil').innerHTML = "Masukkan angka yang valid dan tidak negatif";
                return;
            }
            if (diskon > 100) {
                document.getElementById('hasil').innerHTML = "Diskon tidak boleh lebih dari 100%";
                return;
            }
            let potongan = harga * (diskon / 100);
            let hargaSetelahDiskon = harga - potongan;

            let hasilHTML = `
                <p>Harga Barang : Rp. <strong>${harga.toLocaleString('id-ID', { minimumFractionDigits: 2 })}</strong></p>
                <p>Diskon ${diskon}% : Rp. <strong>${potongan.toLocaleString('id-ID', { minimumFractionDigits: 2 })}</strong></p>
                <p>Total Harga setelah diskon : Rp. <strong>${hargaSetelahDiskon.toLocaleString('id-ID', { minimumFractionDigits: 2 })}</strong></p>`;
            
            document.getElementById('hasil').innerHTML = hasilHTML;
            
            let historyList = document.getElementById('history-list');
            let historyItem = document.createElement('li');
            historyItem.innerHTML = hasilHTML;
            historyList.prepend(historyItem);
        }
    </script>
</body>
</html>
