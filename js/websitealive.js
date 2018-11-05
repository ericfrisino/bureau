/**
 * Created by holmes on 9/20/16.
 */

function wsa_include_js(){
    var wsa_host = (("https:" == document.location.protocol) ? "https://" : "http://");
    var js = document.createElement("script");
    js.setAttribute("language", "javascript");
    js.setAttribute("type", "text/javascript");
    js.setAttribute("src",wsa_host + "tracking.websitealive.com/vTracker_v2.asp?objectref=a4&groupid=1297&websiteid=133");
    document.getElementsByTagName("head").item(0).appendChild(js);
}
if (window.attachEvent) {window.attachEvent("onload", wsa_include_js);}
else if (window.addEventListener) {window.addEventListener("load", wsa_include_js, false);}
else {document.addEventListener("load", wsa_include_js, false);}
