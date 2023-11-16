function isPalindrome(input) {
  if (typeof input != String) {
    input = input.toString();
  }
  
  input = input.toLowerCase();
  // Cara 1
  //   const reversedInput = input.split('').reverse().join('');

  // Cara 2
  let hasil = ""
  for (let i = input.length - 1; i >= 0; i--) {
    hasil += input[i]
  }
  
  if (input == hasil) {
    console.log(`${input} adalah palindrom.`);
  } else{
    console.log(`${inputan} bukan palindrom.`);
  }
}
  
  const prompt = require("prompt-sync")({sigint:true});
  const inputan = prompt("Masukkan kata/angka : ")
  isPalindrome(inputan)