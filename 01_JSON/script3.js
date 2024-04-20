// merubah dari objek ke json
let siswa1 = {
  nama: "kevin",
  umur: 17,
  lulus: true,
};
let data1 = JSON.stringify(siswa1);
console.log(data1);

// merubah dari json ke objek
let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    let siswa2 = this.responseText;
    let data2 = JSON.parse(siswa2);
    console.log(data2);
  }
};
xhr.open("GET", "coba.json", true);
xhr.send();

// jquery
$.getJSON('coba.json', function(data) {
    console.log(data);
});
