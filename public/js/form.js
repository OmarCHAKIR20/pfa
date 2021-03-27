var role = document.getElementById("role_id");
var specialiteDocteur = document.getElementById("specialite");

role.addEventListener("change", function() {
    if(role.value == "docteur")
    {
     
        specialiteDocteur.type = "text"
    }else{
        specialiteDocteur.type = "hidden"
    }
});

