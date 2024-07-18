function cekPengarang (){
    let pengarang=document.forms ['formBuku']['pengarang'].value;
    if(pengarang==""){
      alert("Pengarang tidak boleh kosong");
    }
  }

  function updateTotal(){
    harga = document.getElementById('harga').value;
    jumlah = document.getElementById('jumlah').value;
    total=harga*jumlah;

    document.getElementById('total').value = total;
}

function cekJumlahHurufKode() {
  input = document.getElementById('kodebuku').value;
  if (input.length) {
    alert('kode maksimal 5 huruf');
  }
}

// function cekJumlahHurufKode(){
//   input=document.getElementById('kodebuku').value;
//   if(input.length > 5){
//     alert('kode maksimal 5 huruf');
//   }
// }