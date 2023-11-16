function selectionSort(arr) {
    const n = arr.length;
    for (let i = 0; i < n - 1; i++) {
        let minIndex = i;
        for (let j = i + 1; j < n; j++) {
            if (arr[j] < arr[minIndex]) {
                minIndex = j;
            }
        }
        if (minIndex != i) {
            const nilai = arr[i];
            arr[i] = arr[minIndex];
            arr[minIndex] = nilai;
        }
    }
}

const prompt = require("prompt-sync")({sigint:true});
const n = prompt("Masukkan banyak data : ")
const numbers = prompt("Masukkan angka : ").split(' ')
if (n == numbers.length) {
    selectionSort(numbers)
    console.log(`Angka yang diurutkan: ${numbers.join(' ')}`);
} else {
    console.log('Banyak data yang diinput tidak sesuai');
}
  