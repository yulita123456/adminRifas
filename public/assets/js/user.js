// carousel (baner)
function swapImages() {
    var images = document.querySelectorAll('#carouselExampleIndicators .carousel-inner img');
    var firstImage = images[0].cloneNode(true); // Salin gambar pertama

    // Pindahkan gambar pertama ke posisi terakhir
    document.querySelector('.carousel-inner').appendChild(firstImage);
    document.querySelector('.carousel-inner').removeChild(images[0]);

    // Aktifkan gambar yang baru dipindahkan ke posisi terakhir
    var activeItem = document.querySelector('.carousel-item.active');
    activeItem.classList.remove('active');
    activeItem.nextElementSibling.classList.add('active');
}


// SCRIPT UNTUK MENAMPILKAN KAETEGORI PRODUK SESUAI CHECKBOX YANG DICEKLIS
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.form-check-input');
  
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
        const selectedCategories = [];
  
        checkboxes.forEach(function (cb) {
          if (cb.checked) {
            selectedCategories.push(cb.value);
          }
        });
  
        // Menambahkan token CSRF ke header permintaan
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
        fetch('/update-categories', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify({ categories: selectedCategories }),
        })
          .then(response => response.json())
          .then(data => {
            // Handle respons dari server jika diperlukan
            console.log(data);
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
    });
  });
  


  // Script untuk menampilkan form edit profil
  var btnEditProfil = document.getElementById('editProfil');

  btnEditProfil.addEventListener('click', function(){
    var elementEdit = document.getElementById('formEdit');

    if(elementEdit.style.display == 'none'){
      elementEdit.style.display = 'block';
    }else{
      elementEdit.style.display = 'none';
    }

  });


  var btnBatal = document.querySelector('#btnBatal');

  btnBatal.addEventListener('click', function(){
    var elementEdit = document.getElementById('formEdit');

    elementEdit.style.display = 'none';
  });


