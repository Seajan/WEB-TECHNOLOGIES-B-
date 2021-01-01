function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    var y = document.forms["myForm"]["email"].value;
    if (y == "") {
      alert("email must be filled out");
      return false;
    }
    var z = document.forms["myForm"]["mobile"].value;
    if (z == "") {
      alert("mobile must be filled out");
      return false;
    }
    var xx = document.forms["myForm"]["username"].value;
    if (xx == "") {
      alert("username must be filled out");
      return false;
    }
    var xy = document.forms["myForm"]["password"].value;
    if (xy == "") {
      alert("username must be filled out");
      return false;
    }
    else{
        if(xy!=""){
            if(!(xy.length >= 4)){
                alert("Password length must be greater than or equal 4");
                return false;
            }
        }
    }
  }