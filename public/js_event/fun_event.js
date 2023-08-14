function formCheck(form){
    if(form.inputName.value == "") {
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe escribir el nombre del evento!',
        })
      form.inputName.focus();
      return false;
    }
    if(form.imputDate.value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe seleccionar la fecha del evento!',
          })
        form.imputDate.focus();
        return false;
    }
    if(form.inputLugar.value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe escribir el lugar del evento!',
          })
        form.inputLugar.focus();
        return false;
    }
    if(form.imputTipo_event.value == "Null") {
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe seleccionar el tipo de evento!',
        })
      form.imputTipo_event.focus();
      return false;
    }
    if(form.imputModalidad.value == "Null") {
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe seleccionar la modalidad del evento!',
        })
      form.imputModalidad.focus();
      return false;
    }
    if(form.imputClas.value == "Null") {
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debe seleccionar la clasificación del evento!',
        })
      form.imputClas.focus();
      return false;
    }
    if(form.imputObs.value == "" && form.imputDesc.value == ""){
        return true;
    }else{
        return true;
    }
}