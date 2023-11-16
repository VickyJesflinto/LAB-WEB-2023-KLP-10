// Cara 1
const prompt = require("prompt-sync")({ sigint: true });

let x = prompt("Masukkan Kata : ");
let y = '';
let n = parseInt(prompt("Masukkan Shift : "));

// Validasi input shift
if (isNaN(n)) {
  console.log("Shift harus berupa angka.");
  process.exit(1);
}

const z = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

for (let i of x) {
  let a = z.indexOf(i);
  if (a === -1) {
    // Karakter tidak ditemukan di dalam z, biarkan seperti itu
    y += i;
  } else {
    // Gunakan operasi modulo untuk mengatasi overflow
    a = (a + n) % 26;
    if (a < 0) {
      a += 26;
    }
    y += z[a];
  }
}

console.log(y);

// Cara 2 (Metode ASCII)
// function caesarCipher(text, shift) {
//     let result = '';
//     for (let i = 0; i < text.length; i++) {
//       let char = text[i];
//       if (char.match(/[a-zA-Z]/)) {
//         const isUpperCase = char === char.toUpperCase();
  
//         let charCode = char.charCodeAt(0);
//         charCode = ((charCode - (isUpperCase ? 65 : 97) + shift) % 26) + (isUpperCase ? 65 : 97);
//         // a = 97, shift = 3
//         // ((97 - 97 + 3) % 26) + (97)
//         // 100 = C
//         result += String.fromCharCode(charCode);
//       } else {
//         result += char;
//       }
//     }
//     return result;
//   }
  
// const prompt=require("prompt-sync")({sigint:true});
// const text = prompt("Masukkan kata : ")
// const shift = parseInt(prompt("Masukkan shift : "))

// const ciphertext = caesarCipher(text, shift);
// console.log(`Ciphertext: ${ciphertext}`);
