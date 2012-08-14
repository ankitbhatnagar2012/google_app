var HintClass = "hintTextbox";
var HintActiveClass = "hintTextboxActive";
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); };

function initHintTextboxes() {
  var inputs = document.getElementsByTagName('input');
  for (i=0; i<inputs.length; i++) {
    var input = inputs[i];
    if (input.type!="text" && input.type!="password")
      continue;
      
    if (input.className.indexOf(HintClass)!=-1) {
      input.hintText = input.value;
      input.className = HintClass;
      input.onfocus = onHintTextboxFocus;
      input.onblur = onHintTextboxBlur;
    }
  }
}

function onHintTextboxFocus() {
  var input = this;
  if (input.value.trim()==input.hintText) {
    input.value = "";
    input.className = HintActiveClass;
  }
}

function onHintTextboxBlur() {
  var input = this;
  if (input.value.trim().length==0) {
    input.value = input.hintText;
    input.className = HintClass;
  }
}

function validateForm()
{
 // alert("I validated this"); return false;
 var x=document.forms["service_check"]["client_id"].value;
 var y=document.forms["service_check"]["client_secret"].value;
 var z=document.forms["service_check"]["redirect_uri"].value;
 if (x==null || x=="" || y==null || y=="" || z==null || z=="")
   {
   alert("Google API configurations missing. Please enter valid configurations. Refer to the README, for any further information");
   return false;
   }  
}

window.onload = initHintTextboxes;
 
