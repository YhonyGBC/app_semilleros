function checkForm(form){
  if(form.inputTitle.value == "") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe escribir el título del proyecto!',
      })
    form.inputTitle.focus();
    return false;
  }
  if(form.inputInte.value == "Null") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar los integrantes del proyecto!',
      })
    form.inputInte.focus();
    return false;
  }
  if(form.inputTipo.value == "Null") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar el tipo de proyecto!',
      })
    form.inputTipo.focus();
    return false;
  }
  if(form.inputEstado.value == "Null") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar el estado del proyecto!',
      })
    form.inputEstado.focus();
    return false;
  }
  if(form.inputZip.value == "") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar el archivo!',
      })
    form.inputZip.focus();
    return false;
  }
  if(form.inputDate_Ini.value == "") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar la fecha de inicio del proyecto!',
      })
    form.inputDate_Ini.focus();
    return false;
  }
    return true;
  }