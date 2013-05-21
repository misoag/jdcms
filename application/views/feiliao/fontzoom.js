function fontZoom(size)
{
 document.getElementById('fontzoom').style.fontSize=size+'px'
}function setColor(color_val) {
document.getElementById('detail').style.backgroundColor = color_val;
writeCookie("bgColor_cookie", color_val, 24)
}