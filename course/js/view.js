if(document.getElementById("catalog")){var mEffect={};mEffect.init=function(){this.holder1=document.getElementById("holder1");this.holder2=document.getElementById("holder2");this.temp=null;this.data=null;this.mT=null;this.fadeT=null;this.mItems=this.holder1.getElementsByTagName("DD");this.mItemNum=this.holder1.getElementsByTagName("DD").length;this.mSubItems=null;this.mSubItemNum=0;this.mSub=this.holder1.getElementsByTagName("OL");this.mSubNum=this.mSub.length;this.mShowNum=3;this.h=0;this.dataH=0;this.fade=0};mEffect.start=function(){mEffect.init();if(mEffect.mItemNum<=mEffect.mShowNum&&mEffect.mSubNum==0){return }var A="";var D="";for(var C=0;C<mEffect.mSubNum;C++){mEffect.mSub[C].style.display="inline"}var B=mEffect.holder1.offsetWidth;for(var C=0;C<mEffect.mSubNum;C++){mEffect.mSub[C].style.display="none"}if(mEffect.mItemNum>mEffect.mShowNum){for(var C=0;C<mEffect.mShowNum;C++){A+="<dd>"+mEffect.mItems[C].innerHTML+"</dd>"}D="<dd id='temp' class='temp'><ul id='data' class='data'>";for(var C=mEffect.mShowNum;C<mEffect.mItemNum;C++){D+="<li>"+mEffect.mItems[C].innerHTML+"</li>"}D+="</ul></dd>";mEffect.holder2.innerHTML=A+D;for(var C=mEffect.mShowNum;C<mEffect.mItemNum;C++){mEffect.mItems[C].style.display="none"}mEffect.temp=document.getElementById("temp");mEffect.data=document.getElementById("data");mEffect.holder2.style.display="block";mEffect.temp.style.height=0+"px";mEffect.dataH=mEffect.data.offsetHeight}else{mEffect.holder2.innerHTML=mEffect.holder1.innerHTML}mEffect.holder1.style.width=B+"px";mEffect.holder2.style.width=B+"px";mEffect.holder1.style.visibility="hidden";mEffect.holder2.style.display="block";mEffect.holder2.className="arr";mEffect.mSubItems=mEffect.holder2.getElementsByTagName("OL");mEffect.mSubItemNum=mEffect.mSubItems.length;mEffect.holder2.onmouseover=function(){clearTimeout(mEffect.mT);mEffect.mT=setTimeout("mEffect.maxM()",100)};mEffect.holder2.onmouseout=function(){clearTimeout(mEffect.mT);if(mEffect.mSubNum>0){mEffect.mT=setTimeout("mEffect.hideSecondTitle()",400)}else{mEffect.mT=setTimeout("mEffect.minM()",100)}}};mEffect.maxM=function(){if(mEffect.h<mEffect.dataH){mEffect.h+=10;mEffect.temp.style.height=mEffect.h+"px";mEffect.data.style.marginTop=(mEffect.h-mEffect.dataH)+"px";mEffect.holder2.className="";mEffect.mT=setTimeout("mEffect.maxM()",10)}else{mEffect.showSecondTitle()}};mEffect.minM=function(){if(mEffect.h>0){mEffect.h-=10;mEffect.temp.style.height=mEffect.h+"px";mEffect.data.style.marginTop=(mEffect.h-mEffect.dataH)+"px";mEffect.mT=setTimeout("mEffect.minM()",10)}else{mEffect.holder2.className="arr"}};mEffect.fadeIn=function(){clearTimeout(mEffect.fadeT);if(mEffect.fade>=100){return }mEffect.fade+=5;for(var A=0;A<mEffect.mSubItemNum;A++){mEffect.mSubItems[A].style.filter="Alpha(Opacity="+mEffect.fade+")";mEffect.mSubItems[A].style.opacity=mEffect.fade/100}mEffect.fadeT=setTimeout("mEffect.fadeIn()",20)};mEffect.fadeOut=function(){clearTimeout(mEffect.fadeT);if(mEffect.fade<=15){for(var A=0;A<mEffect.mSubItemNum;A++){mEffect.mSubItems[A].style.display="none"}if(mEffect.mItemNum>mEffect.mShowNum){mEffect.h=mEffect.data.offsetHeight;mEffect.temp.style.height=mEffect.h+"px"}mEffect.mT=setTimeout("mEffect.minM()",20);return }mEffect.fade-=5;for(var A=0;A<mEffect.mSubItemNum;A++){mEffect.mSubItems[A].style.filter="Alpha(Opacity="+mEffect.fade+")";mEffect.mSubItems[A].style.opacity=mEffect.fade/100}mEffect.fadeT=setTimeout("mEffect.fadeOut()",20)};mEffect.showSecondTitle=function(){for(var A=0;A<mEffect.mSubItemNum;A++){mEffect.mSubItems[A].style.display="block"}if(mEffect.mItemNum>mEffect.mShowNum){mEffect.h=mEffect.data.offsetHeight;mEffect.temp.style.height=mEffect.h+"px"}else{mEffect.holder2.className=""}mEffect.fadeT=setTimeout("mEffect.fadeIn()",10)};mEffect.hideSecondTitle=function(){mEffect.fadeT=setTimeout("mEffect.fadeOut()",10)};mEffect.showCatalog=function(){var A=mEffect.holder1.style.display=="none";mEffect.holder1.style.display=A?"block":"none";if(mEffect.mItemNum<=mEffect.mShowNum&&mEffect.mSubNum==0){mEffect.holder2.style.display="none"}else{mEffect.holder2.style.display=A?"block":"none"}document.getElementById("dir_alt").innerHTML=A?"\u9690\u85cf":"\u663E\u793A"};mEffect.start()};
