<!DOCTYPE html>
<html>
<head>
    <title>Tiket Konser</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url(https://example.com/concert-background.jpg); /* Ganti URL dengan gambar latar belakang konser yang sesuai */
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            margin-right: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 10px;
        }

        label {
            width: 120px;
            margin-right: 10px;
        }

        input, select {
            flex: 1;
            padding: 5px;
            height: 29px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .output-container {
            margin-left: 20px;
            border-left: 1px solid #ccc;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="ticket_type">Jenis Tiket:</label>
                    <select id="ticket_type" name="ticket_type" required>
                        <option value="VIP">VIP</option>
                        <option value="Regular">Regular</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah Tiket:</label>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
                <input type="submit" value="Hitung">
            </form>
        </div>
        <div class="output-container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include 'konser.php'; // Pastikan untuk menyertakan file definisi kelas

                $konser = new Konser();
                $konser->name = $_POST['name'];
                $konser->ticket_type = $_POST['ticket_type'];
                $konser->quantity = $_POST['quantity'];
                
                // Set harga tiket untuk masing-masing jenis
                $konser->setHarga(1000000, 500000, 300000); // Harga contoh

                // Tampilkan detail pembayaran
                $konser->pembayaran();
            }
            ?>
        </div>
    </div>
</body>
</html>
