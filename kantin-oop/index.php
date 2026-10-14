<?php
// ==========================================
// 1. CLASS INDUK (ENTITY / PARENT CLASS)
// ==========================================
// ==========================================
// 2. CLASS TURUNAN (SUBCLASS)
// ==========================================

// Class Makanan mewarisi class Menu (Inheritance)
class Makanan extends Menu {
    private $levelPedas;

    public function __construct($id, $nama, $harga, $levelPedas) {
        // Memanggil constructor dari class induk
        parent::__construct($id, $nama, $harga);
        $this->levelPedas = $levelPedas;
    }

    public function getLevelPedas() {
        return $this->levelPedas;
    }

    // Polymorphism: Override method displayInfo()
    public function displayInfo() {
        return "🍔 <strong>[MAKANAN]</strong> ID: {$this->id} &mdash; <strong>{$this->nama}</strong> (Level Pedas: {$this->levelPedas}) &mdash; Rp " . number_format($this->harga, 0, ',', '.');
    }
}

// Class Minuman mewarisi class Menu (Inheritance)
class Minuman extends Menu {
    private $ukuran;

    public function __construct($id, $nama, $harga, $ukuran) {
        // Memanggil constructor dari class induk
        parent::__construct($id, $nama, $harga);
        $this->ukuran = $ukuran;
    }

    public function getUkuran() {
        return $this->ukuran;
    }

    // Polymorphism: Override method displayInfo()
    public function displayInfo() {
        return "🥤 <strong>[MINUMAN]</strong> ID: {$this->id} &mdash; <strong>{$this->nama}</strong> (Ukuran: {$this->ukuran}) &mdash; Rp " . number_format($this->harga, 0, ',', '.');
    }
}
class Menu {
    // Encapsulation: Access modifier 'protected'
    protected $id;
    protected $nama;
    protected $harga;

    // Constructor: Inisialisasi properti otomatis
    public function __construct($id, $nama, $harga) {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
    }

    // Getter & Setter (Encapsulation)
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNama() {
        return $this->nama;
    }
    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getHarga() {
        return $this->harga;
    }
    public function setHarga($harga) {
        $this->harga = $harga;
    }

    // Method umum untuk menampilkan informasi dasar
    public function displayInfo() {
        return "ID: {$this->id} | Menu: {$this->nama} | Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }
}
// ==========================================
// 3. MENAMPILKAN HASIL DI BROWSER
// ==========================================
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Kantin</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 40px;
            color: #333;
        }
        .container {
            max-width: 650px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f8f9fa;
            margin: 10px 0;
            padding: 12px 15px;
            border-left: 4px solid #3498db;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Pesanan Kantin</h2>
    <ul>
        <?php
        // Membuat (instansiasi) beberapa objek dari class turunan
        $menu1 = new Makanan("M001", "Nasi Ayam Geprek", 18000, "Level 3");
        $menu2 = new Makanan("M002", "Mie Instan Telor", 12000, "Level 1");
        $menu3 = new Minuman("B001", "Es Teh Manis", 5000, "Jumbo");
        $menu4 = new Minuman("B002", "Jus Alpukat", 10000, "Regular");

        // Menampilkan output ke browser menggunakan echo dan method displayInfo()
        echo "<li>" . $menu1->displayInfo() . "</li>";
        echo "<li>" . $menu2->displayInfo() . "</li>";
        echo "<li>" . $menu3->displayInfo() . "</li>";
        echo "<li>" . $menu4->displayInfo() . "</li>";
        ?>
    </ul>
</div>

</body>
</html>