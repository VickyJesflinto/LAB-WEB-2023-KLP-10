// function hitungpangkat(angka, pangkat) {
//   if (pangkat == 0) {
//     return 1;
//   } else {
//     let hasil = angka**pangkat;
//     return hasil;
//   }
// }

const prompt=require("prompt-sync")({sigint:true});

const angka = parseInt(prompt("Masukkan angka : "))
const pangkat = parseInt(prompt("Masukkan pangkat : "))

const hasilPangkat = hitungpangkat(angka, pangkat);
console.log(`Hasil: ${hasilPangkat}`);


// Menggunakan for Loop
function hitungpangkat(angka, pangkat) {
  let hasil = 1
  for (let i = 0; i < pangkat; i++) {
    hasil *= angka
  }
  return hasil;
}
