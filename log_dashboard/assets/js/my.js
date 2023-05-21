// ambil tag input
var keyword = document.getElementById('keyword');
// ambil tombol cari
var tombolCari = document.getElementById('tombol-cari');
// ambil tbody
var container = document.getElementById('container');

// ambil inputan keyword
keyword.addEventListener('keyup', function() {
    
    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            // console.log(xhr.responseText);
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/log.php?keyword=' + keyword.value, true)
    xhr.send();

});




// tombolCari.addEventListener('click', function() {
//     alert('berhasil');
// });