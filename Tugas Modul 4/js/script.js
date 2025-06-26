const produk = [
  { nama: "Produk A", harga: 16500000, gambar: "img/produk1.jpg" },
  { nama: "Produk B", harga: 15000000, gambar: "img/produk2.jpg" },
  { nama: "Produk C", harga: 9500000, gambar: "img/produk3.jpg" }
];

let indexProduk = 0;

function tampilkanProduk() {
  const produkSekarang = produk[indexProduk];
  document.getElementById("gambar-produk").src = produkSekarang.gambar;
  document.getElementById("nama-produk").innerText = produkSekarang.nama;
  document.getElementById("harga-produk").innerText = "Rp " + produkSekarang.harga.toLocaleString();
  document.getElementById("pilihanProduk").value = produkSekarang.nama;
}

function gantiProduk(arah) {
  indexProduk += arah;
  if (indexProduk >= produk.length) indexProduk = 0;
  if (indexProduk < 0) indexProduk = produk.length - 1;
  tampilkanProduk();
}

function prosesPemesanan() {
  const nama = document.getElementById("namaPemesan").value.trim();
  const namaProduk = document.getElementById("pilihanProduk").value;
  const jumlah = parseInt(document.getElementById("jumlah").value);
  const kode = document.getElementById("kodePromo").value.trim();

  const produkTerpilih = produk.find(p => p.nama === namaProduk);
  const harga = produkTerpilih ? produkTerpilih.harga : 0;
  const subtotal = harga * jumlah;

  let potongan = 0;
  if (kode.toUpperCase() === "DISKON10") {
    potongan = subtotal * 0.10;
  }

  const totalAkhir = subtotal - potongan;

  const orderId = "INV-" + Math.floor(10000 + Math.random() * 90000);

  const output = `
    <p><strong>Order ID:</strong> ${orderId}</p>
    <p><strong>Nama Pemesan:</strong> ${nama}</p>
    <p><strong>Produk:</strong> ${namaProduk}</p>
    <p><strong>Jumlah:</strong> ${jumlah}</p>
    <p><strong>Subtotal:</strong> Rp ${subtotal.toLocaleString()}</p>
    <p><strong>Potongan:</strong> Rp ${potongan.toLocaleString()}</p>
    <p><strong>Total Bayar:</strong> <b>Rp ${totalAkhir.toLocaleString()}</b></p>
  `;

  document.getElementById("output").innerHTML = output;
  return false;
}
