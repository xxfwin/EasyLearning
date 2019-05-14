jQuery.fn.extend({
	ajax: function(param,pagename,page) {
		var id=$(this).attr('id');
		jQuery.ajax.getAjax(param,pagename,page,id);
	},
	ajaxreload: function() {
		var id=$(this).attr('id');
		jQuery.ajax.reloadAjax(id);
	},
	ajaxnext: function(pages) {
		var id=$(this).attr('id');
		jQuery.ajax.ajaxnext(id,pages);
	},
	ajaxpre: function() {
		var id=$(this).attr('id');
		jQuery.ajax.ajaxpre(id);
	},
	ajaxpage: function(page) {
		var id=$(this).attr('id');
		jQuery.ajax.ajaxpage(id,page);
	},
	ajaxparam: function(param) {
		var id=$(this).attr('id');
		jQuery.ajax.ajaxparam(id,param);
	}
});

jQuery.extend({
	ajax: {
		map:{},
		getAjax: function(param,pagename,page,id) {
			if (param == undefined){
				param="";
			}
			if (pagename == undefined){
				pagename="";
			}
			if (param == undefined){
				page=1;
			}
			if(parseInt(page)<1){
				page=1;
			}
			var p=new Object();
			p["param"]=param;
			p["pagename"]=pagename;
			p["page"]=page;
			this.map[id]=p;
			
			
			var mapparam=new Object();
			mapparam["param"]=param;
			mapparam["pagename"]=pagename;
			mapparam["currentpage"]=page;
			mapparam["id"]=id;
			submitCommon(mapparam,"getAjaxList2","doShowAjaxList2");			
		},
		reloadAjax: function(id) {
			var p=this.map[id];
			var param=p["param"];
			var pagename=p["pagename"];
			var page=p["page"];
			if(parseInt(page)<1){
				page=1;
			}
			var mapparam=new Object();
			mapparam["param"]=param;
			mapparam["pagename"]=pagename;
			mapparam["currentpage"]=page;
			mapparam["id"]=id;
			submitCommon(mapparam,"getAjaxList2","doShowAjaxList2");	
		},
		ajaxnext: function(id,pages) {
			var p=this.map[id];
			var param=p["param"];
			var pagename=p["pagename"];
			var page=p["page"];
			page=parseInt(page)+1;
			if(page>pages){
				page=pages;
			}
			if(parseInt(page)<1){
				page=1;
			}
			p["page"]=page;
			this.map[id]=p;
			var mapparam=new Object();
			mapparam["param"]=param;
			mapparam["pagename"]=pagename;
			mapparam["currentpage"]=page;
			mapparam["id"]=id;
			submitCommon(mapparam,"getAjaxList2","doShowAjaxList2");	
		},
		ajaxpre: function(id) {
			var p=this.map[id];
			var param=p["param"];
			var pagename=p["pagename"];
			var page=p["page"];
			page=parseInt(page)-1;
			if(parseInt(page)<1){
				page=1;
			}
			p["page"]=page;
			this.map[id]=p;
			var mapparam=new Object();
			mapparam["param"]=param;
			mapparam["pagename"]=pagename;
			mapparam["currentpage"]=page;
			mapparam["id"]=id;
			submitCommon(mapparam,"getAjaxList2","doShowAjaxList2");	
		},
		ajaxpage: function(id,topage) {
			var p=this.map[id];
			var param=p["param"];
			var pagename=p["pagename"];
			var page=p["page"];
			page=topage;
			if(parseInt(page)<1){
				page=1;
			}
			p["page"]=page;
			this.map[id]=p;
			var mapparam=new Object();
			mapparam["param"]=param;
			mapparam["pagename"]=pagename;
			mapparam["currentpage"]=page;
			mapparam["id"]=id;
			submitCommon(mapparam,"getAjaxList2","doShowAjaxList2");	
		},
		ajaxparam: function(id,param) {
			var p=this.map[id];
			var pagename=p["pagename"];
			var page=p["page"];
			var page=p["page"];
			if(parseInt(page)<1){
				page=1;
			}
			p["param"]=param;
			this.map[id]=p;
			var mapparam=new Object();
			mapparam["param"]=param;
			mapparam["pagename"]=pagename;
			mapparam["currentpage"]=page;
			mapparam["id"]=id;
			submitCommon(mapparam,"getAjaxList2","doShowAjaxList2");	
		}
	}
});
function doShowAjaxList2(data){
	$("#"+data["showid"]).html(data["msg"]);
}