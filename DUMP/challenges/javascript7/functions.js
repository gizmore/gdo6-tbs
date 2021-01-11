function memCheck()
{
var usr=document.form1.username.value;
var pas=document.form2.passwrd.value;
var user=usr.toLowerCase();
var pass=pas.toLowerCase();

for (i=0; i<mem.length; i++)
{
var memU= mem[i].toLowerCase();
var splt= memU.split("^");
if (user==splt[0] && pass==splt[1])
{
window.open(splt[2]);
} 
}

}

function openMenu(menuName, state)
{
if (navigator.appName=="Microsoft Internet Explorer")
{
document.all[menuName].style.visibility= state;
}

else
{
document[menuName].visibility = state;
}

}

window.defaultStatus="Nighthawks Password ";