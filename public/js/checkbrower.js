// 检测不符合要求的浏览器并弹窗
function IEVersion() {
    var userAgent = navigator.userAgent;
    var isIE =
        userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1;
    var isEdge = userAgent.indexOf("Edge") > -1 && !isIE;
    var isIE11 =
        userAgent.indexOf("Trident") > -1 && userAgent.indexOf("rv:11.0") > -1;
    if (isIE) {
        var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
        reIE.test(userAgent);
        var IEVersion = parseFloat(RegExp["$1"]);
        console.log("IEVersion: " + IEVersion);
        if (IEVersion == 7) {
            /* ie7	*/
        } else if (IEVersion == 8) {
            /* ie8 */
        } else if (IEVersion == 9) {
            return true; /* ie9 */
        } else if (IEVersion == 10) {
            return true; /* ie10 */
        } else {
            /* IE版本<=7/6 */
        }
        window.alert("Please use Google Browser or higher version of IE.");
        return true;
    } else if (isEdge) {
        console.log("IEVersion: isEdge");
        window.alert("Please use Google Browser or higher version of IE.");
        return true;
    } else if (isIE11) {
        return true;
    } else {
        return true;
    }
}

IEVersion();
