<?php
class Konser {
    public $name;
    public $ticket_type;
    public $quantity;
    private $hargaVIP;
    private $hargaRegular;
    private $hargaStudent;

    public function setHarga($vip, $regular, $student) {
        $this->hargaVIP = $vip;
        $this->hargaRegular = $regular;
        $this->hargaStudent = $student;
    }

   

    private function getHarga(){
        if($this->ticket_type =='VIP'){
            return $this->hargaVIP;
        } else if ($this->ticket_type =='Regular'){
            return $this->hargaRegular;
        } else{
            return $this->hargaStudent;
        }
    }

    public function pembayaran() {
        $hargaPerTiket = $this->getHarga();
        $total = $hargaPerTiket * $this->quantity;
        
        echo "<p>Nama: {$this->name}</p>";
        echo "<p>Jenis Tiket: {$this->ticket_type}</p>";
        echo "<p>Jumlah Tiket: {$this->quantity}</p>";
        echo "<p>Harga per Tiket: Rp " . number_format($hargaPerTiket, 0, ',', '.') . "</p>";
        echo "<p>Total Pembayaran: Rp " . number_format($total, 0, ',', '.') . "</p>";
    }
}
?>
