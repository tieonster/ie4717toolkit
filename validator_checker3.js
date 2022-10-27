//   Registers the event handlers

// Get the DOM addresses of the elements and register 
//  the event handlers

var customerNode = document.getElementById("custName");
var emailNode = document.getElementById("custEmail");
var dateNode = document.getElementById("dateID");
var cardNode = document.getElementById("custCard");
var numberNode = document.getElementById("custNumber");
var commentNode = document.getElementById("custComments");
var cvvNode = document.getElementById("custCVV");
var orderNode = document.getElementById("custOrder");

// var expNode = document.getElementById("experience");
orderNode.addEventListener("change", chkOrder, false);
customerNode.addEventListener("change", chkName, false);
emailNode.addEventListener("change", chkEmail, false);
numberNode.addEventListener("change", chkNumber, false);
commentNode.addEventListener("change", chkComment, false);
cardNode.addEventListener("change", chkCard, false);
dateNode.addEventListener("change", chkDate, false);


// expNode.addEventListener("change", chkExp, false);