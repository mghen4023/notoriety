window.twttr=window.twttr||{};
(function(){function o(a){var b=location.href.split("#").pop(),d=RegExp(a+"=(.+?)(&|$)");if(b.indexOf(a)!=-1)return unescape(b.match(d)[1])}function w(){var a;if(i&&(a=i.get(p)))return a}function q(a){a=a._clients;for(var b=o("bridge_code"),d=0,e=a.length;d<e;d++)a[d]._fireAuthComplete(b)}function x(a){a=a._clients;for(var b=0,d=a.length;b<d;b++)a[b]._fireAuthFailed()}function r(a,b){for(var d in b)a[d]=b[d];return a}function y(a,b){return function(){return b.apply(a,arguments)}}function z(a){var b=
	document.createElement("div");b.innerHTML=A;b=b.firstChild;var d=y(b,a);if(B){if(twttr.anywhere._config.domain)b.src="javascript:'<script>window.onload=function(){document.write(\\'<script>document.domain=\\\""+twttr.anywhere._config.domain+"\\\";<\\\\/script>\\');document.close();};<\/script>'";var e=false;b.attachEvent("onload",function(){if(!e){e=true;d()}})}else b.addEventListener("load",d,false);document.body.insertBefore(b,document.body.firstChild);return b}function v(a,b){if(document.body)twttr.anywhere._instances[a.version]=
		z(function(){var d=a.version,e=this.contentWindow,g=e.document.createElement("script"),c;c=[twttr.anywhere._assetUrl()];if(d.indexOf("_dev")!==0)c=c.concat([d]);c=c.concat("javascripts/client.js").join("/");this.id="_twttr_anywhere_client_"+d.replace(/\./g,"_");if(!e._initCallbacks)e._initCallbacks=[];e._initCallbacks.push([b,a]);e._VERSION=d;e._URL=c;g.type="text/javascript";g.src=c;d=e.document.getElementsByTagName("head")[0];if(!d){d=document.createElement("head");e.document.documentElement.appendChild(d)}d.appendChild(g)});
	else setTimeout(function(){v(a,b)},20)}function C(a){for(var b=[],d=0,e=a.length;d<e;d++)b.push(a[d]);return b}var p="twttr_anywhere",s,t=0,D=0,i=function(){function a(c){for(var f=e.childNodes,h,k=null,j=0,l=f.length;j<l;j++){h=f.item(j);if(h.getAttribute("key")==c){k=h;break}}return k}var b,d,e,g={isExpired:function(c){if(c.match(/_expiry$/))return false;return(c=this.get(c+"_expiry"))&&(new Date).getTime()>c},setExpiry:function(c,f){this.set(c+"_expiry",(new Date).getTime()+36E5*f)},setWithExpiry:function(c,
			f,h){this.setExpiry(c,h);this.set(c,f)},expire:function(c){this.del(c);this.del(c+"_expiry")}};if(b=window.localStorage){g.get=function(c){if(this.isExpired(c)){this.expire(c);return null}else return b[c]};g.set=function(c,f){return b[c]=f};g.del=function(c){b.removeItem(c)};g.getAll=function(c){for(var f=-1,h,k=localStorage.length,j={};++f<k;){h=localStorage.key(f);if(typeof c=="undefined"||h.match(c))j[h]=localStorage.getItem(h)}return j};return g}else if(document.documentElement.addBehavior){b=
				document.documentElement;b.addBehavior("#default#userData");b.load("twitter-anywhere");d=b.xmlDocument;e=d.documentElement;a=function(c){for(var f=e.childNodes,h,k=null,j=0,l=f.length;j<l;j++){h=f.item(j);if(h.getAttribute("key")==c){k=h;break}}return k};g.get=function(c){var f=null;if(this.isExpired(c))this.expire(c);else if(c=a(c))f=c.getAttribute("value");return f};g.set=function(c,f){var h=a(c);if(h)h.setAttribute("value",f);else{h=d.createNode(1,"item","");h.setAttribute("key",c);h.setAttribute("value",
						f);e.appendChild(h)}b.save("twitter-anywhere");return f};g.del=function(c){(c=a(c))&&e.removeChild(c);b.save("twitter-anywhere")};g.clear=function(){for(;e.firstChild;)e.removeChild(e.firstChild);b.save("twitter-anywhere")};g.getAll=function(c){for(var f=e.childNodes,h=-1,k=f.length,j={},l,u;++h<k;){l=f.item(h);u=l.getAttribute("key");if(typeof c=="undefined"||u.match(c))j[u]=l.getAttribute("value")}return j};return g}}(),m=navigator.userAgent.toLowerCase(),B=/msie/gi.test(m)&&!/opera/gi.test(m),
						A='<iframe tabindex="-1" role="presentation" style="position:absolute;top:-9999px;"></iframe>';twttr.anywhere=function(a,b){if(!(s=="callback"||s=="headless")){if(typeof a=="function"){b=a;a=twttr.anywhere._config.defaultVersion}if(!twttr.anywhere._config.clientID)throw"To set up @anywhere, please provide a client ID";var d;d=twttr.anywhere._instances;if(typeof a==="string"||typeof a==="number")a={version:a};var e=a.version?a.version.toString():twttr.anywhere._config.defaultVersion;a.version=twttr.anywhere._getVersion(e);
						if(!a.version)throw"No @anywhere version matching "+e;a=r({window:window},a);if(d=d[a.version])if(d.contentWindow._ready)d.contentWindow._init(b,a);else{d=d.contentWindow;e=b;var g=a;if(!d._initCallbacks)d._initCallbacks=[];d._initCallbacks.push([e,g])}else v(a,b)}};r(twttr.anywhere,{versions:["_dev","1","1.1","1.1.1","1.1.2","1.1.3","1.1.4","1.2.0"],_instances:{},_clients:[],_config:{defaultVersion:"1",assetHost:"anywhere.platform.twitter.com",secureAssetHost:"twitter-any.s3.amazonaws.com",baseHost:"twitter.com",
							serverHost:"api.twitter.com",serverPath:"xd_receiver.html",oauthHost:"oauth.twitter.com",ignoreSSL:false},_getVersion:function(a){if(!a)return null;a=a.toString();for(var b=[],d=0,e;e=twttr.anywhere.versions[d];d++)e.indexOf(a)===0&&b.push(e);return b.sort()[b.length-1]},config:function(a){if(typeof a==="string"){this._config.clientID=a;return this._config}return r(this._config,a||{})},signOut:function(){for(var a=this._clients,b=0,d=a.length;b<d;b++)a[b]._fireSignOut();i&&i.set("twttr_signed_out",
							"true")},widget:function(){var a=D++,b=C(arguments);document.write('<span id="twttr_anywhere_widget_'+a+'"></span>');twttr.anywhere(function(d){var e="#twttr_anywhere_widget_"+a,g=b.shift();d=d(e);d[g].apply(d,b)})},_removeToken:function(){this.token=null;i&&i.expire(p)},_setToken:function(a){this.token=a;var b=i&&i.get(p);if(i&&(b!=""||!b)){i.setWithExpiry(p,a,2);i.expire("twttr_signed_out")}},_removeHeadlessAuth:function(){if(this._headlessAuthWindow){this._headlessAuthWindow.parentNode.removeChild(this._headlessAuthWindow);
							this._headlessAuthWindow=null}},_signedOutFlagPresent:function(){return i&&i.get("twttr_signed_out")=="true"},_proto:function(a){return(window.location.protocol.match(/s\:$/)||a)&&!twttr.anywhere._config.ignoreSSL?"https":"http"},_serverUrl:function(a){if(twttr.anywhere._config.serverHost)return this._proto(a)+"://"+[twttr.anywhere._config.serverHost,twttr.anywhere._config.serverPath].join("/")},_assetUrl:function(a){a=this._proto(a);var b=(a=="https"?twttr.anywhere._config.secureAssetHost:twttr.anywhere._config.assetHost).replace("{i}",
									t++);if(t==3)t=0;return a+"://"+b},_baseUrl:function(a){return this._proto(a)+"://"+twttr.anywhere._config.baseHost},_oauthUrl:function(a){return this._proto(a)+"://"+twttr.anywhere._config.oauthHost+"/2"}});twttr.anywhere._signedOutCookiePresent=twttr.anywhere._signedOutFlagPresent;s=function(){var a=null;if(a=o("oauth_access_token")||o("access_token")){var b=window.opener||window.parent;if(b&&b.parent.twttr){b.parent.twttr.anywhere._setToken(a);q(b.parent.twttr.anywhere);if(window.opener){window.close();
									window.self&&window.self.close()}return"callback_new_window"}else if(window.parent!=window&&window.parent&&window.parent.twttr){window.parent.parent.twttr.anywhere._setToken(a);q(window.parent.parent.twttr.anywhere);window.parent.parent.twttr.anywhere._removeHeadlessAuth();return"headless"}else{twttr.anywhere._setToken(a);q(window.parent.parent.twttr.anywhere);setTimeout(function(){window.location.hash=""},100);return"callback_same_window"}}if(o("error")){x(window.parent.parent.twttr.anywhere);window.parent.parent.twttr.anywhere._removeHeadlessAuth();
									return"headless"}try{window.parent.parent.twttr.anywhere._removeHeadlessAuth()}catch(d){}if(a=w()){twttr.anywhere._setToken(a);return"cookie"}}();var n=function(){try{var a=document.getElementsByTagName("script")}catch(b){a=[]}for(var d,e,g={},c=0,f=a.length;c<f;c++){d=a[c];if(d.src.indexOf("/anywhere.js?")>-1)e=d}if(e){a=e.src.split("?").pop();if(a.indexOf("=")>0){a=a.split("&");for(d=0;e=a[d];d++){c=e.split("=");e=c[0];c=c[1];if(e=="id")g.clientID=c;if(e=="v")g.version=c}}else g.clientID=a}return g}();
									m=n.clientID;n=n.version;if(m)twttr.anywhere._config.clientID=m;if(n)twttr.anywhere._config.defaultVersion=n})();