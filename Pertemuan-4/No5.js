// const prompt=require("prompt-sync")({sigint:true});
// const number = parseInt(prompt("Masukkan angka"));
// const binary = number.toString(2);
// console.log(binary);

function numberToBinary(number) {
    if (number == 0) {
      return '0';
    }
  
    let binary = '';
    while (number > 0) {
      const sisa = number % 2;
      binary = sisa + binary;
      number = Math.floor(number / 2);
    }
    return binary;
}
  
const prompt = require("prompt-sync")({sigint:true});
const number = prompt("Masukkan angka : ")
const result = numberToBinary(parseInt(number))
console.log(`Angka biner: ${result}`);
