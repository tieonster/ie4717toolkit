//   Registers the event handlers

// Get the DOM addresses of the elements and register 
//  the event handlers

var customerNode = document.getElementById("custName");
var emailNode = document.getElementById("custEmail");
var dateNode = document.getElementById("startDateID");
var enddateNode = document.getElementById("endDateID");
var cardNode = document.getElementById("custCard");
var numberNode = document.getElementById("custNumber");
var commentNode = document.getElementById("custComments");
var quantityNode = document.getElementById("quantity");
var cvvNode = document.getElementById("custOrder");

// var expNode = document.getElementById("experience");
quantityNode.addEventListener("change", chkOrder, false);
dateNode.addEventListener("change", chkDate, false);
enddateNode.addEventListener("change",chkEndDate, false);


customerNode.addEventListener("change", chkName, false);
emailNode.addEventListener("change", chkEmail, false);
numberNode.addEventListener("change", chkNumber, false);
cardNode.addEventListener("change", chkCard, false);
commentNode.addEventListener("change", chkComment, false);


// expNode.addEventListener("change", chkExp, false);