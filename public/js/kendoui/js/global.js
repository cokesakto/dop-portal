/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var globalHeaderAttributes = { style : 'text-align:center; font-weight:bolder; text-transform:uppercase;' };

var globalAttrCenter = {
    class: "table-cell",
    style: "text-align: center"
};

var globalAttrRight = {
    class: "table-cell",
    style: "text-align: right"
};

// Common functions
function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {str = '0' + str;}
    return str;
}
function formatTime(time) {
    var min = parseInt(time / 6000),
        sec = parseInt(time / 100) - (min * 60),
        hundredths = pad(time - (sec * 100) - (min * 6000), 2);
    return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
}