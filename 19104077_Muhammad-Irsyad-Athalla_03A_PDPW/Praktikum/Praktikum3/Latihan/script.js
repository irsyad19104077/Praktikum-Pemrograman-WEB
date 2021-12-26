function tampil() {
    alert("Hallo");
}

let warna = document.getElementById('warna');

warna.addEventListener('change', (event) => {
    document.body.style.backgroundColor = warna.ariaValueMax;
});

let x = window.prompt("Masukkan Nama Anda")
window.alert('Halo ' + x);