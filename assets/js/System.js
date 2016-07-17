//alert("System.JS cargado");
if(Notification.permission !== "granted"){
  alert("El sitio SCA requiere su permiso para mostrar notificaciones.");
  Notification.requestPermission()
}
function notificacion(){
  if(Notification){
    var title = "SCA"
    var extra = {
      icon: "https://pixabay.com/static/uploads/photo/2012/04/01/18/59/padlock-24051_960_720.png",
      body: "Usuario y/o Contraseña Incorrecto(s)."
    }

    var noti = new Notification(title, extra)
    setTimeout(function(){
      noti.close()
    },5000)
  }
}

function frm_OK(){
  if(Notification){
    var title = "SCA"
    var extra = {
      icon: "http://104.238.80.149/~myskylink/myskylink/wp-content/uploads/2015/04/alertnotifications-round.png",
      body: "Formulario Registrado"
    }

    var noti = new Notification(title, extra)
    setTimeout(function(){
      noti.close()
    },5000)
  }
}

function frm_Fail(){
  if(Notification){
    var title = "SCA"
    var extra = {
      icon: "http://104.238.80.149/~myskylink/myskylink/wp-content/uploads/2015/04/alertnotifications-round.png",
      body: "No se Registro el Formulario"
    }

    var noti = new Notification(title, extra)
    setTimeout(function(){
      noti.close()
    },5000)
  }
}

function sec_Warning(){
  if(Notification){
    var title = "SCA"
    var extra = {
      icon: "http://104.238.80.149/~myskylink/myskylink/wp-content/uploads/2015/04/alertnotifications-round.png",
      body: "Intrucion Detectada"
    }

    var noti = new Notification(title, extra)
    setTimeout(function(){
      noti.close()
    },5000)
  }
}
