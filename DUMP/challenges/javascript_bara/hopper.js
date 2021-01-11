document.bgColor="#D0D0C0";
document.write("<form name='grid' method='post' action=''><table border='0' bordercolor='#000000' bgcolor='#000000'>");
var l=0;
var k="";
for(var i=1;i<=64;i++)
{	
	if(i%8==1){document.write("<tr>");}
	if(i%2!=l%2){k=" bgcolor='#FFFFFF'";}
	document.write("<td"+k+"><input type='checkbox' name='c"+(64-i)+"' value='"+i+"' onclick='javascript:discrete(c"+(64-i)+")'></td>");
	if(i%8==0){document.write("</tr>");l++;}
	k="";
}
document.write("</table></form>");
document.grid.c56.checked=1;
document.grid.c56.disabled=1;

var solution="0";
var clicked=1;
function discrete(cell)
{
	clicked+=256;
	solution+=cell.value;
	cell.disabled=1;
	cell.checked=1;
	if(clicked==769 && cell!=document.grid.c9){FOUT();}
	if(clicked==3329 && cell!=document.grid.c54){FOUT();}
 	if(clicked==5889 && cell!=document.grid.c11){FOUT();}
	if(clicked==8449 && cell!=document.grid.c36){FOUT();}
	if(clicked==13569 && cell!=document.grid.c34){FOUT();}
	// \/ :)
	if(clicked==1025 && cell!=document.grid.c3){FOUT();}
	if(clicked==3073 && cell!=document.grid.c60){FOUT();}
	if(clicked==8961 && cell!=document.grid.c31){FOUT();}
	if(clicked==11009 && cell!=document.grid.c32){FOUT();}
	// |_ :)
	if(clicked==7937 && cell!=document.grid.c63){FOUT();}
	if(clicked==2049 && cell!=document.grid.c7){FOUT();}
	if(clicked==9985 && cell!=document.grid.c0){FOUT();}
	//
	if(clicked==16129){document.grid.c56.checked=0;document.grid.c56.disabled=0;}
	if(clicked==16385){CheckSolution(solution);}
}
function FOUT()
{
	document.bgColor="#FF0000";
	alert("Imposter...");
	window.location.href=document.location;
}
function CheckSolution(result)
{
	var parsing ="";
	for(var x=0;x<3;x++)
	{
		for(var y=0;y<result.length;y=y+2){parsing+=result.charAt(y);}
		result = parsing;
		parsing = "";
	}
	if(result.charAt(14)=='1'&&result.charAt(13)=='6'){window.location.href="k"+result+".htm";}
}