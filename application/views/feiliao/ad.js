

var imgUrl=new Array();
var imgLink=new Array();
var adimgwidth=979
var adimgheight=290
var adNum=0;
var jumpUrl="http://dm.i-c.net.cn/hhmg";

imgUrl[1]="images/1.jpg"/*tpa=http://www.ytbairuite.com/images/1.jpg*/;

imgUrl[2]="images/2.jpg"/*tpa=http://www.ytbairuite.com/images/2.jpg*/;

imgUrl[3]="images/index_04_02.jpg"/*tpa=http://www.ytbairuite.com/images/index_04_02.jpg*/;


var imgPre=new Array();
var j=0;
for (i=1;i<=2;i++) {
	if( (imgUrl[i]!="") && (imgLink[i]!="") ) {
		j++;
	} else {
		break;
	}
}

function playTran(){
	if (document.all)
		imgInit.filters.revealTrans.play();
}

var key=0;
function nextAd(){
	if(adNum<j)adNum++ ;
	else adNum=1;
	
	if( key==0 ){
		key=1;
	} else if (document.all){
		imgInit.filters.revealTrans.Transition=23;
		imgInit.filters.revealTrans.apply();
             playTran();

	}
	document.images.imgInit.src=imgUrl[adNum];
	theTimer=setTimeout("nextAd()", 5000);
}


function goUrl(){
	jumpUrl=imgLink[adNum];
	jumpTarget='_blank';
	if (jumpUrl != ''){
		if (jumpTarget != '') 
			window.open(jumpUrl,jumpTarget);
		else
			location.href=jumpUrl;
	}
}

document.write ('<IMG style="FILTER: revealTrans(duration=2,transition=18)" height="'+adimgheight+'" width="'+adimgwidth+'" border=0 name=imgInit src="">')
nextAd()