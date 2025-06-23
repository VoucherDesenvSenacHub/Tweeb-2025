console.log("foto-funcionario.js carregado");

const inputFoto = document.getElementById('input-foto');
const imgPreview = document.querySelector('.funcionario-form-foto img');

inputFoto.addEventListener('change', function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imgPreview.src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
});
