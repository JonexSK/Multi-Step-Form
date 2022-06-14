var Page1 = document.getElementById("page1");
var Page2 = document.getElementById("page2");
var Page3 = document.getElementById("page3");

var Next1 = document.getElementById("next1");
var Next2 = document.getElementById("next2");
var Back1 = document.getElementById("back1");
var Back2 = document.getElementById("back2");

var Progress = document.getElementById("progress");

Page1.style.visibility = "visible";
Page2.style.visibility = "hidden";
Page3.style.visibility = "hidden";

Next1.onclick = function()
{
    Page1.style.visibility = "hidden";
    Page2.style.visibility = "visible";
    Page3.style.visibility = "hidden";
    Progress.style.width = "400px";
}

Next2.onclick = function()
{
    Page1.style.visibility = "hidden";
    Page2.style.visibility = "hidden";
    Page3.style.visibility = "visible";
    Progress.style.width = "600px";
}

Back1.onclick = function()
{
    Page1.style.visibility = "visible";
    Page2.style.visibility = "hidden";
    Page3.style.visibility = "hidden";
    Progress.style.width = "200px";
}

Back2.onclick = function()
{
    Page1.style.visibility = "hidden";
    Page2.style.visibility = "visible";
    Page3.style.visibility = "hidden";
    Progress.style.width = "400px";
}