function fullscreen(){
var hdiff;
window.resizeTo(screen.width/2,screen.height/2)
window.moveTo(0,10)

hdiff=window.screenTop;
window.moveTo(-6,-hdiff+6);
window.resizeTo(screen.width+13,screen.height+hdiff+26)
}

function restore(){
window.moveTo(-4,-4);
window.resizeTo(screen.width+8,screen.availHeight+8);
}